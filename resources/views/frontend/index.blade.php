@extends('layouts.frontend.master')
@section('title')
    Aurum
@endsection
@section('keyword')
    Aurum
@endsection
@section('description')
    Aurum
@endsection
@section('head')
@endsection
@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section aria-label="section" class="no-top no-bottom vh-100 text-light text-center"
            data-bgimage="url(	https://www.madebydesignesia.com/themes/priva/images/background/19.jpg) top">
            <div class="v-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 offset-md-3">
                            <h1 class="text-uppercase">{{$homepage_title}}</h1>
                            <p class="lead">{{$homepage_desc}}</p>
                            <div class="mb-sm-30"></div>
                        </div>

                        <div class="col-md-12">
                            <div class="de-flex">
                                @forelse ($companies as $item)
                                    <a href='{{ route('frontend.company.show', $item->id) }}' class="icon-box s2 rounded">
                                        <i class="icofont-group"></i>
                                        <span>{{ $item->transname }}</span>
                                    </a>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    @foreach ($services as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="feature-box f-boxed style-3">
                                <i class="bg-color i-boxed fa fa-comments"></i>
                                <div class="text">
                                    <h4>{{ $item->transname }}</h4>
                                    {{ $item->transdescription }}
                                </div>
                                <i class="wm fa fa-comments"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="section-highlight" class="bg-color text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="p-title invert text-light">About</span><br>
                        <h2>
                            Save time and money on <br>your auto insurance
                        </h2>
                    </div>
                    <div class="col-md-6">
                        <p>Consequat occaecat ullamco amet non eiusmod nostrud dolore irure incididunt est duis anim
                            sunt officia. Fugiat velit proident aliquip nisi incididunt nostrud exercitation
                            proident est nisi. Irure magna elit commodo anim ex veniam culpa eiusmod id nostrud sit
                            cupidatat in veniam ad. Eiusmod consequat eu adipisicing minim anim aliquip cupidatat
                            culpa excepteur quis. Occaecat sit eu exercitation irure Lorem incididunt nostrud.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-about-us-2" class="no-padding" data-bgcolor="#F2F6FE">
            <div class="image-container col-md-6 pull-left"
                data-bgimage="url({{$about_page->getFirstMediaUrl('background_images','thumb-large')}}) center">
            </div>

            <div class="container">
                <div class="row">
                    <div class="inner-padding">
                        <div class="col-md-6 offset-md-7" data-animation="fadeInRight" data-delay="200">
                            <span class="p-title invert text-light">{{$about_page->transname}}</span><br>
                            <h2>
                                {{$about_page->transtitle}}
                            </h2>
                            <div class="small-border bg-color-secondary sm-left"></div>

                            <p>{!!$about_page->transtext!!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

        </section>

        <section id="section-testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <span class="p-title invert text-light">Latest</span><br>
                            <h2>Customer Reviews</h2>
                            <div class="small-border"></div>
                        </div>
                        <div class="owl-carousel owl-theme" id="testimonial-carousel">
                            @foreach ($reviews as $item)
                                <div class="item">
                                    <div class="de_testi opt-2 review">
                                        <blockquote>
                                            <i class="fa fa-quote-left id-color-secondary"></i>
                                            <h3>{{$item->transtitle}}</h3>
                                            <p>{{$item->transdescription}}</p>
                                            <div class="de_testi_by"><span><img src="images/people/1.jpg"
                                                        alt=""></span><span class="text-dark">{{$item->transname}}</span>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="spacer-double"></div>

            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-2 col-md-3 wow fadeInUp mb-sm-30" data-wow-delay="0s">
                        <div class="de_count">
                            <h3><span class="timer" data-to="4500" data-speed="3000">0</span></h3>
                            <h5 class="id-color">Home Protected</h5>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 wow fadeInUp mb-sm-30" data-wow-delay=".25s">
                        <div class="de_count">
                            <h3><span class="timer" data-to="16" data-speed="3000">0</span>k</h3>
                            <h5 class="id-color">People Saved</h5>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 wow fadeInUp mb-sm-30" data-wow-delay=".4s">
                        <div class="de_count">
                            <h3><span class="timer" data-to="4" data-speed="3000">0</span>m</h3>
                            <h5 class="id-color">Money Saved</h5>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 wow fadeInUp mb-sm-30" data-wow-delay=".6s">
                        <div class="de_count">
                            <h3><span class="timer" data-to="52" data-speed="3000">0</span>k</h3>
                            <h5 class="id-color">Contract Signed</h5>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 wow fadeInUp mb-sm-30" data-wow-delay=".8s">
                        <div class="de_count">
                            <h3><span class="timer" data-to="100" data-speed="3000">0</span>+</h3>
                            <h5 class="id-color">Countries</h5>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 wow fadeInUp mb-sm-30" data-wow-delay="1s">
                        <div class="de_count">
                            <h3><span class="timer" data-to="2" data-speed="3000">2</span>k</h3>
                            <h5 class="id-color">Staff Member</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section data-bgimage="url(https://www.madebydesignesia.com/themes/priva/images/background/21.jpg) top"
            class="text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInRight" data-wow-delay=".2s">
                        <h2>Call us for further information. Priva customer care is here to help you anytime.</h2>
                        <p class="lead id-color-secondary">We're available for 24 hours!</p>
                    </div>

                    <div class="col-md-6 text-lg-center text-sm-center wow fadeInRight" data-wow-delay=".4s">
                        <div class="phone-num-big">
                            <i class="fa fa-phone id-color-secondary"></i>
                            <span class="pnb-text">
                                Call Us Now
                            </span>
                            <span class="pnb-num">
                                1 200 333 800
                            </span>
                        </div>
                        <a href="#" class="btn-custom invert capsule med">Contact Us</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->

    <a href="#" id="back-to-top"></a>
@endsection
@section('scripts')
    <script></script>
@endsection
