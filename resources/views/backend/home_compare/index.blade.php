@extends('layouts.backend.master')
@section('title', trans('backend.titles.home-compares'))
@section('styles')
    @css('backend/css/sweetalert.min.css')
    @css('backend/css/datatables.bundle.css')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.card.header', ['page' => 'home-compares'])
                    @include('backend.home_compare.tables.index')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @js('backend/js/sweetalert.min.js')
    @js('backend/js/datatables.bundle.js')
    @include('backend.includes.plugins.datatable',['columns'=>['id','compare_name_1','compare_image_1','compare_name_2','compare_image_2', 'status','actions'], 'route'=>route('backend.home-compares.index')])
@endsection
