<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show($id)
    {

         $product =  Product::where('id',$id)->firstOrFail();
//         $product->load(['options','options.group','badges','colors']);
        $menu = Menu::find(2);

         $similarProducts = Product::where('id', '!=', $product->id)->where('category_id', $product->category_id)->where('status',1)->limit(3)->get();

        return view('frontend.pages.menuDetails', compact('product','similarProducts','menu'));

    }
}
