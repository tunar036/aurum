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
    <section id="subheader" class="text-light" data-bgimage="url(https://www.designesia.com/themes/priva/images/background/subheader.jpg) top">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 text-center">
                        <h1>{{$item->transtitle}}</h1>
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
                <div class="col-md-12">
                    <div class="blog-read">

                        <img alt="" src="{{$item->getFirstMediaUrl('blog_images','thumb-large')}}" class="img-fullwidth">

                        <div class="post-text">
                            <p>{!! $item->transtext!!}</p>


                            <span class="post-date">{!! date('d M Y', strtotime($item->created_at)) !!}</span>


                        </div>

                    </div>

                    <div class="spacer-single"></div>

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