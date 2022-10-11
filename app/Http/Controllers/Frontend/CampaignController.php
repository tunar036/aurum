<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function all()
    {
        return view('frontend.pages.campaigns.all');
    }

    public function show()
    {
        return view('frontend.pages.campaigns.show');
    }
}
