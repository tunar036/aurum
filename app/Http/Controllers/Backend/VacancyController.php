<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormVacansyRequest;
use App\Interfaces\DatatableInterface;
use App\Models\District;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class VacancyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vacancies index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            $limit = request('length');
            $start = request('start');
            $count = Vacancy::count();
            $data = Vacancy::latest()->offset($start)->limit($limit)->get();

            return $this->dataTable($data, $count);
        }

        return view('backend.vacancies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vacancies create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;

        return view('backend.vacancies.form', compact('edit'));
    }

    public function store(FormVacansyRequest $request)
    {
        abort_if(Gate::denies('vacancies create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::transaction(function () use ($request) {
                $vacancy = Vacancy::create($request->validated());
            });
        }
        catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return redirect()->route('backend.vacancies.index')->withSuccess(trans('backend.messages.success.create'));
    }

        public function show(Vacancy $vacancy)
        {
            abort_if(Gate::denies('vacancies show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            return view('backend.vacancies.show', compact('vacancy'));
        }

        public function edit(Vacancy $vacancy)
        {
            abort_if(Gate::denies('vacancies edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            $edit = true;

            return view('backend.vacancies.form', compact('edit' ,'vacancy'));
        }

        public
        function update(FormVacansyRequest $request, Vacancy $vacancy)
        {
            abort_if(Gate::denies('vacancies edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            try {
                DB::transaction(function () use ($request, $vacancy) {
                    $vacancy->update($request->validated());
                });
            }
            catch (\Exception $e) {
                Log::error($e->getMessage());
            }

            return redirect()->route('backend.vacancies.index')->withSuccess(trans('backend.messages.success.create'));

        }

        public function destroy(Vacancy $vacancy)
        {
            try {
                $vacancy->delete();

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
                ->addColumn('name', function ($row) {
                    return $row->transname;
                })
                ->addColumn('status', function ($row) {
                    return badge($row->status);
                })
                ->addColumn('actions', function ($row) {
                    return $this->permissions($row->id);
                })
                ->rawColumns(['status', 'actions'])
                ->skipPaging()
                ->setTotalRecords($count)
                ->setFilteredRecords($count)
                ->make(true);
        }

        public function permissions($id): string
        {
            $class = 'btn btn-sm btn-icon btn-clean';
            $result = '';

            if (admin()->can('vacancies show')) {
                $result .= "<a href='" . route('backend.vacancies.show', ['vacancy' => $id]) . "'";
                $result .= " class='$class'><i class='la la-eye'></i></a>";
            }

            if (admin()->can('vacancies edit')) {
                $result .= "<a href='" . route('backend.vacancies.edit', ['vacancy' => $id]) . "'";
                $result .= " class='$class'><i class='la la-edit'></i></a>";
            }

            if (admin()->can('vacancies delete')) {
                $result .= "<a href='" . route('backend.vacancies.destroy', ['vacancy' => $id]) . "'";
                $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
            }

            return $result;
        }
    }
