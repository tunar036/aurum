<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormFeatureRequest;
use App\Http\Requests\Backend\FormServiceRequest;
use App\Models\Service;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;


class ServiceController extends Controller
{
    use HasFactory;

    public function index()
    {
        abort_if(Gate::denies('services index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            $limit = request('length');
            $start = request('start');
            $data = Service::latest()->offset($start)->limit($limit)->get();
            $total_filtered = Service::count();

            return $this->dataTable($data, $total_filtered);
        }

        return view('backend.services.index');
    }

    public function create()
    {
        abort_if(Gate::denies('services create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::active()->get();
        $edit = false;

        return view('backend.services.form', compact('services', 'edit'));
    }

    public function store(FormServiceRequest $request, UploadImageService $uploadImageService)
    {
        // dd(request()->all());
        abort_if(Gate::denies('services create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $service = Service::create($request->validated());
        if ($request->hasFile('icon')) {
            $uploadImageService->upload($service, 'icon', 'service_icon', false, false);
        }
        return redirect(route('backend.services.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('services show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            return view('backend.services.show', compact('service'));
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('services edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        return view('backend.services.form', compact('service', 'edit'));
    }

    public function update(FormServiceRequest $request, Service $service, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('services edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->update($request->validated());

        if ($request->hasFile('icon')) {
            if (!empty($service->getFirstMedia('service_icon'))) {
                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
            } else {
                $uploadImageService->upload($service, 'icon', 'service_icon', false, false);
            }
        }
        return redirect()->route('backend.services.index')->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('services delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::transaction(function () use ($service) {
                $service->delete();
            });

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('services delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            ->addColumn('icon', function (Service $service) {
                if ($service->getFirstMedia('service_icon')) {
                    return '<img src="' . $service->getFirstMediaUrl('service_icon', 'thumb-small') . '" alt="' . $service->transname . '" style="width:26px; object-fit: contain;">';
                }
            })
            ->addColumn('name', function (Service $service) {
                return $service->transname ?? '';
            })
            ->addColumn('description', function (Service $service) {
                return Str::limit($service->transdescription, 60) ?? '';
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

        if (admin()->can('services show')) {
            $result .= "<a href='" . route('backend.services.show', ['service' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('services edit')) {
            $result .= "<a href='" . route('backend.services.edit', ['service' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('services delete')) {
            $result .= "<a href='" . route('backend.services.destroy', ['service' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}