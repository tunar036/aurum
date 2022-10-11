<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormCategoryRequest;
use App\Interfaces\DatatableInterface;
use App\Models\Category;
use App\Models\OptionGroup;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    use HasFactory;

    public function index()
    {
        abort_if(Gate::denies('categories index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            $limit = request('length');
            $start = request('start');
            $data = Category::latest()->offset($start)->limit($limit)->get();
            $total_filtered = Category::count();

            return $this->dataTable($data, $total_filtered);
        }

        return view('backend.categories.index');

    }

    public function create()
    {
        abort_if(Gate::denies('categories create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::active()->get();
        $edit = false;

        return view('backend.categories.form', compact('categories', 'edit'));
    }

    public function store(FormCategoryRequest $request, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('categories create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category = Category::create($request->validated());

//        if ($request->hasFile('icon')) {
//            $uploadImageService->upload($category, 'icon', 'category_icon', false, false);
//        }
        if ($request->hasFile('image')) {
            $uploadImageService->upload($category, 'image', 'category_images', true, false);
        }
        if ($request->hasFile('cover')) {
            $uploadImageService->upload($category, 'cover', 'category_image', false, false);
        }



        return redirect(route('backend.categories.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Category $category)
    {
        abort_if(Gate::denies('categories show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            return view('backend.categories.show', compact('category'));
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('categories edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::where('id', '!=', $category->id)->get();
        $edit = true;

        return view('backend.categories.form', compact('category', 'categories', 'edit'));
    }

    public function update(FormCategoryRequest $request, Category $category, UploadImageService $uploadImageService)
    {
//        dd($request->all());
        abort_if(Gate::denies('categories edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->update($request->validated());

//        if ($request->hasFile('icon')) {
//            if (!empty($category->getFirstMedia('category_icon'))) {
//                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
//            } else {
//                $uploadImageService->upload($category, 'icon', 'category_icon', false, false);
//            }
//        }

        if ($request->hasFile('cover')) {
            if (!empty($category->getFirstMedia('category_image'))) {
                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
            } else {
                $uploadImageService->upload($category, 'cover', 'category_image', false, false);
            }
        }
        if ($request->hasFile('image')) {
            $uploadImageService->upload($category, 'image', 'category_images', true, false);
        }


        return redirect()->route('backend.categories.index')->withSuccess(trans('backend.messages.success.update'));

    }

    public function destroy(Category $category)
    {
        abort_if(Gate::denies('categories delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::transaction(function () use ($category) {
                $category->delete();
            });

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('categories delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $media = Media::findOrFail($request['id']);

            $media->delete();

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function dataTable($data, $total_filtered)
    {
        return datatables()
            ->of($data)
            ->addColumn('icon', function (Category $category) {
                if ($category->getFirstMedia('category_icon')) {
                    return '<img src="' . $category->getFirstMediaUrl('category_icon', 'thumb-small') . '" alt="' . $category->transname . '" style="width:26px; object-fit: contain;">';
                }
            })
            ->addColumn('image', function (Category $category) {
                if ($category->getFirstMedia('category_image')) {
                    return '<img src="' . $category->getFirstMediaUrl('category_image', 'thumb-small') . '" alt="' . $category->transname . '" style="width:26px; object-fit: contain;">';
                }

            })
            ->addColumn('name', function (Category $category) {
                return $category->transname ?? '';
            })
            ->addColumn('description', function (Category $category) {
                return Str::limit($category->transdescription, 60) ?? '';
            })
            ->addColumn('parent', function (Category $category) {
                return $category->parent->transname ?? trans('backend.mixins.no_parent');
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['icon', 'image', 'status', 'actions'])
            ->skipPaging()
            ->setTotalRecords($total_filtered)
            ->setFilteredRecords($total_filtered)
            ->make(true);
    }

    public function permissions($id)
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('categories show')) {
            $result .= "<a href='" . route('backend.categories.show', ['category' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('categories edit')) {
            $result .= "<a href='" . route('backend.categories.edit', ['category' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('categories delete')) {
            $result .= "<a href='" . route('backend.categories.destroy', ['category' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }

    public function getOptions(Request $request)
    {

        $optionGroups = OptionGroup::where('category_id', $request->category_id)->active()->get();

        $html = '';

        foreach ($optionGroups as $optionGroup) {
            $html .= '<optgroup label="'.$optionGroup->transname.'">';
            foreach ($optionGroup->options as $option) {
                $html .= '  <option value="' . $option->id . '"> ' . $option->transname . '</option>';
            }
            $html .= '</optgroup> ';
        }

        return response()->json(['html' => $html]);
    }

    public function getSubCategories(Request $request)
    {
        $category = Category::findOrFail($request->id);

        $html = '';


        foreach ($category->subcategories as $category) {
            $html .= '<option value="' . $category->id . '"> ' . $category->transname . '</option>';
        }

        return response()->json(['html' => $html]);
    }
}
