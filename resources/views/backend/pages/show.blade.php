@extends('layouts.backend.master')
@section('title', trans('backend.titles.pages'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'pages', 'id' => $page->id])
                    @include('backend.pages.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'pages', 'id' => ['page' => $page->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
