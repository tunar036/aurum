<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\DatatableInterface;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('orders index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax())
        {
            $limit = request('length');
            $start = request('start');
            $count = Order::count();
            $data = Order::with(['user','district','products','paymentMethod','deliveryMethod','installmentCardMonth','orderStatus'])->latest()->offset($start)->limit($limit)->get();

            return $this->dataTable($data,$count);
        }

        return view('backend.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('orders show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $statuses = OrderStatus::active()->get();

        return view('backend.orders.show', compact('order', 'statuses'));
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('orders edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        return view('backend.orders.form', compact('order', 'edit'));
    }

    public function update(Request $request, Order $order)
    {
        abort_if(Gate::denies('orders update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->update($request->all());

        return redirect(route('backend.orders.index'))->withSuccess(trans('backend.messages.success.update'));

    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('orders destroy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try
        {
            DB::transaction(function () use ($order)
            {
                $order->delete();
            });

            return response(['status' => 1]);
        }

        catch (\Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function changeStatus(Order $order, Request $request)
    {
        $order->update(['order_status_id' => $request->status_id]);

        return redirect(route('backend.orders.index'))->withSuccess(trans('backend.messages.success.update'));

    }

    public function dataTable($data, $count)
    {
        return datatables()
            ->of($data)
            // ->addColumn('user', function($row)
            // {
            //     return $row->user->first_name . ' ' . $row->user->last_name;
            // })
            ->addColumn('firstname', function($row)
            {
                return $row->firstname;
            })
            ->addColumn('lastname', function($row)
            {
                return $row->lastname;
            })
            ->addColumn('phone', function($row)
            {
                return $row->phone;
            })
            ->addColumn('email', function($row)
            {
                return $row->email;
            })
            ->addColumn('total_amount', function($row)
            {
                return $row->total_amount .' ₼';
            })
            ->addColumn('order_status', function($row)
            {
                return $row->orderStatus->transname;
            })
            ->addColumn('actions', function($row)
            {
                return $this->permissions($row->id);
            })
            ->rawColumns(['actions'])
            ->skipPaging()
            ->setTotalRecords($count)
            ->setFilteredRecords($count)
            ->make(true);
    }


    public function permissions($id)
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('orders show'))
        {
            $result .= "<a href='" . route('backend.orders.show', ['order' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('orders delete'))
        {
            $result .= "<a href='" . route('backend.orders.destroy', ['order' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
