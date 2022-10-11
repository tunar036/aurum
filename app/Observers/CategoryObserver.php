<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Artisan;

class CategoryObserver
{
    public function created(Category $category)
    {
        Artisan::call('cache:clear');
    }

    public function updated(Category $category)
    {
        Artisan::call('cache:clear');
    }

    public function deleted(Category $category)
    {
        Artisan::call('cache:clear');
    }

    public function restored(Category $category)
    {
        Artisan::call('cache:clear');
    }

    public function forceDeleted(Category $category)
    {
        Artisan::call('cache:clear');
    }
}
