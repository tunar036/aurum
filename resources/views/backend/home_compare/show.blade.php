@extends('layouts.backend.master')
@section('title', trans('backend.titles.home-compares'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'home-compares', 'id' => $home_compare->id])
                    @include('backend.home_compare.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'home-compares', 'id' => ['home_compare' => $home_compare->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
