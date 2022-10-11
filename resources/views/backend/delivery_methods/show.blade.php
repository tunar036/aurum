@extends('layouts.backend.master')
@section('title', trans('backend.titles.delivery-methods'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'delivery-methods', 'id' => $delivery_method->id])
                    @include('backend.delivery_methods.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'delivery-methods', 'id' => ['delivery_method' => $delivery_method->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
