<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Cookie;

class WishlistController extends Controller
{
    public function __invoke()
    {
        return view('frontend.pages.wishlist');
    }

}
