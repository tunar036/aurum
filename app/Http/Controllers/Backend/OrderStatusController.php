<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormOrderStatusRequest;
use App\Interfaces\DatatableInterface;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class OrderStatusController extends Controller implements DatatableInterface
{
    public function index()
    {
        abort_if(Gate::denies('order-status index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
        {
            return $this->dataTable(OrderStatus::all());
        }

        return view('backend.order_statuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order-status create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;

        return view('backend.order_statuses.form', compact('edit'));
    }

    public function store(FormOrderStatusRequest $request)
    {
        abort_if(Gate::denies('order-status create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        OrderStatus::create($request->validated());

        return redirect(route('backend.order-statuses.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(OrderStatus $order_status)
    {
        abort_if(Gate::denies('order-status show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.order_statuses.show', compact('order_status'));
    }

    public function edit(OrderStatus $order_status)
    {
        abort_if(Gate::denies('order-status edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        return view('backend.order_statuses.form', compact('order_status', 'edit'));
    }

    public function update(FormOrderStatusRequest $request, OrderStatus $order_status)
    {
        abort_if(Gate::denies('order-status edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $order_status->update($request->validated());

        return redirect(route('backend.order-statuses.index'))->withError(trans('backend.messages.error.update'));
    }

    public function destroy(OrderStatus $order_status)
    {
        abort_if(Gate::denies('order-status delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try
        {
            $order_status->delete();
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
            ->addColumn('name', function($row)
            {
                return $row->transname;
            })
            ->addColumn('status', function($row)
            {
                return badge($row->status);
            })
            ->addColumn('created_at', function($row)
            {
                return $row->created_at->format('d-m-Y H:i:s');
            })
            ->addColumn('actions', function($row)
            {
                return $this->permissions($row->id);
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('payment-methods show'))
        {
            $result .= "<a href='" . route('backend.order-statuses.show', ['order_status' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('payment-methods edit'))
        {
            $result .= "<a href='" . route('backend.order-statuses.edit', ['order_status' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('payment-methods delete'))
        {
            $result .= "<a href='" . route('backend.order-statuses.destroy', ['order_status' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
