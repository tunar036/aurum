<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function register()
    {}

    public function boot()
    {
        Blade::directive('favicon', function ($expression)
        {
            return "<link rel='shortcut icon' href='{{ asset($expression) }}'>";
        });

        Blade::directive('font', function ($expression)
        {
            return "<link rel='stylesheet' href='{{ $expression }}'>";
        });

        Blade::directive('css', function ($expression)
        {
            return "<link rel='stylesheet' type='text/css' href='{{ asset($expression) }}'>";
        });

        Blade::directive('js', function ($expression)
        {
            return "<script src='{{ asset($expression) }}'></script>";
        });
    }
}