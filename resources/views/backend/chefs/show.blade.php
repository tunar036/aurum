@extends('layouts.backend.master')
@section('title', trans('backend.titles.chefs'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'chefs', 'id' => $chef->id])
                    @include('backend.chefs.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'chefs', 'id' => ['chef' => $chef->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
