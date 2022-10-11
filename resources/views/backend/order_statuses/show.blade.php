@extends('layouts.backend.master')
@section('title', trans('backend.titles.order-statuses'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'order-statuses', 'id' => $order_status->id])
                    @include('backend.order_statuses.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'order-statuses', 'id' => ['order_status' => $order_status->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
