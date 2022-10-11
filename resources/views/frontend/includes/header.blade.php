@if (Request::is('/'))
    <div id="topbar" class="text-light">
        <div class="container">
            <div class="topbar-left sm-hide">
                <span class="topbar-widget tb-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </span>
            </div>

            <div class="topbar-right">
                <div class="topbar-right">
                    <span class="topbar-widget"><a href="#">Privacy policy</a></span>
                    <span class="topbar-widget"><a href="#">Customer Support</a></span>
                    <span class="topbar-widget"><a href="#">FAQ</a></span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endif
<header class="{{ Request::is('/') ? '' : 'transparent' }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="/">
                                <img alt="" class="logo" src="{{ asset('/frontend') }}/images/logo.webp" />
                                <img alt="" class="logo-2" src="{{ asset('/frontend') }}/images/logo.webp" />
                            </a>
                        </div>
                        <!-- logo close -->
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <!-- mainmenu begin -->
                        <ul id="mainmenu">
                            <li>
                                <a href="/">Ana səhifə<span></span></a>
                            </li>
                            <li>
                                <a href="#">Haqqımızda<span></span></a>
                                <ul>
                                    <li><a href="{{ route('frontend.about') }}">Haqqımızda</a></li>
                                    <li><a href="{{ route('frontend.news') }}">Xəbərlər</a></li>

                                    <!-- <li><a href="contact.html">Contact</a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="#">Şirkətlərimiz<span></span></a>
                                <ul>
                                    @foreach ($companies as $item)
                                        <li><a
                                                href="{{ route('frontend.company.show', $item->id) }}">{{ $item->transname }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('frontend.career') }}">Karyera</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.contact') }}">Əlaqə</a>
                            </li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="h-phone"><span>Need&nbsp;Help?</span><i class="fa fa-phone id-color-secondary"></i>
                            1 200 300 9000</div>
                        <span id="menu-btn"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
