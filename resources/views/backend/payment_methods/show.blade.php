@extends('layouts.backend.master')
@section('title', trans('backend.titles.payment_methods'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'payment-methods', 'id' => $payment_method->id])
                    @include('backend.payment_methods.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'payment-methods', 'id' => ['payment_method' => $payment_method->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
