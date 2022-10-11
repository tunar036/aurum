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
    <!-- INNER BANNER STARTS
                       ========================================================================= -->
    <div style="background-image: url({{ $menu->getFirstMediaUrl('background_images', 'thumb-large') }});"
        class="inner-banner title-area text-center image-5">
        <div class="container title-area-content">
            <h1 class="animated" data-animation="fadeInUp" data-animation-delay="200">{{ $menu->title }}</h1>
            <h2 class="animated" data-animation="fadeInDown" data-animation-delay="200">{{ $menu->description }}</h2>
            <div class="line animated" data-animation="fadeInDown" data-animation-delay="400"></div>
            <div class="bread-crumb"><a href="/">Home</a> <span>{{ $menu->title }}</span></div>
        </div>
    </div>
    <!-- /. INNER BANNER STARTS
                                          ========================================================================= -->

    <div class="white-bg">
        @forelse($categories as $category)
            <div class="menu breakfast-menu">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="herotext animated" data-animation="fadeInUp" data-animation-delay="200">
                                <p class="box-heading">
                                    <span>{{ $category->transname }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutter-3">
                        @foreach ($category->getMedia('category_images') as $image)
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 picture animated" data-animation="fadeInUp"
                                data-animation-delay="400">
                                <img src="{{ asset($image->getUrl()) }}" class="img-responsive center-block" alt="" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <!-- Column Starts -->
                        <div class="block animated" data-animation="fadeInUp" data-animation-delay="200">
                            <div class="menu-list">
                                @foreach ($category->products as $product)
                                    <div class="menu-item">
                                        <h1>
                                            <a
                                                href="{{ route('frontend.product.show', $product->id) }}">{{ $product->name }}</a>
                                            <span class="price pull-right">{{ $product->price }} &#8380
                                                <livewire:components.cart :product=$product />
                                            </span>
                                        </h1>
                                        <div class="description">{{ Str::limit(strip_tags($product->text), 150) }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Column Ends -->
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
