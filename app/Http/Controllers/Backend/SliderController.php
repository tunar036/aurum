<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormSliderRequest;
use App\Models\Slider;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SliderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sliders index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(Slider::all());
        }

        return view('backend.sliders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sliders create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;
        return view('backend.sliders.form', compact('edit'));
    }

    public function store(FormSliderRequest $request, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('sliders create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slider = Slider::create($request->validated());

        if ($request->hasFile('image')) {
            $uploadImageService->upload($slider, 'image', 'slider_image', false, false);
        }
        return redirect(route('backend.sliders.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Slider $slider)
    {
        abort_if(Gate::denies('sliders show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.sliders.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        abort_if(Gate::denies('sliders edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.sliders.form', compact('slider', 'edit'));
    }

    public function update(FormSliderRequest $request, Slider $slider, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('sliders edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slider->update($request->validated());

        if($request->hasFile('image')){
            if (!empty($slider->getFirstMedia('slider_image'))){
                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
            }
            else
            {
                $uploadImageService->upload($slider, 'image','slider_image',false,false);
                return redirect(route('backend.sliders.index'))->withSuccess(trans('backend.messages.success.update'));
            }
        }

        return redirect(route('backend.sliders.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Slider $slider)
    {
        abort_if(Gate::denies('sliders delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $slider->delete();
            return response(['status' => 1]);
        } catch (\Exception $e) {
         Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('sliders delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $media = Media::findOrFail($request['id']);
            $media->delete();
            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    protected function dataTable($data)
    {
        return datatables()
            ->of($data)
            ->addColumn('image', function (Slider $slider) {
                if (isset($slider)) {
                    $src = $slider->getFirstMediaUrl('slider_image', 'thumb-small') ?: asset('backend/img/noimage.jpg');
                }
                return '<img src="' . $src . '" alt="' . $slider->transname . '" style="width:50px; object-fit: contain;">';
            })
            ->addColumn('link', function ($row) {
                return $row->link;
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['image', 'status', 'actions'])
            ->make(true);
    }

    protected function permissions($id)
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('sliders show')) {
            $result .= "<a href='" . route('backend.sliders.show', ['slider' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('sliders edit')) {
            $result .= "<a href='" . route('backend.sliders.edit', ['slider' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('sliders delete')) {
            $result .= "<a href='" . route('backend.sliders.destroy', ['slider' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
