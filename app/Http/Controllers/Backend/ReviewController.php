<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormReviewRequest;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    use HasFactory;

    public function index()
    {
        abort_if(Gate::denies('reviews index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            $limit = request('length');
            $start = request('start');
            $data = Review::latest()->offset($start)->limit($limit)->get();
            $total_filtered = Review::count();

            return $this->dataTable($data, $total_filtered);
        }

        return view('backend.reviews.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reviews create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviews = Review::active()->get();
        $edit = false;

        return view('backend.reviews.form', compact('reviews', 'edit'));
    }

    public function store(FormReviewRequest $request)
    {
        // dd(request()->all());
        abort_if(Gate::denies('reviews create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Review::create($request->validated());
        return redirect(route('backend.reviews.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(Review $review)
    {
        abort_if(Gate::denies('reviews show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            return view('backend.reviews.show', compact('review'));
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
        }
    }

    public function edit(Review $review)
    {
        abort_if(Gate::denies('reviews edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        return view('backend.reviews.form', compact('review', 'edit'));
    }

    public function update(FormReviewRequest $request, review $review)
    {
        abort_if(Gate::denies('reviews edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $review->update($request->validated());
        return redirect()->route('backend.reviews.index')->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(Review $review)
    {
        abort_if(Gate::denies('reviews delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::transaction(function () use ($review) {
                $review->delete();
            });

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
            ->addColumn('name', function (review $review) {
                return $review->transname ?? '';
            })
            ->addColumn('title', function (review $review) {
                return $review->transtitle ?? '';
            })
            ->addColumn('description', function (review $review) {
                return Str::limit($review->transdescription, 60) ?? '';
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['name','title', 'status', 'actions'])
            ->skipPaging()
            ->setTotalRecords($total_filtered)
            ->setFilteredRecords($total_filtered)
            ->make(true);
    }

    public function permissions($id)
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('reviews show')) {
            $result .= "<a href='" . route('backend.reviews.show', ['review' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('reviews edit')) {
            $result .= "<a href='" . route('backend.reviews.edit', ['review' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('reviews delete')) {
            $result .= "<a href='" . route('backend.reviews.destroy', ['review' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}