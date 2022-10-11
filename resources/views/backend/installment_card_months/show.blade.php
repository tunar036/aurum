@extends('layouts.backend.master')
@section('title', trans('backend.titles.installment-months'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'installment-card-months', 'id' => $installment_card_month->id])
                    @include('backend.installment_card_months.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'installment-card-months', 'id' => ['installment_card_month' => $installment_card_month->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
