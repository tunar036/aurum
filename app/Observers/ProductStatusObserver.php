<?php

namespace App\Observers;

use App\Models\ProductStatus;

class ProductStatusObserver
{
    public function created(ProductStatus $productStatus)
    {
                cache()->forget('counts');
    }

    public function updated(ProductStatus $productStatus)
    {
                cache()->forget('counts');
    }

    public function deleted(ProductStatus $productStatus)
    {
                cache()->forget('counts');
    }

    public function restored(ProductStatus $productStatus)
    {
                cache()->forget('counts');
    }

    public function forceDeleted(ProductStatus $productStatus)
    {
                cache()->forget('counts');
    }
}
