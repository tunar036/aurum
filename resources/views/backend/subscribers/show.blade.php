@extends('layouts.backend.master')
@section('title', trans('backend.titles.subscribers'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'subscribers', 'id' => $subscriber->id])
                    @include('backend.subscribers.tables.show')
                </div>
            </div>
        </div>
    </div>
@endsection
