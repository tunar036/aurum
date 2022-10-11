<?php

namespace App\Http\Livewire\Components;

use App\Services\Components\CartService;
use Livewire\Component;

class Counter extends Component
{
    protected  $listeners = ['cartUpdated' => '$refresh', 'itemRemove' => '$refresh', 'qtyChange' => '$refresh'];

    // public function deleteFromCart(CartService $cartService, $rowID):void
    // {
    //   $cartService->removeFromCart($rowID);

    //    $this->emit('itemRemoveFromCounter');
    // }

    public function render(CartService $cartService)
    {
        $cart = $cartService->getCart();

        $this->dispatchBrowserEvent('cart:added', ['message' => 'Səbətə əlavə olundu']);


        return view('livewire.components.counter', ['cart' => $cart]);
    }
}
