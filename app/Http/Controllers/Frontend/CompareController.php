<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class CompareController extends Controller
{
    public function __invoke()
    {
        return view('frontend.pages.compare');
    }
}
