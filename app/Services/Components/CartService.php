<?php

namespace App\Services\Components;

use App\Models\CartProduct;
use App\Models\Color;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class CartService
{
   public function addToCart(Product $product)
   {
       $cartItem = Cart::add(
           [
               'id' => $product->id,
               'name' => $product->name,
               'qty' => 1,
               'price' => $product->price,
               'weight' =>1,
           ]);

      return true;
   }

   public static function cleanCart()
   {
       Cart::destroy();
   }

   public function removeFromCart($rowid)
   {
     
       Cart::remove($rowid);
   }

   public function updateQty($rowid, $qty)
   {

       Cart::update($rowid, $qty);
   }

   public function getCart()
   {

    $cartItems = Cart::content()->flatten(1)->map(function ($item) {
        return [
            'rowId' => $item->rowId,
            'qty' => $item->qty,
            'product' => Product::find($item->id),
        ];
    });

       return $cartItems;
   }
}
