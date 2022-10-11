<?php

namespace App\Http\Livewire\Components;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Detail extends Component
{
    public $qty;

    public $product;

    public function mount(Product $product)
    {
        $this->qty = '1';
        $this->product = $product;
    }

    public function addToCart():void
    {
        $cartItem = Cart::add(
            [
                'id' => $this->product->id,
                'name' => $this->product->name,
                'qty' => $this->qty,
                'price' => $this->product->price,
                'weight' =>1,
            ]);

       $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.components.detail');
    }
}
