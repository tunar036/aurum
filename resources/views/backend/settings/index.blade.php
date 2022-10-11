@extends('layouts.backend.master')
@section('title', trans('backend.titles.settings'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.card.header', ['page' => 'settings'])
                    @include('backend.settings.tables.index')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    @css('backend/css/sweetalert.min.css')
    @css('backend/css/datatables.bundle.css')
@endsection
@section('scripts')
    @js('backend/js/sweetalert.min.js')
    @js('backend/js/datatables.bundle.js')
    @include('backend.settings.scripts.index')
@endsection
