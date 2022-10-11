@extends('layouts.backend.master')
@section('title', trans('backend.titles.features'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'features', 'id' => $feature->id])
                    @include('backend.features.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'features', 'id' => ['feature' => $feature->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
