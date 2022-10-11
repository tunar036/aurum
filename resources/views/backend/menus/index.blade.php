@extends('layouts.backend.master')
@section('title', trans('backend.titles.menus'))
@section('styles')
    @css('backend/css/sweetalert.min.css')
    @css('backend/css/jquery.nestable.css')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.card.header', ['page' => 'menus'])
                    @include('backend.menus.nestables.index')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @js('backend/js/sweetalert.min.js')
    @js('backend/js/jquery.nestable.js')
    @include('backend.menus.scripts.index')
@endsection
