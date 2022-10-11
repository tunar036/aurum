<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = Blog::active()->orderBy('id','DESC')->get();
        return view('frontend.pages.news',compact('news'));
    }

    public function show($id)
    {
        $item = Blog::findOrFail($id);
        return view('frontend.pages.news-single',compact('item'));
    }
}