<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function all()
    {
        $blogs = Blog::active()->latest()->paginate(8);

        return view('frontend.pages.blogs.all', compact('blogs'));
    }

    public function show()
    {
        return view('frontend.pages.blogs.show');
    }
}
