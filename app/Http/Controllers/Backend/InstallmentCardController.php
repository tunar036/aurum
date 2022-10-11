<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormInstallmentCardRequest;
use App\Interfaces\DatatableInterface;
use App\Models\InstallmentCard;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class InstallmentCardController extends Controller implements DatatableInterface
{

    public function index()
    {
        abort_if(Gate::denies('installment-cards index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
        {
            return $this->dataTable(InstallmentCard::latest()->get());
        }

        return view('backend.installment_cards.index');
    }

    public function create()
    {
        abort_if(Gate::denies('installment-cards create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;

        return view('backend.installment_cards.form',compact('edit'));
    }

    public function store(FormInstallmentCardRequest $request, UploadImageService $uploadImageService)
    {

        abort_if(Gate::denies('installment-cards store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::transaction(function () use ($request, $uploadImageService) {
                $installment_card = InstallmentCard::create($request->validated());

                if($request->hasFile('icon')){
                    $uploadImageService->upload($installment_card, 'icon','installment_card_icon',false,false);
                }

            });
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }

        return redirect(route('backend.installment-cards.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(InstallmentCard $installment_card)
    {
        abort_if(Gate::denies('installment-cards show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.installment_cards.show', compact('installment_card'));
    }

    public function edit(InstallmentCard $installment_card)
    {
        abort_if(Gate::denies('installment-cards edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.installment_cards.form', compact('installment_card', 'edit'));
    }

    public function update(ForminstallmentCardRequest $request, InstallmentCard $installment_card, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('installment-cards update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $installment_card->update($request->validated());

        if($request->hasFile('icon')){
            if (!empty($installment_card->getFirstMedia('installment_card_icon'))){
                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
            }
            else
            {
                $uploadImageService->upload($installment_card, 'icon','installment_card_icon',false,false);
            }
        }

        return redirect(route('backend.installment-cards.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(InstallmentCard $installment_card)
    {
        abort_if(Gate::denies('installment-cards destroy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try
        {
            DB::transaction(function () use ($installment_card)
            {
                $installment_card->delete();
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
        abort_if(Gate::denies('installment-cards delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                ->addColumn('image', function(installmentCard $installment_card)
                {
                    if (isset($installment_card) && $installment_card->getFirstMedia('installment_card_icon')) {
                        $src = $installment_card->getFirstMediaUrl('installment_card_icon','thumb-small') ?: asset('backend/img/noimage.jpg');
                        return '<img src="'.$src.'" alt="'.$installment_card->transname.'" style="width:26px; object-fit: contain;">';
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

        if (admin()->can('installment-cards show'))
        {
            $result .= "<a href='" . route('backend.installment-cards.show', ['installment_card' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('installment-cards edit'))
        {
            $result .= "<a href='" . route('backend.installment-cards.edit', ['installment_card' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('installment-cards delete'))
        {
            $result .= "<a href='" . route('backend.installment-cards.destroy', ['installment_card' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
