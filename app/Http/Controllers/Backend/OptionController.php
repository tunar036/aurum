<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormOptionRequest;
use App\Http\Resources\Admin\OptionGroupsResource;
use App\Models\Category;
use App\Models\Option;
use App\Models\OptionGroup;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class OptionController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('options index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
        {
            $limit = request('length');
            $start = request('start');
            $data = Option::with('group')->latest()->offset($start)->limit($limit)->get();
            $total_filtered = Option::count();

            return $this->dataTable($data, $total_filtered);
        }

        return view('backend.options.index');
    }

    public function create()
    {
        abort_if(Gate::denies('options create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::with('options')->active()->get();
        $optionGroups = OptionGroup::active()->get();

        $edit = false;
        return view('backend.options.form', compact('categories','optionGroups','edit'));
    }

    public function store(FormOptionRequest $request)
    {
        abort_if(Gate::denies('options create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Option::Create($request->all());

        return redirect(route('backend.options.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Option $option)
    {
        abort_if(Gate::denies('options show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.options.show', compact('option'));
    }

    public function edit(Option $option)
    {
        abort_if(Gate::denies('options edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::with('options')->active()->get();
        $optionGroups = OptionGroup::active()->get();
        $group = new OptionGroupsResource($option->group);

        $edit = true;
        return view('backend.options.form', compact('option', 'categories','optionGroups','group','edit'));
    }

    public function update(FormOptionRequest $request, Option $option)
    {
        abort_if(Gate::denies('options edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $option->update($request->all());

        return redirect()->route('backend.options.index')->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Option $option)
    {
        abort_if(Gate::denies('options delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try
        {
            $option->delete();
            return response(['status' => 1]);
        }

        catch (\Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    protected function dataTable($data, $total_filtered)
    {
        return datatables()
            ->of($data)
            ->addColumn('name', function($row)
            {
                return $row->transname ?? '';
            })
            ->addColumn('group', function($row)
            {
                return $row->group->transname ?? '';
            })
            ->addColumn('category', function($row)
            {
                return optional($row->group)->category->transname ?? '';
            })
            ->addColumn('status', function($row)
            {
                return badge($row->status);
            })
            ->addColumn('actions', function($row)
            {
                return $this->permissions($row->id);
            })
            ->skipPaging()
            ->setTotalRecords($total_filtered)
            ->setFilteredRecords($total_filtered)
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('options show'))
        {
            $result .= "<a href='" . route('backend.options.show', ['option' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('options edit'))
        {
            $result .= "<a href='" . route('backend.options.edit', ['option' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('options delete'))
        {
            $result .= "<a href='" . route('backend.options.destroy', ['option' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }

    public function getOptionGroups()
    {
        $groups = OptionGroup::with('category')
            ->when(request('category_id'), function ($query) {
                return $query->where('category_id', request('category_id'));
            })
            ->when(request('name'), function ($query) {
                 $query->whereHas('category', function ($q) {
                     return $q->whereTranslationLike('name', '%' . request('name') . '%');
            });
            })
            ->when(request('lastID'), function ($query) {
                return $query->where('id', '<', request('lastID'));
            })->where('status', '1')->orderBy('id', 'DESC')->limit(request('limit', 10))->get();

        return response()->json(['data' => OptionGroupsResource::collection($groups), 'lastID' => count($groups) ? $groups->last()['id'] : 0], 200);
    }
}
