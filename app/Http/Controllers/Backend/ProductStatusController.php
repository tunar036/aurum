<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormProductStatusRequest;
use App\Interfaces\DatatableInterface;
use App\Models\ProductStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ProductStatusController extends Controller implements DatatableInterface
{
    public function index()
    {
        abort_if(Gate::denies('product-statuses index'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        if (request()->ajax())
        {
            return $this->dataTable(ProductStatus::all());
        }

        return view('backend.product_statuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product-statuses create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $edit = false;
        return view('backend.product_statuses.form', compact('edit'));
    }

    public function store(FormProductStatusRequest $request)
    {
        abort_if(Gate::denies('product-statuses create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        ProductStatus::create($request->validated());

        return redirect(route('backend.product-statuses.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(ProductStatus $product_status)
    {
        abort_if(Gate::denies('product-statuses show'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        return view('backend.product_statuses.show', compact('product_status'));
    }

    public function edit(ProductStatus $product_status)
    {
        abort_if(Gate::denies('product-statuses edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $edit = true;
        return view('backend.product_statuses.form', compact('product_status','edit'));
    }

    public function update(FormProductStatusRequest $request, ProductStatus $product_status)
    {
        abort_if(Gate::denies('product-statuses edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $product_status->update($request->validated());

        return redirect(route('backend.product-statuses.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(ProductStatus $product_status)
    {
        abort_if(Gate::denies('product-statuses delete'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        try
        {
            $product_status->delete();

            return response(['status' => 1]);
        }

        catch (\Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function dataTable($data)
    {
        return datatables()
            ->of($data)
            ->addColumn('name', function ($row) {
                return $row->transname ?? '';
            })
            ->addColumn('created_at', function($row)
            {
                return $row->created_at->format('d-m-Y H:i:s');
            })
            ->addColumn('status', function($row)
            {
                return badge($row->status);
            })
            ->addColumn('actions', function($row)
            {
                return $this->permissions($row->id);
            })
            ->rawColumns(['name','status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('product-statuses show'))
        {
            $result .= "<a href='" . route('backend.product-statuses.show', ['product_status' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('product-statuses edit'))
        {
            $result .= "<a href='" . route('backend.product-statuses.edit', ['product_status' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('product-statuses delete'))
        {
            $result .= "<a href='" . route('backend.product-statuses.destroy', ['product_status' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
