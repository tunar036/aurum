<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.frontend.meta')
    @include('layouts.frontend.head')
    @yield('head')
    <title>@yield('title', config('app.name'))</title>
</head>

<body>
    <div id="wrapper">
        @include('frontend.includes.header')
        @yield('content')
        @include('frontend.includes.footer')
        @include('layouts.frontend.scripts')
        @yield('scripts')
        @livewireScripts
        @stack('scripts')
    </div>
</body>

</html>
