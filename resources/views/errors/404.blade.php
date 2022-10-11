@extends('layouts.frontend.errors')
@section('title', __('Not Found'))
@section('content')
    <!-- ERROR PAGE STARTS
                       ========================================================================= -->
    <body class="error-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 logo">
                    <a class="" href="index-001.html"><img
                            src="{{ asset('frontend/images/logos/logo.png') }}" alt="" />
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text">
                    <div class="text-2">404</div>
                    <div class="text-3">Page not Found</div>
                    <div class="text-4">
                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
                        quia
                        non numquam eius modi tempora
                        incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 search">
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="email" class="form-control" id="newsletter" placeholder="Search Again" />
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="col-lg-6 col-lg-offset-3 button">
                    <a href="/" class="transparent-grey">Back to home</a>
                    <a href="contact-us.html" class="transparent-grey">Contact us</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 copyright">© 2016 ALL RIGHT RESERVED. DESIGNED BY <a href="">MOHAMED ARAFA</a></div>
            </div>
        </div>
    </body>
    <!-- /. ERROR PAGE ENDS
                                          ========================================================================= -->

@endsection
