@extends('layouts.backend.master')
@section('title', trans('backend.titles.vacancies'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'vacancies', 'id' => $vacancy->id])
                    @include('backend.vacancies.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'vacancies', 'id' => ['vacancy' => $vacancy->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
