@extends('layouts.frontend.master')
@section('title')
    {{ !empty($menu['menu']) ? $menu['transtitle'] : '' }}
@endsection
@section('keyword')
    {{ !empty($menu['keyword']) ? $menu['transkeyword'] : '' }}
@endsection
@section('description')
    {{ !empty($menu['description']) ? $menu['transdescription'] : '' }}
@endsection
@section('head')
@endsection
@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <div class="spacer-single"></div>
                            <h1>{{ $company->transname }}</h1>
                            {{-- <p>You &amp; your family covered.</p> --}}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-about-us-2" class="no-padding" data-bgcolor="#F2F6FE">
            <div class="image-container col-md-6 pull-left"
                data-bgimage="url({{ $company->getFirstMediaUrl('company_image', 'thumb-large') }}) center"></div>

            <div class="container">
                <div class="row">
                    <div class="inner-padding">
                        <div class="col-md-6 offset-md-7" data-animation="fadeInRight" data-delay="200">
                            <span class="p-title invert">Priva Insurance</span><br>
                            <h2>
                                {{ $company->transtitle }}
                            </h2>
                            <div class="small-border sm-left"></div>

                            <p>{{ $company->transdescription }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

        </section>

        <section>
            <div class="container">
                <div class="row">
                    @forelse ($features as $item)
                        <div class="col-lg-4 col-md-6 mb30">
                            <div class="f-box f-border f-icon-left f-icon-rounded">
                                <i class="icofont-checked bg-color text-light"></i>
                                <div class="fb-text">
                                    <h4>{{$item->transname}}</h4>
                                    <p>{{$item->transdescription}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    <div>
                    </div>
        </section>

        {{-- <section id="section-about-us-2" class="no-padding" data-bgcolor="#F2F6FE">
        <div class="image-container col-md-6 pos-right" data-bgimage="url(images/background/10.jpg) center"></div>

        <div class="container">
            <div class="row">
                <div class="inner-padding pos-left">
                    <div class="col-md-6" data-animation="fadeInRight" data-delay="200">
                        <span class="p-title invert">Priva Insurance</span><br>
                        <h2>
                            Protection you<br>and your family
                        </h2>
                        <div class="small-border sm-left"></div>

                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat.

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

    </section> --}}

        <section class="bg-color text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2><span class="id-color-secondary">Call us</span> for further information. Priva customer care is
                            here to help you <span class="id-color-secondary">anytime</span>.</h2>
                        <p class="lead">We're available for 24 hours!</p>
                    </div>

                    <div class="col-md-6 text-lg-center text-sm-center">
                        <div class="phone-num-big">
                            <i class="fa fa-phone id-color-secondary"></i>
                            <span class="pnb-text">
                                Call Us Now
                            </span>
                            <span class="pnb-num">
                                1 200 333 800
                            </span>
                        </div>
                        <a href="#" class="btn-custom capsule med">Contact Us</a>
                        <div class="socials sm-hide">
                            <span class="topbar-widget tb-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-fun-facts" class="pt60 pb60" data-bgcolor="#F2F6FE">
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

    </div>
    <!-- content close -->

    <a href="#" id="back-to-top"></a>
@endsection
@section('scripts')
    <script></script>
@endsection
