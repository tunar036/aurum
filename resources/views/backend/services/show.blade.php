@extends('layouts.backend.master')
@section('title', trans('backend.titles.services'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'services', 'id' => $service->id])
                    @include('backend.services.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'services', 'id' => ['service' => $service->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
