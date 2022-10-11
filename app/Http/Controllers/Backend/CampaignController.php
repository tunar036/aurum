<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormCampaignRequest;
use App\Interfaces\DatatableInterface;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Category;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CampaignController extends Controller implements DatatableInterface
{
    public function index()
    {
        abort_if(Gate::denies('campaigns index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(Campaign::all());
        }

        return view('backend.campaigns.index');

    }

    public function create()
    {
        abort_if(Gate::denies('campaigns create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        $categories = Category::all();

        return view('backend.campaigns.form', compact('edit', 'categories', 'brands'));

    }

    public function store(FormCampaignRequest $request, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('campaigns create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign = Campaign::create($request->validated());

        if ($request->hasFile('image')) {
            $uploadImageService->upload($campaign, 'image', 'campaign_image', false, false);
        }

        return redirect()->route('backend.campaigns.index')->withSuccess(trans('backend.messages.success.create'));

    }

    public function show(Campaign $campaign)
    {
        abort_if(Gate::denies('campaigns show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.campaigns.show', compact('campaign'));

    }

    public function edit(Campaign $campaign)
    {
        abort_if(Gate::denies('campaigns edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        $categories = Category::all();


        return view('backend.campaigns.form', compact('campaign', 'edit', 'categories', 'brands'));

    }

    public function update(FormCampaignRequest $request, Campaign $campaign, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('campaigns edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->update($request->validated());

        if ($request->hasFile('image')) {
            if (!empty($campaign->getFirstMedia('campaign_image'))) {
                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
            } else {
                $uploadImageService->upload($campaign, 'image', 'campaign_image', false, false);
                return redirect()->route('backend.campaigns.index')->withSuccess(trans('backend.messages.success.update'));
            }
        }


        return redirect()->route('backend.campaigns.index')->withSuccess(trans('backend.messages.success.create'));

    }

    public function destroy(Campaign $campaign)
    {
        abort_if(Gate::denies('campaigns delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $campaign->delete();
            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('campaigns delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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


    public function dataTable($data)
    {
        return datatables()
            ->of($data)
            ->addColumn('image', function (Campaign $campaign) {
                if (isset($campaign)) {
                    $src = $campaign->getFirstMediaUrl('campaign_image', 'thumb-small') ?: asset('backend/img/noimage.jpg');
                }
                return '<img src="' . $src . '" alt="' . $campaign->transname . '" style="width:26px; object-fit: contain;">';
            })
            ->addColumn('name', function ($row) {
                return $row->transname;
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('created_at', function($row)
            {
                return $row->created_at->format('d-m-Y H:i:s');
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['image', 'status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('campaigns show')) {
            $result .= "<a href='" . route('backend.campaigns.show', ['campaign' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('campaigns edit')) {
            $result .= "<a href='" . route('backend.campaigns.edit', ['campaign' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('campaigns delete')) {
            $result .= "<a href='" . route('backend.campaigns.destroy', ['campaign' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }


}
