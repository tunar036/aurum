@extends('layouts.backend.master')
@section('title', trans('backend.titles.installment_cards'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'installment-cards', 'id' => $installment_card->id])
                    @include('backend.installment_cards.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'installment-cards', 'id' => ['installment_card' => $installment_card->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
