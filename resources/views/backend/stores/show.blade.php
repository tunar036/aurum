@extends('layouts.backend.master')
@section('title', trans('backend.titles.stores'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'stores', 'id' => $store->id])
                    @include('backend.stores.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'stores', 'id' => ['store' => $store->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
