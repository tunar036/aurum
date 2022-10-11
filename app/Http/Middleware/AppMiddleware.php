<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Setting;
use App\Services\Components\CartService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class AppMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $settings = collect(Setting::with('translations')->get());
        $menus = collect(Menu::with('translations')->get());
        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        $default_langs = Cache::rememberForever('default_langs', function () {
            return optional(Language::default()->first())->code ?? config('app.locale');
        });

        $contact_title = $settings->where('name', 'contact_title')->first()['content'] ?? '';
        $contact_phone = $settings->where('name', 'phone')->first()['content'] ?? '';
        $contact_email = $settings->where('name', 'email')->first()['content'] ?? '';
        $contact_location = $settings->where('name', 'location')->first()['content'] ?? '';
        $homepage_title = $menus->where('name', 'homepage')->first()['transtitle'] ?? '';
        $homepage_desc = $menus->where('name', 'homepage')->first()['transdescription'] ?? '';
        $menus = Menu::parentList()->get();
        $about_page = Menu::findOrFail(1);
        $footer_photo = Menu::find(8);
        $companies = Company::active()->get();
        View::share([
            'homepage_title' =>$homepage_title,
            'homepage_desc'=>$homepage_desc,
            'about_page' => $about_page,
            'request' => $request,
            'settings' => $settings,
            'langs' => $active_langs,
            'default_langs'   => $default_langs,
            'default_lang'   => config('app.locale'),
            'locale'   => config('app.locale'),
            'menus' => $menus,
            'footer_photo' => $footer_photo,
            'companies' => $companies,
            'contact_title' => $contact_title,
            'contact_phone' => $contact_phone,
            'contact_location' => $contact_location,
            'contact_email' => $contact_email,
        ]);

        return $next($request);
    }
}
