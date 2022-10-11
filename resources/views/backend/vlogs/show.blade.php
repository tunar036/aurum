@extends('layouts.backend.master')
@section('title', trans('backend.titles.vlogs'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'vlogs', 'id' => $vlog->id])
                    @include('backend.vlogs.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'vlogs', 'id' => ['vlog' => $vlog->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
