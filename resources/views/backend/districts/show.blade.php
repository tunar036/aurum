@extends('layouts.backend.master')
@section('title', trans('backend.titles.districts'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'districts', 'id' => $district->id])
                    @include('backend.districts.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'districts', 'id' => ['district' => $district->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
