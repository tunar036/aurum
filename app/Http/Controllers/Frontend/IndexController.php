<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\HomeCatProduct;
use App\Models\HomeCompare;
use App\Models\Menu;
use App\Models\ProductDay;
use App\Models\Slider;
use App\Models\RandProduct;
use App\Models\Review;
use App\Models\Service;
use App\Models\Vlog;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    public function index()
    {
        $companies = Company::active()->get();
        $services = Service::active()->orderBy('id','DESC')->take(3)->get();
        $reviews = Review::active()->orderBy('id','DESC')->get();

        return view('frontend.index',compact('companies','services','reviews'));
        // $menu = Menu::find(1);
        // $about = Menu::find(3);
        // $sliders = Slider::active()->orderBy('created_at', 'asc')->get();
        // $categories =  Category::orderBy('id', 'asc')->where('status', 1)->get();
        // $homeCategorySliders = HomeCatProduct::latest()->get();
        // $productOfDay = ProductDay::with(['product','product.productStatuses','product.category','product.brand','product.badges','product.options.group'])->active()->where('expired_at','>', now() )->first();
        // $compareProduct = HomeCompare::with(['products','products.productStatuses','products.category','products.brand','products.badges','products.options.group'])->active()->orderByRaw('RAND()')->first();
        // $blogs = Blog::active()->orderByDesc('created_at')->take(3)->get();
        // $vlogs = Vlog::active()->orderByDesc('created_at')->take(3)->get();
        // $randomProducts = RandProduct::with(['product','product.productStatuses','product.category','product.brand','product.badges','product.options.group'])->active()->orderByRaw('RAND()')->take(3)->get();

        // return view('frontend.index',compact('categories','homeCategorySliders','brands','compareProduct','randomProducts','sliders','productOfDay','blogs','vlogs'));
    }
}
