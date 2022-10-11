<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormProductDayRequest;
use App\Http\Resources\Admin\ProductsFilterResource;
use App\Interfaces\DatatableInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDay;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ProductDayController extends Controller implements DatatableInterface
{
    public function index()
    {
        abort_if(Gate::denies('product-days index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(ProductDay::all());
        }

        return view('backend.product_days.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product-days create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $edit = false;
        $categories = Category::active()->get();

        return view('backend.product_days.form', compact('edit', 'categories'));
    }

    public function store(FormProductDayRequest $request)
    {
        abort_if(Gate::denies('product-days create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        ProductDay::create($request->validated());

        return redirect(route('backend.product-days.index'))->withSuccess(trans('backend.messages.success.create'));

    }

    public function show(ProductDay $product_day)
    {
        abort_if(Gate::denies('product-days show'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        return view('backend.product_days.show', compact('product_day'));
    }

    public function edit(ProductDay $product_day)
    {
        abort_if(Gate::denies('product-days edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $edit=true;
        $categories = Category::active()->get();
        $product = new ProductsFilterResource($product_day->product);

        return view('backend.product_days.form', compact('edit', 'product_day', 'categories', 'product'));
    }

    public function update(FormProductDayRequest $request, ProductDay $product_day)
    {
        abort_if(Gate::denies('product-days edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $product_day->update($request->validated());

        return redirect(route('backend.product-days.index'))->withSuccess(trans('backend.messages.success.update'));

    }

    public function destroy(ProductDay $product_day)
    {
        abort_if(Gate::denies('product-days delete'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        try
        {
            $product_day->delete();

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
            ->addColumn('title', function ($row) {
                return $row->transtitle ?? '';
            })
            ->addColumn('name', function ($row) {
                return $row->product->name ?? '';
            })
            ->addColumn('image', function($row)
            {
                if (isset($row->product)) {
                    $src = $row->product->getFirstMediaUrl('product_images','thumb-small') ?: asset('backend/img/noimage.jpg');
                }
                return '<img src="'.$src.'" alt="'.$row->product->name.'" style="width:26px; object-fit: contain;">';
            })
            ->addColumn('price', function ($row) {
                return $row->product->price.' <span class="azn">M</span>';
            })
            ->addColumn('discount_price', function ($row) {
                if(!empty($row->product->discount_price)){
                    return $row->product->discount_price.' <span class="azn">M</span>';
                }
            })
            ->addColumn('expired_at', function ($row) {
                return $row->expired_at ?? '';
            })
            ->addColumn('status', function($row)
            {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['image','price','discount_price','status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('product-days show')) {
            $result .= "<a href='" . route('backend.product-days.show', ['product_day' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('product-days edit')) {
            $result .= "<a href='" . route('backend.product-days.edit', ['product_day' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('product-days delete')) {
            $result .= "<a href='" . route('backend.product-days.destroy', ['product_day' => $id]) . "'";
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
            })
            ->where('status', '1')->orderBy('id', 'DESC')->limit(request('limit', 12))->get();


            return response()->json(['data' => ProductsFilterResource::collection($products), 'lastID' => count($products) ? $products->last()['id'] : 0], 200);
    }

}
