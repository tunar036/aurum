<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormCompanyRequest;
use App\Models\Company;
use App\Models\Feature;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    use HasFactory;

    public function index()
    {
        abort_if(Gate::denies('companies index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            $limit = request('length');
            $start = request('start');
            $data = Company::latest()->offset($start)->limit($limit)->get();
            $total_filtered = Company::count();

            return $this->dataTable($data, $total_filtered);
        }

        return view('backend.companies.index');

    }

    public function create()
    {
        abort_if(Gate::denies('companies create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::active()->get();
        $features = Feature::active()->get();
        $edit = false;

        return view('backend.companies.form', compact('companies', 'edit','features'));
    }

    public function store(FormCompanyRequest $request, UploadImageService $uploadImageService)
    {
        // dd(request()->all());
        abort_if(Gate::denies('companies create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $company = Company::create($request->validated());

        if ($request->filled('features')) {
            $company->features()->sync($request->features);
        }
//        if ($request->hasFile('icon')) {
//            $uploadImageService->upload($category, 'icon', 'category_icon', false, false);
//        }
        if ($request->hasFile('image')) {
            $uploadImageService->upload($company, 'image', 'company_image', false, false);
        }
        if ($request->hasFile('logo')) {
            $uploadImageService->upload($company, 'logo', 'company_logo', false, false);
        }



        return redirect(route('backend.companies.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Company $company)
    {
        abort_if(Gate::denies('companies show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            return view('backend.companies.show', compact('company'));
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }
    }

    public function edit(Company $company)
    {
        abort_if(Gate::denies('companies edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $categories = Category::where('id', '!=', $category->id)->get();
        $features = Feature::active()->get();

        $edit = true;

        return view('backend.companies.form', compact('company', 'edit','features'));
    }

    public function update(FormCompanyRequest $request, Company $company, UploadImageService $uploadImageService)
    {
//        dd($request->all());
        abort_if(Gate::denies('companies edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->update($request->validated());
        if ($request->filled('features')) {
            $company->features()->sync($request->features);
        }

//        if ($request->hasFile('icon')) {
//            if (!empty($category->getFirstMedia('category_icon'))) {
//                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
//            } else {
//                $uploadImageService->upload($category, 'icon', 'category_icon', false, false);
//            }
//        }

        if ($request->hasFile('logo')) {
            if (!empty($company->getFirstMedia('company_logo'))) {
                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
            } else {
                $uploadImageService->upload($company, 'logo', 'company_image', false, false);
            }
        }
        if ($request->hasFile('image')) {
            $uploadImageService->upload($company, 'image', 'company_image', false, false);
        }


        return redirect()->route('backend.companies.index')->withSuccess(trans('backend.messages.success.update'));

    }

    public function destroy(Company $company)
    {
        abort_if(Gate::denies('companies delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::transaction(function () use ($company) {
                $company->delete();
            });

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('companies delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            ->addColumn('logo', function (Company $company) {
                if ($company->getFirstMedia('company_logo')) {
                    return '<img src="' . $company->getFirstMediaUrl('company_logo', 'thumb-small') . '" alt="' . $company->transname . '" style="width:26px; object-fit: contain;">';
                }
            })
            ->addColumn('image', function (Company $company) {
                if ($company->getFirstMedia('company_image')) {
                    return '<img src="' . $company->getFirstMediaUrl('company_image', 'thumb-small') . '" alt="' . $company->transname . '" style="width:26px; object-fit: contain;">';
                }

            })
            ->addColumn('name', function (Company $company) {
                return $company->transname ?? '';
            })
            ->addColumn('description', function (Company $company) {
                return Str::limit($company->transdescription, 60) ?? '';
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['logo', 'image','name', 'status', 'actions'])
            ->skipPaging()
            ->setTotalRecords($total_filtered)
            ->setFilteredRecords($total_filtered)
            ->make(true);
    }

    public function permissions($id)
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('companies show')) {
            $result .= "<a href='" . route('backend.companies.show', ['company' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('companies edit')) {
            $result .= "<a href='" . route('backend.companies.edit', ['company' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('companies delete')) {
            $result .= "<a href='" . route('backend.companies.destroy', ['company' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }

    // public function getOptions(Request $request)
    // {

    //     $optionGroups = OptionGroup::where('company_id', $request->category_id)->active()->get();

    //     $html = '';

    //     foreach ($optionGroups as $optionGroup) {
    //         $html .= '<optgroup label="'.$optionGroup->transname.'">';
    //         foreach ($optionGroup->options as $option) {
    //             $html .= '  <option value="' . $option->id . '"> ' . $option->transname . '</option>';
    //         }
    //         $html .= '</optgroup> ';
    //     }

    //     return response()->json(['html' => $html]);
    // }

    // public function getSubCategories(Request $request)
    // {
    //     $category = Category::findOrFail($request->id);

    //     $html = '';


    //     foreach ($category->subcategories as $category) {
    //         $html .= '<option value="' . $category->id . '"> ' . $category->transname . '</option>';
    //     }

    //     return response()->json(['html' => $html]);
    // }
}
