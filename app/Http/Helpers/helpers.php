<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Language;
use App\Models\Product;
use App\Models\Setting;

if (! function_exists('locale'))
{
    function locale()
    {
        return app()->getlocale();
    }
}

if (! function_exists('get_credit_price'))
{
    function get_credit_price($price, $initial_price, $month)
    {
        return ($price - $initial_price) + (($price - $initial_price) * $month / 100);
    }
}

if (! function_exists('get_monthly_payment'))
{
    function get_monthly_payment($price, $initial_price, $month)
    {
        return get_credit_price($price, $initial_price, $month) / $month;
    }
}

if (! function_exists('get_taksit_price'))
{
    function get_taksit_price($price, $month)
    {
        return ((float) $price /  (float) $month);
    }
}

if (! function_exists('getBrands'))
{
    function getBrands($category_id)
    {
        $brandIds = collect(\DB::table('products')->select('category_id','brand_id')->where('category_id', $category_id)->pluck('brand_id'))->unique()->toArray();
        return \DB::table('brands')->select('id','name','slug')->whereIn('id', $brandIds)->get();
    }
}

if (! function_exists('getPaymentMethodAlpineClass'))
{
    function getPaymentMethodAlpineClass($payment_id)
    {
        $text = '';
       if($payment_id == \App\Enums\PaymentType::BUY_ON_CREDİT) {
           $text = 'creditBuy';
       }
       elseif($payment_id == \App\Enums\PaymentType::BUY_IN_INSTALLMENT) {
           $text = 'installment';
       }

       return $text;
    }
}


if (! function_exists('getDeliveryMethodAlpineClass'))
{
    function getDeliveryMethodAlpineClass($id)
    {
        $text = '';
        if($id == 1) {
            $text = 'delivery_method_1';
        }
        elseif($id == 2) {
            $text = 'delivery_method_2';
        }

        return $text;
    }
}




if (! function_exists('social_links')) {
    function social_links(){
        $return = '';

        $settings = collect(Setting::with('translations')->get());

        foreach($settings as $setting)
        {
            if($setting->name == 'facebook'){
              $return.='<li><a href="'. $setting->slug .'"><i class="fa fa-facebook"></i></a></li>';
            }

            if($setting->name =='instagram'){
                $return.='<li><a href="'. $setting->slug .'"><i class="fa fa-instagram"></i></a></li>';
            }

            if($setting->name =='whatsapp'){
                $return.='<li><a href='. $setting->slug .'""><i class="fa fa-whatsapp"></i></a></li>';
            }
        }


        return $return;
    }
}


if (! function_exists('admin'))
{
    function admin()
    {
        return auth('admin')->user();
    }
}

if (! function_exists('customer'))
{
    function customer()
    {
        return auth()->user();
    }
}

if (! function_exists('short_name'))
{
    function short_name()
    {
        $array = explode(' ', admin()->name);

        if (count($array) < 2)
        {
            return strtoupper(substr($array[0], 0, 1));
        }

        return strtoupper(substr($array[0], 0, 1)) . strtoupper(substr($array[1], 0, 1));
    }
}

if (! function_exists('notify'))
{
    function notify($type, $message)
    {
        return  "Swal.fire(
                {
                    icon:  '$type',
                    title: '$message',
                    showConfirmButton: false,
                    timer: 3000
                });";
    }
}

if (! function_exists('confirm'))
{
    function confirm()
    {
        return  "Swal.fire(
                {
                    title: '" . trans('backend.mixins.are_you_sure') . "',
                    text:  '" . trans('backend.mixins.wont_revert')  . "',
                    icon:  'warning',
                    showCancelButton:   true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor:  '#d33',
                    confirmButtonText:  '" . trans('backend.buttons.delete') . "',
                    cancelButtonText:   '" . trans('backend.buttons.cancel') . "'
                })";
    }
}


if (!function_exists('ipfind')) {
    function ipfind()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP)){
            $ip = $client;
        }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
            $ip = $forward;
        }else{
            $ip = $remote;
        }
        return $ip;
    }
}

