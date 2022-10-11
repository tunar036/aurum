<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormFeatureRequest;
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

class FeatureController extends Controller
{
    use HasFactory;

    public function index()
    {
        abort_if(Gate::denies('features index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            $limit = request('length');
            $start = request('start');
            $data = Feature::latest()->offset($start)->limit($limit)->get();
            $total_filtered = Feature::count();

            return $this->dataTable($data, $total_filtered);
        }

        return view('backend.features.index');
    }

    public function create()
    {
        abort_if(Gate::denies('features create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $features = Feature::active()->get();
        $edit = false;

        return view('backend.features.form', compact('features', 'edit'));
    }

    public function store(FormFeatureRequest $request, UploadImageService $uploadImageService)
    {
        // dd(request()->all());
        abort_if(Gate::denies('features create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $feature = Feature::create($request->validated());
        if ($request->hasFile('icon')) {
            $uploadImageService->upload($feature, 'icon', 'feature_icon', false, false);
        }
        return redirect(route('backend.features.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Feature $feature)
    {
        abort_if(Gate::denies('features show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            return view('backend.features.show', compact('feature'));
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }
    }

    public function edit(Feature $feature)
    {
        abort_if(Gate::denies('features edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        return view('backend.features.form', compact('feature', 'edit'));
    }

    public function update(FormFeatureRequest $request, Feature $feature, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('features edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feature->update($request->validated());

        if ($request->hasFile('icon')) {
            if (!empty($feature->getFirstMedia('feature_icon'))) {
                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
            } else {
                $uploadImageService->upload($feature, 'icon', 'feature_icon', false, false);
            }
        }
        return redirect()->route('backend.features.index')->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Feature $feature)
    {
        abort_if(Gate::denies('features delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::transaction(function () use ($feature) {
                $feature->delete();
            });

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('features delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            ->addColumn('icon', function (Feature $feature) {
                if ($feature->getFirstMedia('feature_icon')) {
                    return '<img src="' . $feature->getFirstMediaUrl('feature_icon', 'thumb-small') . '" alt="' . $feature->transname . '" style="width:26px; object-fit: contain;">';
                }
            })
            ->addColumn('name', function (Feature $feature) {
                return $feature->transname ?? '';
            })
            ->addColumn('description', function (Feature $feature) {
                return Str::limit($feature->transdescription, 60) ?? '';
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['icon', 'name', 'status', 'actions'])
            ->skipPaging()
            ->setTotalRecords($total_filtered)
            ->setFilteredRecords($total_filtered)
            ->make(true);
    }

    public function permissions($id)
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('features show')) {
            $result .= "<a href='" . route('backend.features.show', ['feature' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('features edit')) {
            $result .= "<a href='" . route('backend.features.edit', ['feature' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('features delete')) {
            $result .= "<a href='" . route('backend.features.destroy', ['feature' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
