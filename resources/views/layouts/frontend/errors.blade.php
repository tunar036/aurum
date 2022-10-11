<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.frontend.meta')
    @include('layouts.frontend.head')
    @yield('head')
    <title>@yield('title', config('app.name'))</title>
</head>

<body>
    @yield('content')
    @include('layouts.frontend.scripts')
    @yield('scripts')
    @stack('scripts')
</body>

</html>
