<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $career = Career::firstOrFail();
        $vacancies = Vacancy::active()->orderBy('id','DESC')->get();
        return view('frontend.pages.careers', compact('career','vacancies'));
    }
}
