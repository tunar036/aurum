<?php

namespace App\Http\Livewire\Components;

use App\Models\Product;
use App\Services\Components\CartService;
use Livewire\Component;

class Cart extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }
    
    public function addCart(CartService $cartService):void
    {
      $cartService->addToCart($this->product);

       $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.components.cart');
    }
}
