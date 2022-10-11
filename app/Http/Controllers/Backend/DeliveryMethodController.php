<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormDeliveryMethodRequest;
use App\Interfaces\DatatableInterface;
use App\Models\DeliveryMethod;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DeliveryMethodController extends Controller implements DatatableInterface
{

    public function index()
    {
        abort_if(Gate::denies('delivery-methods index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
        {
            return $this->dataTable(DeliveryMethod::all());
        }

        return view('backend.delivery_methods.index');
    }

    public function create()
    {
        abort_if(Gate::denies('delivery-methods create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;

        return view('backend.delivery_methods.form',compact('edit'));
    }

    public function store(FormDeliveryMethodRequest $request, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('delivery-methods store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         DeliveryMethod::create($request->validated());

        return redirect(route('backend.delivery-methods.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(DeliveryMethod $delivery_method)
    {
        abort_if(Gate::denies('delivery-methods show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.delivery_methods.show', compact('delivery_method'));
    }

    public function edit(DeliveryMethod $delivery_method)
    {
        abort_if(Gate::denies('delivery-methods edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.delivery_methods.form', compact('delivery_method', 'edit'));
    }

    public function update(FormDeliveryMethodRequest $request, DeliveryMethod $delivery_method, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('delivery-methods update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delivery_method->update($request->validated());

        return redirect(route('backend.delivery-methods.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(DeliveryMethod $delivery_methods)
    {
        abort_if(Gate::denies('delivery-methods destroy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try
        {
            DB::transaction(function () use ($delivery_methods)
            {
                $delivery_methods->delete();
            });

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
                return Str::limit($row->transname, 60);
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
            ->rawColumns(['image', 'status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('delivery-methods show'))
        {
            $result .= "<a href='" . route('backend.delivery-methods.show', ['delivery_method' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('delivery-methods edit'))
        {
            $result .= "<a href='" . route('backend.delivery-methods.edit', ['delivery_method' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('delivery-methods delete'))
        {
            $result .= "<a href='" . route('backend.delivery-methods.destroy', ['delivery_method' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
