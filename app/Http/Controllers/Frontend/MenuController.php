<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Faq;
use App\Models\Menu;

class MenuController extends Controller
{
    public function __invoke($slug)
    {
        $menu = Menu::with('translations')->whereTranslation('slug', $slug)->firstOrFail();

        if (isset($menu) && $menu->id == 1) {
            return redirect()->route('frontend.home');

        } elseif (isset($menu) && $menu->id == 2) {
            $categories = Category::OrderBy('id','asc')->where('status',1)->get();
            return view('frontend.pages.categories',compact('categories','menu'));
        } elseif (isset($menu) && $menu->id == 3) {
            $chefs = Chef::orderBy('id', 'desc')->active()->get();
            return view('frontend.pages.about', compact('chefs','menu'));
        } elseif (isset($menu) && $menu->id == 4) {
            return  view('frontend.pages.contact',compact('menu'));
        }


        // elseif (isset($menu) && $menu->id == 16) {
        //     $blogs = Blog::active()->latest()->paginate(8);
        //     return view('frontend.pages.blogs.all', compact('blogs', 'menu'));
        // }

        //        elseif (isset($menu)) {
        //            return view('frontend.pages.page', compact('menu'));
        //        }
        else {
            return redirect()->to('/');
        }
    }
}
