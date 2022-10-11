<?php

namespace App\Observers;


use App\Models\Order;

class OrderObserver
{
    public function created(Order $order)
    {
        cache()->forget('counts');
    }

    public function updated(Order $order)
    {
        cache()->forget('counts');
    }

    public function deleted(Order $order)
    {
        cache()->forget('counts');
    }

    public function restored(Order $order)
    {}

    public function forceDeleted(Order $order)
    {}
}
