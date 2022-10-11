<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\User;
use App\Models\Faq;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Models\Slider;
use App\Models\Store;
use App\Observers\BrandObserver;
use App\Observers\CampaignObserver;
use App\Observers\CategoryObserver;
use App\Observers\UserObserver;
use App\Observers\FaqObserver;
use App\Observers\LanguageObserver;
use App\Observers\MenuObserver;
use App\Observers\OrderObserver;
use App\Observers\ProductObserver;
use App\Observers\ProductStatusObserver;
use App\Observers\SliderObserver;
use App\Observers\StoreObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [

        Registered::class => [
            SendEmailVerificationNotification::class
        ]
    ];

    public function boot()
    {
        Menu::observe(new MenuObserver);
        Language::observe(new LanguageObserver);
        User::observe(new UserObserver);
        Product::observe(new ProductObserver);
        Order::observe(new OrderObserver);
        Category::observe(new CategoryObserver);
        Slider::observe(new SliderObserver);
        Faq::observe(new FaqObserver);
        ProductStatus::observe(new ProductStatusObserver);
        Campaign::observe(new CampaignObserver);
    }
}
