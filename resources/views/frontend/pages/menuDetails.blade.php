@extends('layouts.frontend.master')
@section('title')
@endsection
@section('keyword')
@endsection
@section('description')
@endsection
@section('head')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: white;
        }
    </style>
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
        <!-- MENU DETAILS STARTS
                                                                                                                      ========================================================================= -->
        <div class="container menu-details">
            <div class="row">
                <!-- Flex Slider Starts -->
                <div class="col-lg-6 col-md-6 pics-gallery" data-animation="fadeInUp" data-animation-delay="200">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($product->getMedia('product_images') as $image)
                            <div class="swiper-slide">
                                <img src="{{$image->getUrl()}}" />
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <!-- Flex Slider Ends -->
                <div class="col-lg-6 col-md-6 animated" data-animation="fadeInUp" data-animation-delay="400">
                    <div class="herotext clearfix">
                        <div class="pull-left">
                            <h1>{{ $product->name }}</h1>
                            <div class="line"></div>
                            <div class="star">
                                <ul>
                                    @for ($i = 0; $i < 5; $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                        <div class="price pull-right">{{ $product->price }} &#8380</div>
                    </div>
                    <div class="description">{!! $product->text !!}</div>
                    <!-- Add to Cart Starts -->
                    <div class="row add-to-cart">
                        <livewire:components.detail wire:key="addCArt" :product=$product />
                    </div>
                    <!-- Add to Cart Ends -->
                </div>
            </div>
        </div>
        <!-- /. MENU DETAILS ENDS
                                                                                                                      ========================================================================= -->
        <!-- RELATED RECIPE STARTS
                                                                                                                      ========================================================================= -->
        <div class="related-recipe light-grey-bg">
            <div class="container">
                <div class="row">
                    <div class="herotext animated" data-animation="fadeInUp" data-animation-delay="400">
                        <p class="box-heading">
                            <span>Simulars</span>
                        </p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($similarProducts as $similarProduct)
                        <div class="col-lg-4 col-md-4 animated" data-animation="fadeInUp" data-animation-delay="600">
                            <div class="picture">
                                <img src="{{ $similarProduct->getFirstMediaUrl('product_images', 'thumb-medium') }}"
                                    class="img-responsive" alt="" />
                                <!-- Picture Overlay Starts -->
                                <div class="portfolio-overlay-2">
                                    <div class="icons">
                                        <div>
                                            <h1>{{ $similarProduct->name }}</h1>
                                            <p class="line"></p>
                                            <p class="price-item">
                                                <span>{{ $similarProduct->price }}<sup>&#8380</sup></span>
                                            </p>
                                            <p class="rating">
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-empty"></i>
                                            </p>
                                            <span class="icon">
                                                <livewire:components.cart :product=$product />
                                                | <a href="{{ route('frontend.product.show', $similarProduct->id) }}"
                                                    class="#">Detail</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Picture Overlay Ends -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /. RELATED RECIPIE STARTS
                                                                                                                      ========================================================================= -->
    </div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
