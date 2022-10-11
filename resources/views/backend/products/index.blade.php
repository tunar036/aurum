@extends('layouts.backend.master')
@section('title', trans('backend.titles.products'))
@section('styles')
    @css('backend/css/sweetalert.min.css')
    @css('backend/css/datatables.bundle.css')
    @css('backend/css/select2.min.css')
    @css('backend/css/select2-bootstrap4.min.css')

    <style>
        .select2 {
            width:100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.card.header', ['page' => 'products'])
                    @include('backend.products.tables.index')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @js('backend/js/sweetalert.min.js')
    @js('backend/js/datatables.bundle.js')
    @js('/backend/js/select2.min.js')
    @include('backend.products.scripts.index')
@endsection
