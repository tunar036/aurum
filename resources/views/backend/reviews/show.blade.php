@extends('layouts.backend.master')
@section('title', trans('backend.titles.reviews'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'reviews', 'id' => $review->id])
                    @include('backend.reviews.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'reviews', 'id' => ['review' => $review->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
