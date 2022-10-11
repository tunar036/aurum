<?php

namespace App\Observers;

use App\Models\Menu;
use Illuminate\Support\Facades\Cache;

class MenuObserver
{
    public function created(Menu $menu)
    {
        Cache::forget('menus');
        Cache::forget('counts');
    }

    public function updated(Menu $menu)
    {
        Cache::forget('menus');
        Cache::forget('counts');
    }

    public function deleted(Menu $menu)
    {
        Cache::forget('menus');
        Cache::forget('counts');
    }

    public function restored(Menu $menu)
    {
        Cache::forget('menus');
        Cache::forget('counts');
    }

    public function forceDeleted(Menu $menu)
    {
        Cache::forget('menus');
        Cache::forget('counts');
    }
}
