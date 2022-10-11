@extends('layouts.frontend.master')
@section('title')
@endsection
@section('keyword')
@endsection
@section('description')
@endsection
@section('head')
@endsection
@section('content')
    <!-- /. NAVIGATION ENDS
                                                                                                                                                                                               ========================================================================= -->
    <!-- INNER BANNER STARTS
                                                                                                                                                                                               ========================================================================= -->
    <div class="inner-banner title-area text-center image-10">
        <div class="container title-area-content">
            <h1 class="animated" data-animation="fadeInUp" data-animation-delay="200">CART SHOP</h1>
            <h2 class="animated" data-animation="fadeInDown" data-animation-delay="200">CART SHOW GOOD TASTE</h2>
            <div class="line animated" data-animation="fadeInDown" data-animation-delay="400"></div>
            <div class="bread-crumb"><a href="#">Home</a> <span>Shop</span></div>
        </div>
    </div>
    <div class="white-bg">
        <div class="shop bg2">
            <livewire:components.cartindex />
        </div>
    </div>
@endsection
@section('scripts')
@endsection
