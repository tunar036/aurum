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
    {{-- @dd($about_page) --}}
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="text-light"
            data-bgimage="url(https://www.designesia.com/themes/priva/images/background/subheader3.jpg) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col text-center">
                            <div class="spacer-single"></div>
                            <h1>{{ $about_page->transname }}</h1>
                            {{-- <p>This is how our company began.</p> --}}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->


        <section aria-label="section" data-bgcolor="#ffffff">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <span class="p-title invert">{{ $about_page->transname }}</span><br>
                        <h2>{{ $about_page->transtitle }}</h2>
                        <p>{!! $about_page->transtext !!}</p>
                    </div>

                    <div class="col-md-6 offset-md-1">
                        <div class="de-images">
                            {{-- <img class="di-small-2" src="{{asset('frontend')}}/images/misc/d2.jpg" alt="" /> --}}
                            <img class="di-big img-fluid"
                                src="{{ $about_page->getFirstMediaUrl('background_images', 'thumb-large') }}"
                                alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section aria-label="section" data-bgcolor="#EEF1FA">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="p-title invert">Leader Team</span><br>
                        <h2>Board of Directors</h2>
                        <div class="small-border"></div>
                    </div>
                    @forelse ($teams as $item)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb30">
                            <div class="f-profile text-center">
                                <div class="fp-wrap f-invert">
                                    <div class="fpw-overlay">
                                        {{-- <div class="fpwo-wrap">
                                            <div class="fpwow-icons">
                                                <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                                                <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                                                <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                                                <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="fpw-overlay-btm"></div>
                                    <img src="{{ $item->getFirstMediaUrl('chef_images', 'thumb-large') }}"
                                        class="fp-image img-fluid" alt="">
                                </div>

                                <h4>{{ $item->name }}</h4>
                                {{ $item->position }}
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>

        <section id="section-fun-facts" class="pt60 pb60">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <span class="p-title invert">Fun facts</span><br>
                        <h2>
                            What we did?
                        </h2>
                        <div class="small-border sm-left"></div>
                    </div>

                    <div class="col-md-8 offset-md-1">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 wow fadeInUp mb30" data-wow-delay="0s">
                                <div class="de_count">
                                    <h3><span class="timer" data-to="4500" data-speed="3000">0</span></h3>
                                    <h5 class="id-color">Home Protected</h5>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 wow fadeInUp mb30" data-wow-delay=".25s">
                                <div class="de_count">
                                    <h3><span class="timer" data-to="16" data-speed="3000">0</span>k</h3>
                                    <h5 class="id-color">People Saved</h5>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 wow fadeInUp mb30" data-wow-delay=".4s">
                                <div class="de_count">
                                    <h3><span class="timer" data-to="4" data-speed="3000">0</span>m</h3>
                                    <h5 class="id-color">Money Saved</h5>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 wow fadeInUp mb-sm-30" data-wow-delay=".6s">
                                <div class="de_count">
                                    <h3><span class="timer" data-to="52" data-speed="3000">0</span>k</h3>
                                    <h5 class="id-color">Contract Signed</h5>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 wow fadeInUp mb-sm-30" data-wow-delay=".8s">
                                <div class="de_count">
                                    <h3><span class="timer" data-to="100" data-speed="3000">0</span>+</h3>
                                    <h5 class="id-color">Countries</h5>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 wow fadeInUp mb-sm-30" data-wow-delay="1s">
                                <div class="de_count">
                                    <h3><span class="timer" data-to="2" data-speed="3000">2</span>k</h3>
                                    <h5 class="id-color">Staff Member</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section data-bgcolor="#EEF1FA">
            <div class="container">
                <div class="row">
                    @forelse ($services as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="feature-box f-boxed style-3">
                                <i class="bg-color-secondary i-boxed fa fa-comments"></i>
                                <div class="text">
                                    <h4>{{ $item->transname }}</h4>
                                    {{ $item->transdescription }}
                                </div>
                                <i class="wm fa fa-comments"></i>
                            </div>
                        </div>
                    @empty
                    @endforelse
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
