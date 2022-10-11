<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormPaymentMethodRequest;
use App\Interfaces\DatatableInterface;
use App\Models\PaymentMethod;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PaymentMethodController extends Controller implements DatatableInterface
{

    public function index()
    {
        abort_if(Gate::denies('payment-methods index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
        {
            return $this->dataTable(PaymentMethod::latest());
        }

        return view('backend.payment_methods.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payment-methods create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;

        return view('backend.payment_methods.form',compact('edit'));
    }

    public function store(FormPaymentMethodRequest $request, UploadImageService $uploadImageService)
    {

        abort_if(Gate::denies('payment-methods store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::transaction(function () use ($request, $uploadImageService) {
                $payment_method = PaymentMethod::create($request->validated());

                if($request->hasFile('icon')){
                    $uploadImageService->upload($payment_method, 'icon','payment_method_icon',false,false);
                }

            });
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }

        return redirect(route('backend.payment-methods.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(PaymentMethod $payment_method)
    {
        abort_if(Gate::denies('payment-methods show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.payment_methods.show', compact('payment_method'));
    }

    public function edit(PaymentMethod $payment_method)
    {
        abort_if(Gate::denies('payment-methods edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.payment_methods.form', compact('payment_method', 'edit'));
    }

    public function update(FormPaymentMethodRequest $request, PaymentMethod $payment_method, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('payment-methods update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment_method->update($request->validated());

        if($request->hasFile('icon')){
            if (!empty($payment_method->getFirstMedia('payment_method_icon'))){
                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
            }
            else
            {
                $uploadImageService->upload($payment_method, 'icon','payment_method_icon',false,false);
            }
        }

        return redirect(route('backend.payment-methods.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(PaymentMethod $payment_method)
    {
        abort_if(Gate::denies('payment-methods destroy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try
        {
            DB::transaction(function () use ($payment_method)
            {
                $payment_method->delete();
            });

            return response(['status' => 1]);
        }

        catch (\Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }


    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('payment-methods delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $media = Media::findOrFail($request['id']);

            $media->delete();

            return response(['status' => 1]);
        } catch (\Exception $e) {
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
                ->addColumn('image', function(PaymentMethod $payment_method)
                {
                    if (isset($payment_method) && $payment_method->getFirstMedia('payment_method_icon')) {
                        $src = $payment_method->getFirstMediaUrl('payment_method_icon','thumb-small') ?: asset('backend/img/noimage.jpg');
                        return '<img src="'.$src.'" alt="'.$payment_method->transname.'" style="width:26px; object-fit: contain;">';
                    }
                })
                ->addColumn('status', function($row)
                {
                    return badge($row->status);
                })
                ->addColumn('actions', function($row)
                {
                    return $this->permissions($row->id);
                })
                ->rawColumns(['image','status', 'actions'])
                ->make(true);
    }

    public function permissions($id): string
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('payment-methods show'))
        {
            $result .= "<a href='" . route('backend.payment-methods.show', ['payment_method' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('payment-methods edit'))
        {
            $result .= "<a href='" . route('backend.payment-methods.edit', ['payment_method' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('payment-methods delete'))
        {
            $result .= "<a href='" . route('backend.payment-methods.destroy', ['payment_method' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
