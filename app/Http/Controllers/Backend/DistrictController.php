<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormDistrictRequest;
use App\Interfaces\DatatableInterface;
use App\Models\District;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DistrictController extends Controller implements DatatableInterface
{
    public function index()
    {
        abort_if(Gate::denies('districts index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(District::all());
        }

        return view('backend.districts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('districts create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;
        return view('backend.districts.form', compact('edit'));
    }

    public function store(FormDistrictRequest $request)
    {
        abort_if(Gate::denies('districts create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        District::create($request->validated());

        return redirect(route('backend.districts.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(District $district)
    {
        abort_if(Gate::denies('districts show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.districts.show', compact('district'));
    }

    public function edit(District $district)
    {

        abort_if(Gate::denies('districts edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;

        return view('backend.districts.form', compact('district', 'edit'));
    }

    public function update(FormDistrictRequest $request, District $district)
    {
        abort_if(Gate::denies('districts edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $district->update($request->validated());

        return redirect()->route('backend.districts.index')->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(District $district)
    {
        abort_if(Gate::denies('districts delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $district->delete();

            return response(['status' => 1]);
        } catch (Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function dataTable($data)
    {
        return datatables()
            ->of($data)
            ->addColumn('name', function ($row) {
                return $row->transname ?? '-';
            })
            ->addColumn('created_at', function($row)
            {
                return $row->created_at->format('d-m-Y H:i:s');
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('districts show')) {
            $result .= "<a href='" . route('backend.districts.show', ['district' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('districts edit')) {
            $result .= "<a href='" . route('backend.districts.edit', ['district' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('districts delete')) {
            $result .= "<a href='" . route('backend.districts.destroy', ['district' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
