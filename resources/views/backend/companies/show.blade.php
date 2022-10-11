@extends('layouts.backend.master')
@section('title', trans('backend.titles.companies'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'companies', 'id' => $company->id])
                    @include('backend.companies.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'companies', 'id' => ['company' => $company->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