if(! function_exists('badge'))
{
    function badge($value)
    {
        if ($value)
        {
            return '<span class="label label-lg label-inline label-light-success">' . trans('backend.mixins.active') . '</span>';
        }

        return '<span class="label label-lg label-inline label-light-danger">' . trans('backend.mixins.passive') . '</span>';
    }
}

if (! function_exists('prepare_for_createMany'))
{
    function prepare_for_createMany($key, $array = [])
    {
        $result = [];

        foreach ($array as $item)
        {
            $result[] = [$key => $item];
        }

        return $result;
    }
}

if (! function_exists('image_url'))
{
    function image_url($name)
    {
        return asset("uploads/$name");
    }
}

if (! function_exists('lang_url'))
{
    function lang_url($locale)
    {
        $url = request()->segments();
        array_shift($url);
        $segments = implode('/', $url);

        return url("$locale/$segments");
    }
}

if (! function_exists('current_lang'))
{
    function current_lang()
    {
        $result = '';

        foreach (active_langs() as $lang)
        {
            if (locale() == $lang->code)
            {
                $result = $lang->name;
                break;
            }
        }

        return $result;
    }
}

if (! function_exists('active_langs'))
{
    function active_langs()
    {
        return Language::active()->get();
    }
}

if (! function_exists('default_lang'))
{
    function default_lang()
    {
        return optional(Language::default()->first())->code ?? config('app.locale');
    }
}

if (! function_exists('created_for_blog'))
{
    function created_for_blog($datetime)
    {
        $date = explode(' ', $datetime)[0];
        $mon  = explode('-', $date)[1];
        $day  = explode('-', $date)[2];

        return "<b>$day</b> " . trans("frontend.months.$mon");
    }
}

if (! function_exists('created_for_order'))
{
    function created_for_order($datetime)
    {
        $date = explode(' ', $datetime)[0];
        $year = explode('-', $date)[0];
        $mon  = explode('-', $date)[1];
        $day  = explode('-', $date)[2];

        return "$day/$mon/$year";
    }
}

if (! function_exists('setting'))
{
    function setting($name)
    {
        $setting = Setting::whereName($name)->first();
        return $setting ? optional($setting->translate(locale()))->content ?? '' : '';
    }
}

if (! function_exists('category_tree'))
{
    function category_tree()
    {
        $cats = Category::with('childrens')->parent()->active()->get();
        $html = '<ul class="megamenu">';

        foreach ($cats as $cat1)
        {
            $html .= '<li class="item-vertical with-sub-menu hover">';
            $html .= '<p class="close-menu"></p>';
            $html .= '<a href="' . url(locale() . '/category/' . $cat1->slug) . '" class="clearfix">';
            $html .= '<span>' . $cat1->translate(locale())->name . '</span>';

            if ($cat1->childrens->count())
            {
                $html .= '<b class="fa-angle-right"></b>';
            }

            $html .= '</a>';

            if ($cat1->childrens->count())
            {
                $html .= '<div class="sub-menu" data-subwidth="60">';
                $html .= '<div class="content">';
                $html .= '<div class="row">';
                $html .= '<div class="col-sm-12">';
                $html .= '<div class="row">';

                foreach ($cat1->childrens as $cat2)
                {
                    $html .= '<div class="col-md-4 static-menu">';
                    $html .= '<div class="menu">';
                    $html .= '<ul>';
                    $html .= '<li>';
                    $html .= '<a href="' . url(locale() . '/category/' . $cat1->slug . '/' . $cat2->slug) . '" class="main-menu">' . $cat2->translate(locale())->name . '</a>';

                    if ($cat2->childrens->count())
                    {
                        $html .= '<ul>';

                        foreach ($cat2->childrens as $cat3)
                        {
                            $html .= '<li><a href="' . url(locale() . '/category/' . $cat1->slug . '/' . $cat2->slug . '/' . $cat3->slug) . '">' . $cat3->translate(locale())->name . '</a></li>';
                        }

                        $html .= '</ul>';
                    }

                    $html .= '</li>';
                    $html .= '</ul>';
                    $html .= '</div>';
                    $html .= '</div>';
                }

                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
            }

            $html .= '</li>';
        }

        $html .= '</ul>';
        return $html;
    }
}
