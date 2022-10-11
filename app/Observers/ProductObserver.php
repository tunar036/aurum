<?php

namespace App\Observers;


use App\Models\Product;
use Illuminate\Support\Facades\Artisan;

class ProductObserver
{
    public function created(Product $product)
    {
        Artisan::call('cache:clear');
    }

    public function updated(Product $product)
    {
        Artisan::call('cache:clear');
    }

    public function deleted(Product $product)
    {
        Artisan::call('cache:clear');
    }

    public function restored(Product $product)
    {}

    public function forceDeleted(Product $product)
    {}
}
