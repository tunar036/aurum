@extends('layouts.backend.master')
@section('title', trans('backend.titles.careers'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'careers', 'id' => $career->id])
                    @include('backend.careers.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'careers', 'id' => ['career' => $career->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
