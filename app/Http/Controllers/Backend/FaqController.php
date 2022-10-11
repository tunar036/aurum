<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormFaqRequest;
use App\Interfaces\DatatableInterface;
use App\Models\Faq;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class FaqController extends Controller implements DatatableInterface
{
    public function index()
    {
        abort_if(Gate::denies('faqs index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
        {
            return $this->dataTable(Faq::all());
        }

        return view('backend.faqs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('faqs create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;

        return view('backend.faqs.form',compact('edit'));
    }

    public function store(FormFaqRequest $request)
    {
        abort_if(Gate::denies('faqs create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Faq::create($request->validated());

        return redirect(route('backend.faqs.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Faq $faq)
    {
        abort_if(Gate::denies('faqs show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.faqs.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        abort_if(Gate::denies('faqs edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.faqs.form', compact('faq','edit'));
    }

    public function update(FormFaqRequest $request, Faq $faq)
    {
        abort_if(Gate::denies('faqs edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faq->update($request->validated());

        return redirect()->route('backend.faqs.index')->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Faq $faq)
    {
        abort_if(Gate::denies('faqs delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try
        {
            $faq->delete();
            return response(['status' => 1]);
        }

        catch (\Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function dataTable($data)
    {
        return datatables()
            ->of($data)
            ->addColumn('question', function($row)
            {
                return Str::limit($row->transquestion, 40);
            })
            ->addColumn('answer', function($row)
            {
                return Str::limit($row->transanswer, 60);
            })
            ->addColumn('status', function($row)
            {
                return badge($row->status);
            })
            ->addColumn('actions', function($row)
            {
                return $this->permissions($row->id);
            })
            ->rawColumns(['answer', 'status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('faqs show'))
        {
            $result .= "<a href='" . route('backend.faqs.show', ['faq' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('faqs edit'))
        {
            $result .= "<a href='" . route('backend.faqs.edit', ['faq' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('faqs delete'))
        {
            $result .= "<a href='" . route('backend.faqs.destroy', ['faq' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
