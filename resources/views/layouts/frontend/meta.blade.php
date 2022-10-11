<meta charset="UTF-8">
<!-- For IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- For Resposive Device -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- for Google -->
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keyword','bytelecom')" />
<meta name="author" content="bytelecom" />
<meta name="csrf_token" content="{{ csrf_token() }}">

<!-- for Facebook -->
<meta property="og:title" content='@yield('title',config('app.name'))'>
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="@yield('image',asset('/app/img/ogimage.jpg'))" />
<meta property="og:image:width"  content="@yield('imagewidth','200')">
<meta property="og:image:height" content="@yield('imageheight','200')">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:type" content="article" />
<meta property="og:description" content="@yield('description')" />
<meta name="author" content="www.bytelecom.az">
<meta property="fb:admins" content="100003660630015"/>
<meta property="fb:app_id" content="874458992733394"/>

<!-- for Twitter -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{ config('app.name') }}" />
<meta name="twitter:description" content="@yield('description')" />
<meta name="twitter:image" content="@yield('image',asset('/app/img/ogimage.jpg'))" />
<meta name="twitter:url" content="{{ config('app.name') }}">
<meta name="twitter:domain" content="{{ config('app.name') }}">
<meta name="twitter:creator" content="@bytelecom">

<!-- for Mobile-->
<meta name="MobileOptimized"  content="width">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">
<meta name="revisit-after"    content="1 days">

<meta name="mobile-web-app-capable"                content="yes">
<meta name="apple-mobile-web-app-capable"          content="yes">
<meta name="apple-touch-fullscreen"                content="yes">

<!-- for Robots -->
<meta name="robots"    content="all">
<meta name="googlebot" content="index, follow, archive">
<meta name="yahoobot"  content="index, follow, archive">
<meta name="alexabot"  content="index, follow, archive">
<meta name="msnbot"    content="index, follow, archive">
<meta name="dmozbot"   content="index, follow, archive">

<meta name="audience"     content="all">
<meta name="distribution" content="global">
<meta name="rating"       content="General">

<meta name="generator" content="https://www.bytelecom.az">
<meta name="web_author" content="Gamebox.az">
<meta name="designer" content="https://www.bytelecom.az">

<!-- DNS Prefetch -->
<link rel="dns-prefetch" href="{{ config('app.url') }}">
<link rel="dns-prefetch" href="https://www.youtube.com">
<link rel="dns-prefetch" href="https://www.facebook.com">
<link rel="dns-prefetch" href="https://www.twitter.com">
<link rel="dns-prefetch" href="https://plus.google.com">
<link rel="dns-prefetch" href="https://https://vk.com">
<link rel="dns-prefetch" href="//www.google-analytics.com">
<link rel="canonical" href="{{ url()->current() }}" />

<!-- Favicon -->
{{-- <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/app/img/favicon/apple-icon-57x57.png') }} ">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/app/img/favicon/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/app/img/favicon/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/app/img/favicon/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/app/img/favicon/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/app/img/favicon/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/app/img/favicon/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/app/img/favicon/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/app/img/favicon/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/app/img/favicon/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/app/img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/app/img/favicon/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/app/img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('/app/img/favicon/manifest.json') }}">
<meta name="msapplication-TileColor" content="#000">
<meta name="msapplication-TileImage" content="{{ asset('/app/img/favicon/ms-icon-144x144.png') }}">
<meta name="theme-color" content="#000"> --}}

@yield('meta')
