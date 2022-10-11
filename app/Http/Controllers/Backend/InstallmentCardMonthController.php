<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormInstallmentCardMonthRequest;
use App\Interfaces\DatatableInterface;
use App\Models\InstallmentCard;
use App\Models\InstallmentCardMonth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class InstallmentCardMonthController extends Controller implements DatatableInterface
{

    public function index()
    {
        abort_if(Gate::denies('installment-card-months index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
        {
            return $this->dataTable(InstallmentCardMonth::latest()->get());
        }

        return view('backend.installment_card_months.index');
    }

    public function create()
    {
        abort_if(Gate::denies('installment-card-months create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;
        $installmentCards = InstallmentCard::active()->get();

        return view('backend.installment_card_months.form',compact('edit','installmentCards'));
    }

    public function store(FormInstallmentCardMonthRequest $request)
    {
        abort_if(Gate::denies('installment-card-months store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        InstallmentCardMonth::create($request->validated());

        return redirect(route('backend.installment-card-months.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(InstallmentCardMonth $installment_card_month)
    {
        abort_if(Gate::denies('installment-card-months show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.installment_card_months.show', compact('installment_card_month'));
    }

    public function edit(InstallmentCardMonth $installment_card_month)
    {
        abort_if(Gate::denies('installment-card-months edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        $installmentCards = InstallmentCard::active()->get();

        return view('backend.installment_card_months.form',compact('edit','installment_card_month','installmentCards'));
    }

    public function update(FormInstallmentCardMonthRequest $request, InstallmentCardMonth $installment_card_month)
    {
        abort_if(Gate::denies('installment-card-months update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $installment_card_month->update($request->validated());

        return redirect(route('backend.installment-card-months.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(InstallmentCardMonth $installment_card_month)
    {
        abort_if(Gate::denies('installment-card-months destroy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try
        {
            DB::transaction(function () use ($installment_card_month)
            {
                $installment_card_month->delete();
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
            ->addColumn('month', function($row)
            {
                return $row->month;
            })
            ->addColumn('installment_card', function($row)
            {
                return $row->installmentCard->transname;
            })
            ->addColumn('image', function($row)
            {
                if (isset($row->installmentCard) && $row->installmentCard->getFirstMedia('installment_card_icon')) {
                    $src = $row->installmentCard->getFirstMediaUrl('installment_card_icon','thumb-small') ?: asset('backend/img/noimage.jpg');
                    return '<img src="'.$src.'" alt="'.$row->installmentCard->transname.'" style="width:26px; object-fit: contain;">';
                }
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
            ->rawColumns(['installment_card','image', 'status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('installment-card-months show'))
        {
            $result .= "<a href='" . route('backend.installment-card-months.show', ['installment_card_month' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('installment-card-months edit'))
        {
            $result .= "<a href='" . route('backend.installment-card-months.edit', ['installment_card_month' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('installment-card-months delete'))
        {
            $result .= "<a href='" . route('backend.installment-card-months.destroy', ['installment_card_month' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
