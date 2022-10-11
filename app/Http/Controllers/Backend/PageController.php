<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormPageRequest;
use App\Interfaces\DatatableInterface;
use App\Models\Page;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller implements DatatableInterface
{

    public function index()
    {
        abort_if(Gate::denies('pages index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(Page::all());
        }

        return view('backend.pages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pages create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        return view('backend.pages.form', compact('edit'));
    }

    public function store(FormPageRequest $request)
    {
        abort_if(Gate::denies('pages create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Page::create($request->validated());

        return redirect(route('backend.pages.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Page $page)
    {
        abort_if(Gate::denies('pages show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        abort_if(Gate::denies('pages edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.pages.form', compact('page', 'edit'));
    }

    public function update(FormPageRequest $request, Page $page)
    {
        abort_if(Gate::denies('pages edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page->update($request->validated());

        return redirect(route('backend.pages.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Page $page)
    {
        abort_if(Gate::denies('pages delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $page->delete();
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
            ->addColumn('name', function ($row) {
                return $row->transname;
            })
            ->addColumn('page_title', function ($row) {
                return $row->transpagetitle;
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('pages show')) {
            $result .= "<a href='" . route('backend.pages.show', ['page' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('pages edit')) {
            $result .= "<a href='" . route('backend.pages.edit', ['page' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('pages delete')) {
            $result .= "<a href='" . route('backend.pages.destroy', ['page' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
