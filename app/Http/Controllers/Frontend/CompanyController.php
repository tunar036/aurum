<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\Feature;
use App\Models\HomeCatProduct;
use App\Models\HomeCompare;
use App\Models\Menu;
use App\Models\ProductDay;
use App\Models\Slider;
use App\Models\RandProduct;
use App\Models\Vlog;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function show($id)
    {
        $features_id = DB::table('company_feature')->where('company_id',$id)->pluck('feature_id');
        $features = Feature::active()->whereIn('id',$features_id)->get();
        
        $company =Company::active()->findOrFail($id);
        return view('frontend.pages.company_detail',compact('company','features'));
    }
}
