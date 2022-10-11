<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function all()
    // {
    //     $categories = Category::OrderBy('id','asc')->where('status',1)->get();
    //     return view('frontend.pages.menu',compact('categories'));
    // }

    // public function show($slug)
    // {
    //     $category = Category::getBySlug($slug);
    //     $category->load(['parent','options','subcategories']);
    //     $menu = Menu::find(2);

    //     return view('frontend.pages.categories.show', compact('category','menu'));
    // }

}
