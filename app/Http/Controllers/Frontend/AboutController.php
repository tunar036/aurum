<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $teams =Chef::active()->orderBy('id','DESC')->get();
        $services = Service::active()->orderBy('id','DESC')->take(3)->get();

        return view('frontend.pages.about',compact('teams','services'));
    }
}