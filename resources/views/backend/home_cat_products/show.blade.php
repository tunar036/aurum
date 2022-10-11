@extends('layouts.backend.master')
@section('title', trans('backend.titles.rand-products'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'home-cat-products', 'id' => $home_cat_product->id])
                    @include('backend.home_cat_products.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'home-cat-products', 'id' => ['home_cat_product' => $home_cat_product->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
