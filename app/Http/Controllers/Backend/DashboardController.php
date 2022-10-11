<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Faq;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function __invoke()
    {
        abort_if(Gate::denies('admins index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counts = Cache::rememberForever('counts', function () {
            return [
                'menus' => Menu::count(),
                'sliders' => Slider::count(),
                'users' => User::count(),
                'categories' => Category::count(),
                'faqs' => Faq::count(),
                'settings' => Setting::count(),
                'companies' =>Company::count(),
            ];
        });

        return view('backend.dashboard.index', [
            'totalMenus' => $counts['menus'],
            'totalSliders' => $counts['sliders'],
            'totalUsers' => $counts['users'],
            'totalCategories' => $counts['categories'],
            'totalFaqs' => $counts['faqs'],
            'totalSettings' => $counts['settings'],
            'totalCompanies' => $counts['companies'],
        ]);

    }
}
