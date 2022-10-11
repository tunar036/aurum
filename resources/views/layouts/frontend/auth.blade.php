<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.frontend.meta')
    @include('layouts.frontend.head')
    @yield('head')
    @livewireStyles
    <title>@yield('title',config('app.name'))</title>
</head>
<body>
<header>
    @include(('frontend.includes.header.navigation'))
    @include(('frontend.includes.header.main'))
</header>

@yield('content')
@include('layouts.frontend.scripts')
@yield('scripts')
@livewireScripts
@stack('scripts')
</body>
</html>
