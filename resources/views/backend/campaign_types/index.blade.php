@extends('layouts.backend.master')
@section('title', trans('backend.titles.campaign_types'))
@section('styles')
    @css('backend/css/sweetalert.min.css')
    @css('backend/css/datatables.bundle.css')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.card.header', ['page' => 'campaign_types'])
                    <div class="card-body">
                        <table class="table table-separate table-head-custom table-checkable" id="datatable">
                            <thead>
                            <tr>
                                <th>@lang('backend.labels.id')</th>
                                <th>@lang('backend.labels.name')</th>
                                <th>@lang('backend.labels.status')</th>
                                <th>@lang('backend.labels.actions')</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @js('backend/js/sweetalert.min.js')
    @js('backend/js/datatables.bundle.js')
    @include('backend.campaign_types.scripts.index')
@endsection
