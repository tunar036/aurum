<?php

namespace App\Observers;

use App\Models\Slider;

class SliderObserver
{
    public function created(Slider $slider)
    {
        cache()->forget('counts');
    }

    public function updated(Slider $slider)
    {
        cache()->forget('counts');
    }

    public function deleted(Slider $slider)
    {
        cache()->forget('counts');
    }

    public function restored(Slider $slider)
    {
        cache()->forget('counts');
    }

    public function forceDeleted(Slider $slider)
    {
        cache()->forget('counts');
    }
}
