<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormChefRequest;
use App\Interfaces\DatatableInterface;
use App\Models\Chef;

//use App\Models\User;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ChefController extends Controller implements DatatableInterface
{
    public function index()
    {
        abort_if(Gate::denies('chefs index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            return $this->dataTable(Chef::latest()->get());
        }

        return view('backend.chefs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('chefs create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;
        return view('backend.chefs.form', compact('edit'));
    }

    public function store(FormChefRequest $request, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('chefs create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $chef = Chef::create($request->validated());
        if ($request->hasFile('image')) {
            $uploadImageService->upload($chef, 'image', 'chef_images', false, false);
        }
        return redirect(route('backend.chefs.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Chef $chef)
    {

        abort_if(Gate::denies('chefs show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.chefs.show', compact('chef'));
    }

    public function edit(Chef $chef)
    {
        abort_if(Gate::denies('chefs edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.chefs.form', compact('chef', 'edit'));
    }

    public function update(FormChefRequest $request, Chef $chef, UploadImageService $uploadImageService)
    {
        //        dd($request->all());
        abort_if(Gate::denies('chefs edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $chef->update($request->validated());
        if ($request->hasFile('image')) {
            $uploadImageService->upload($chef, 'image', 'chef_images', false, false);
        }

        return redirect()->route('backend.chefs.index')->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Chef $chef)
    {
        abort_if(Gate::denies('chefs delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chef->delete();

        return response(['status' => 1]);
    }

    public function dataTable($data)
    {
        return datatables()
            ->of($data)
            ->addColumn('image', function (Chef $chef) {
                if ($chef->getFirstMedia('chef_images')) {
                    return '<img src="' . $chef->getFirstMediaUrl('chef_images', 'thumb-small') . '" alt="' . $chef->transname . '" style="width:26px; object-fit: contain;">';
                }
            })
            ->editColumn('name', function ($row) {
                return $row->name;
            })
            ->editColumn('position', function ($row) {
                return $row->position ?? '';
            })
            ->editColumn('status', function ($row) {
                return badge($row->status);
            })
            ->editColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['image', 'name', 'position','status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('chefs show')) {
            $result .= "<a href='" . route('backend.chefs.show', ['chef' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('chefs edit')) {
            $result .= "<a href='" . route('backend.chefs.edit', ['chef' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('chefs delete')) {
            $result .= "<a href='" . route('backend.chefs.destroy', ['chef' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
