<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormCareerRequest;
use App\Models\Career;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;


class CareerController extends Controller
{
    use HasFactory;

    public function index()
    {
        abort_if(Gate::denies('careers index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            $limit = request('length');
            $start = request('start');
            $data = Career::latest()->offset($start)->limit($limit)->get();
            $total_filtered = Career::count();

            return $this->dataTable($data, $total_filtered);
        }

        return view('backend.careers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('careers create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $careers = Career::active()->get();
        $edit = false;

        return view('backend.careers.form', compact('careers', 'edit'));
    }

    public function store(FormCareerRequest $request)
    {
        // dd(request()->all());
        abort_if(Gate::denies('careers create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Career::create($request->validated());

        return redirect(route('backend.careers.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Career $career)
    {
        abort_if(Gate::denies('careers show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            return view('backend.careers.show', compact('career'));
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }
    }

    public function edit(Career $career)
    {
        abort_if(Gate::denies('careers edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        return view('backend.careers.form', compact('career', 'edit'));
    }

    public function update(FormCareerRequest $request, Career $career)
    {
        abort_if(Gate::denies('careers edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $career->update($request->validated());
        return redirect()->route('backend.careers.index')->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Career $career)
    {
        abort_if(Gate::denies('careers delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::transaction(function () use ($career) {
                $career->delete();
            });

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }


    public function dataTable($data, $total_filtered)
    {
        return datatables()
            ->of($data)
            ->addColumn('name', function (Career $career) {
                return $career->transname ?? '';
            })
            ->addColumn('description', function (Career $career) {
                return Str::limit($career->transdescription, 60) ?? '';
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['name', 'status', 'actions'])
            ->skipPaging()
            ->setTotalRecords($total_filtered)
            ->setFilteredRecords($total_filtered)
            ->make(true);
    }

    public function permissions($id)
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('careers show')) {
            $result .= "<a href='" . route('backend.careers.show', ['career' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('careers edit')) {
            $result .= "<a href='" . route('backend.careers.edit', ['career' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('careers delete')) {
            $result .= "<a href='" . route('backend.careers.destroy', ['career' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}