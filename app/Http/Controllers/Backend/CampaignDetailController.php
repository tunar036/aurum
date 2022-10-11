<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\FormCampaignDetailRequest;
use App\Http\Resources\Admin\ProductsFilterResource;
use App\Interfaces\DatatableInterface;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\CampaignDetail;
use App\Http\Controllers\Controller;
use App\Models\CampaignType;
use App\Models\Category;
use App\Models\Product;
use App\Services\Campaign\CampaignService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Services\Campaign\CalculateProductPriceService;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CampaignDetailController extends Controller implements DatatableInterface
{
    public function index()
    {
        abort_if(Gate::denies('campaign_details create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            return $this->dataTable(CampaignDetail::all());
        }

        return view('backend.campaign_details.index');
    }

    public function create()
    {
        abort_if(Gate::denies('campaign_details create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        $campaigns = Campaign::active()->get();
        $campaign_types = CampaignType::active()->get();
        $categories = Category::active()->get();

        return view('backend.campaign_details.form', compact('edit', 'campaigns','campaign_types', 'categories', 'brands'));

    }

    public function store(FormCampaignDetailRequest $request, CampaignService $campaignService)
    {
        abort_if(Gate::denies('campaign_details create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaignService->storeNewCampaignDetails(
            $request->campaign_id,
            $request->campaign_type_id,
            $request->started_at,
            $request->ended_at,
            $request->campaign_discount_price ?? null,
            $request->campaign_discount_percent ?? null,
            $request->brands ?? [],
            $request->categories ?? [],
            $request->products ?? [],
            $request->prices ?? []
        );

//        $campaign_detail = CampaignDetail::create($request->all());
//        $campaign_detail->campaign->categories()->sync($request->categories);

        return redirect()->route('backend.campaign_details.index')->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(CampaignDetail $campaign_detail)
    {
        abort_if(Gate::denies('campaign_details show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.campaign_details.show', compact('campaign_detail'));
    }

    public function edit(CampaignDetail $campaign_detail)
    {
        abort_if(Gate::denies('campaign_details edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        $campaigns = Campaign::active()->get();
        $campaign_types = CampaignType::active()->get();
        $categories = Category::active()->get();
        $products = ProductsFilterResource::collection($campaign_detail->products);


        return view('backend.campaign_details.form', compact('edit', 'campaigns','campaign_types', 'categories', 'brands','campaign_detail','products'));
    }

    public function update(FormCampaignDetailRequest $request, CampaignDetail $campaign_detail, CampaignService $campaignService)
    {
        abort_if(Gate::denies('campaign_details edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaignService->updateCampaignDetails(
            $campaign_detail,
            $request->campaign_id,
            $request->campaign_type_id,
            $request->started_at,
            $request->ended_at,
            $request->campaign_discount_price ?? null,
            $request->campaign_discount_percent ?? null,
            $request->brands ?? [],
            $request->categories ?? [],
            $request->products ?? [],
            $request->prices ?? []
        );
        return redirect()->route('backend.campaign_details.index')->withSuccess(trans('backend.messages.success.create'));
    }

    public function destroy(CampaignDetail $campaign_detail)
    {
        abort_if(Gate::denies('campaign_details delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $campaign_detail->delete();
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
            ->addColumn('campaign_name', function ($row) {
                return $row->campaign->transname ?? '';
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('campaign_details show')) {
            $result .= "<a href='" . route('backend.campaign_details.show', ['campaign_detail' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('campaign_details edit')) {
            $result .= "<a href='" . route('backend.campaign_details.edit', ['campaign_detail' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('campaign_details delete')) {
            $result .= "<a href='" . route('backend.campaign_details.destroy', ['campaign_detail' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }

    public function getProducts()
    {
        $products = Product::with(['category', 'brand'])
            ->when(request('category_id'), function ($query) {
                return $query->where('category_id', request('category_id'));
            })
            ->when(request('brand_id'), function ($query) {
                return $query->where('brand_id', request('brand_id'));
            })
            ->when(request('name'), function ($query) {
                return $query->where('name', 'LIKE', '%' . request('name') . '%');
            })
            ->when(request('lastID'), function ($query) {
                return $query->where('id', '<', request('lastID'));
            })->where('status', '1')->orderBy('id', 'DESC')->limit(request('limit', 3))->get();

        return response()->json(['data' => ProductsFilterResource::collection($products), 'lastID' => count($products) ? $products->last()['id'] : 0], 200);


    }
}
