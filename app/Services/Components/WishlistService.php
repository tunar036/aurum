<?php

namespace App\Services\Components;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Cookie;

class WishlistService
{
    public function addToWishlist($productId)
    {
        $message = '';

        if(auth()->check()) {
            if(!auth()->wishlist()->where('product_id', $productId)->exists()){
                auth()->wishlist()->create(['product_id' => $productId]);
                $message = __('frontend.wishlist.added');
            }
            else {
                auth()->wishlist()->where('product_id', $productId)->delete();
                $message = __('frontend.wishlist.remove');
            }
        }
        else {
            if (Cookie::has(Wishlist::COOKIE_NAME)){
                $items = json_decode(Cookie::get(Wishlist::COOKIE_NAME));
                $items = collect($items)->toArray();

                if(!in_array($productId, $items)){
                    $items[] = $productId;
                    Cookie::queue(Cookie::make(Wishlist::COOKIE_NAME, json_encode($items,true), 60 * 24 * 365));

                    $message = __('frontend.wishlist.added');
                }
                else
                {
                    $items = array_diff($items, [$productId]);
                    Cookie::queue(Cookie::make(Wishlist::COOKIE_NAME, json_encode($items,true), 60 * 24 * 365));
                    $message = __('frontend.wishlist.remove');
                }
                $items[] = $productId;
            }
            else
            {
                Cookie::queue(Cookie::make(Wishlist::COOKIE_NAME, json_encode([$productId],true), strtotime('+1 years')));
            }
        }
      return  $message;
    }

    public function get()
    {
        if(auth()->check()) {
            return auth()->wishlist()->get();
        }
        else {
            if (Cookie::has(Wishlist::COOKIE_NAME)) {
                $items = json_decode(Cookie::get(Wishlist::COOKIE_NAME));
                return Product::with('badges','brand')->whereIn('id',$items)->latest()->paginate(8);
            } else {
                return collect([]);
            }
        }
    }

    public function cleanWishlist()
    {
        if (auth()->check()) {
            auth()->wishlist()->delete();
        } else {
            Cookie::queue(Cookie::forget(Wishlist::COOKIE_NAME));
        }
    }
}
