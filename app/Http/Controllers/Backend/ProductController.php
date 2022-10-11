<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormProductRequest;
use App\Http\Resources\Admin\ProductColorResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Credit;
use App\Models\Option;
use App\Models\OptionGroup;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('products index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $input = \Arr::except($request->all(), array('_token', '_method'));

        $products = Product::with('productStatuses');

        if (isset($request['productname'])) {
            $products = $products->where('name', 'like', '%' . $input['productname'] . '%');
        }

        if (isset($input['category_id'])) {
            $products = $products->where('category_id', $input['category_id']);
        }


        if (isset($input['product_status_id'])) {
            $products = $products->whereHas('productStatuses', function ($query) use ($input) {
                $query->where('product_status_id', $input['product_status_id']);
            });
        }

        if (isset($input['status'])) {
            $products = $products->where('status', $input['status']);
        }

        if (request()->ajax()) {
            $limit = request('length');
            $start = request('start');
            $data = $products->latest()->offset($start)->limit($limit)->get();
            $total_filtered = Product::count();

            return $this->dataTable($data, $total_filtered);
        }

        $categories = Category::active()->get();
        $statuses = ProductStatus::active()->get();

        return view('backend.products.index', compact('categories',  'statuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('products create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::active()->get();
        $statuses = ProductStatus::active()->get();
        $optionGroups = OptionGroup::active()->get();
        $credits = Credit::all();

        $tabs = ['naming', 'seo', 'categories'];
        $edit = false;

        return view('backend.products.form', compact('categories', 'optionGroups', 'statuses', 'credits', 'tabs', 'edit'));
    }

    public function store(FormProductRequest $request, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('products create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // dd($request->all());
        try {
            DB::transaction(function () use ($request, $uploadImageService) {
                $product = Product::create($request->validated());

                if ($request->hasFile('image')) {
                    $uploadImageService->upload($product, 'image', 'product_images', true, false);
                }
            });
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }

        return redirect(route('backend.products.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('products show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        views($product)->record();

        $product->load('options', 'productStatuses',  'credits', 'category');

        return view('backend.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('products edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::with(['options', 'options.options'])->active()->get();
        $statuses = ProductStatus::active()->get();
        $optionGroups = OptionGroup::with('options')->active()->get();
        $credits = Credit::all();


        $product->load('options',  'productStatuses',  'credits', 'category');

        $tabs = ['naming', 'seo', 'categories'];

        $edit = true;
        return view('backend.products.form', compact('product', 'categories', 'statuses', 'optionGroups', 'credits',  'tabs', 'edit'));
    }

    public function update(FormProductRequest $request, Product $product, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('products edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            // dd($request->all());

        try {
            DB::transaction(function () use ($request, $product, $uploadImageService) {
                $product->update($request->validated());

                if ($request->hasFile('image')) {
                    $uploadImageService->upload($product, 'image', 'product_images', true, false);
                }
            });

            return redirect(route('backend.products.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return redirect(route('backend.products.index'))->withError(trans('backend.messages.error.update'));
        }
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('products delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $product->delete();

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }


    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('products delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $media = Media::findOrFail($request['id']);

            $media->delete();

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function coverimg(Request $request)
    {
        try {
            // Refresh the media custom_properties
            Media::where('collection_name', 'product_images')->where('custom_properties', '<>', '[]')->update(['custom_properties' => []]);

            $media = Media::findOrFail($request['id']);

            $media->hasCustomProperty('coverImage')
                ?
                $media->forgetCustomProperty('coverImage')
                :
                $media->setCustomProperty('coverImage', 'true');

            $media->save();

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    protected function dataTable($data, $total_filtered)
    {
        return datatables()
            ->of($data)
            ->addColumn('category_name', function ($product) {
                return optional($product->category)->transname;
            })
            ->addColumn('price', function ($product) {
                return number_format($product->price, 2) . ' <span class="azn">M</span>';
            })
            ->addColumn('discount_price', function ($product) {
                if (!empty($product->discount_price)) {
                    return number_format($product->discount_price, 2) . ' <span class="azn">M</span>';
                }
            })
            ->addColumn('image', function (Product $product) {
                if (isset($product)) {
                    $src = $product->getFirstMediaUrl('product_images') ?: asset('backend/img/noimage.jpg');
                }
                return '<img src="' . $src . '" alt="' . $product->name . '" style="width:26px; object-fit: contain;">';
            })
            ->addColumn('name', function (Product $product) {
                return $product->name;
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->skipPaging()
            ->setTotalRecords($total_filtered)
            ->setFilteredRecords($total_filtered)
            ->rawColumns(['image', 'product_status', 'price', 'discount_price', 'status', 'actions'])
            ->make(true);
    }

    protected function permissions($id)
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('products show')) {
            $result .= "<a href='" . route('backend.products.show', ['product' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('products edit')) {
            $result .= "<a href='" . route('backend.products.edit', ['product' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('products delete')) {
            $result .= "<a href='" . route('backend.products.destroy', ['product' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }


    public function getProductByStatus(Request $request)
    {
        $product_status = ProductStatus::where('product_id', $request->product_id)->get();
        return response()->json($product_status);
    }
}
