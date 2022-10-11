<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormVlogRequest;
use App\Interfaces\DatatableInterface;
use App\Models\Vlog;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VlogController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('vlogs index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
        {
            $limit = request('length');
            $start = request('start');
            $count = Vlog::count();
            $data = Vlog::latest()->offset($start)->limit($limit)->get();

            return $this->dataTable($data, $count);
        }

        return view('backend.vlogs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vlogs create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;

        return view('backend.vlogs.form',compact('edit'));
    }

    public function store(FormVlogRequest $request, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('vlogs store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::transaction(function () use ($request, $uploadImageService) {

                $vlog = Vlog::create($request->validated());

                if ($request->hasFile('image')) {
                    $uploadImageService->upload($vlog, 'image', 'vlog_images', true, false);
                }

            });
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }

        return redirect(route('backend.vlogs.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Vlog $vlog)
    {
        abort_if(Gate::denies('vlogs show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.vlogs.show', compact('vlog'));
    }

    public function edit(Vlog $vlog)
    {
        abort_if(Gate::denies('vlogs edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.vlogs.form', compact('vlog', 'edit'));
    }

    public function update(FormVlogRequest $request, Vlog $vlog, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('vlogs update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vlog->update($request->validated());

        if($request->hasFile('image')){
            $uploadImageService->upload($vlog, 'image','vlog_images',true,false);
            return redirect(route('backend.vlogs.index'))->withSuccess(trans('backend.messages.success.update'));

        }

        return redirect(route('backend.vlogs.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Vlog $vlog)
    {
        abort_if(Gate::denies('vlogs destroy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try
        {
            DB::transaction(function () use ($vlog)
            {
                $vlog->delete();
            });

            return response(['status' => 1]);
        }

        catch (\Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function coverimg(Request $request)
    {
        try {
            // Refresh the media custom_properties
            Media::where('collection_name', 'vlog_images')->where('custom_properties', '<>', '[]')->update(['custom_properties' => []]);

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


    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('vlogs delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $media = Media::findOrFail($request['id']);

            $media->delete();

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }


    public function dataTable($data, $count)
    {
        return datatables()
            ->of($data)
            ->addColumn('image', function($row)
            {
                $src = $row->getFirstMediaUrl('vlog_images','thumb-small') ?: asset('backend/img/noimage.jpg');

                return '<img src="'.$src.'" alt="'.$row->transname.'" style="width:26px; object-fit: contain;">';
            })
            ->addColumn('name', function($row)
            {
                return Str::limit($row->transname, 60);
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
            ->rawColumns(['image', 'status', 'actions'])
            ->skipPaging()
            ->setTotalRecords($count)
            ->setFilteredRecords($count)
            ->make(true);
    }

    public function permissions($id): string
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('vlogs show'))
        {
            $result .= "<a href='" . route('backend.vlogs.show', ['vlog' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('vlogs edit'))
        {
            $result .= "<a href='" . route('backend.vlogs.edit', ['vlog' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('vlogs delete'))
        {
            $result .= "<a href='" . route('backend.vlogs.destroy', ['vlog' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
