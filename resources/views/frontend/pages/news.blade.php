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
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="text-light"
            data-bgimage="url(https://www.designesia.com/themes/priva/images/background/subheader.jpg) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h1>News</h1>
                            {{-- <p>Anim pariatur cliche reprehenderit</p> --}}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->


        <!-- section begin -->
        <section aria-label="section">
            <div class="container">
                <div class="row">
                    @forelse ($news as $item)
                        <div class="col-lg-4 col-md-6 mb30">
                            <a href="{{route('frontend.news.show',$item->id)}}" class="bloglist item">
                                <div class="post-content">
                                    <div class="post-image">
                                        <img alt="" src="{{$item->getFirstMediaUrl('blog_images','thumb-medium')}}">
                                    </div>
                                    <div class="post-text">
                                        <span class="p-tagline">Company</span>
                                        <h4>{{$item->transtitle}}</h4>
                                        <p>{{  Str::limit(strip_tags($item->transtext),110) }}</p>
                                        <span class="p-date">{!! date('d M Y', strtotime($item->created_at)) !!}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                    @endforelse
                    <div class="spacer-single"></div>

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
