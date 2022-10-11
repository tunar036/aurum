@extends('layouts.backend.master')
@section('title', trans('backend.titles.orders'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'orders', 'id' => $order->id])
                    @include('backend.orders.tables.show')
{{--                    @include('backend.includes.table.footer', ['page' => 'orders', 'id' => ['order' => $order->id]])--}}
                </div>
            </div>
        </div>
    </div>
@endsection
