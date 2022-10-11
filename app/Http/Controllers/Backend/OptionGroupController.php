<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormOptionGroupRequest;
use App\Interfaces\DatatableInterface;
use App\Models\Category;
use App\Models\OptionGroup;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class OptionGroupController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('option-groups index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
        {
            $limit = request('length');
            $start = request('start');
            $data = OptionGroup::with('category')->latest()->offset($start)->limit($limit)->get();
            $total_filtered = OptionGroup::count();

            return $this->dataTable($data, $total_filtered);
        }

        return view('backend.option_groups.index');
    }

    public function create()
    {
        abort_if(Gate::denies('option-groups create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::active()->get();
        $edit = false;
        return view('backend.option_groups.form', compact('categories','edit'));
    }

    public function store(FormOptionGroupRequest $request)
    {
        abort_if(Gate::denies('option-groups create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        OptionGroup::create($request->all());
        return redirect()->route('backend.option-groups.index')->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(OptionGroup $option_group)
    {
        abort_if(Gate::denies('option-groups show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.option_groups.show', compact('option_group'));
    }

    public function edit(OptionGroup $option_group)
    {
        abort_if(Gate::denies('option-groups edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::active()->get();
        $edit = true;
        return view('backend.option_groups.form', compact('option_group', 'categories','edit'));
    }

    public function update(FormOptionGroupRequest $request, OptionGroup $option_group)
    {
        abort_if(Gate::denies('option-groups edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $option_group->update($request->all());
        return redirect(route('backend.option-groups.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(OptionGroup $option_group)
    {
        abort_if(Gate::denies('option-groups delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       try {
            $option_group->delete();

            return response(['status' => 1]);
        }

    catch (\Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function dataTable($data, $total_filtered)
    {
        return datatables()
            ->of($data)
            ->addColumn('name', function($row)
            {
                return $row->transname ?? '';
            })
            ->addColumn('category', function($row)
            {
                return optional($row->category)->transname ?? '';
            })
            ->addColumn('status', function($row)
            {
                return badge($row->status);
            })
            ->addColumn('actions', function($row)
            {
                return $this->permissions($row->id);
            })
            ->rawColumns(['status', 'actions'])
            ->skipPaging()
            ->setTotalRecords($total_filtered)
            ->setFilteredRecords($total_filtered)
            ->make(true);
    }

    public function permissions($id): string
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('option-groups show'))
        {
            $result .= "<a href='" . route('backend.option-groups.show', ['option_group' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('option-groups edit'))
        {
            $result .= "<a href='" . route('backend.option-groups.edit', ['option_group' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('option-groups delete'))
        {
            $result .= "<a href='" . route('backend.option-groups.destroy', ['option_group' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
