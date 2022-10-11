<?php

namespace App\Http\Livewire\Components;

use App\Services\Components\CartService;
use Livewire\Component;

class Cartindex extends Component
{
    protected  $listeners = ['itemRemove' => '$refresh','cartUpdated'=>'$refresh'];

    public function deleteFromCart(CartService $cartService, $rowId)
    {
        $cartService->removeFromCart($rowId);

        $this->emit('itemRemove');
    }

    public function updateQty(CartService $cartService,$rowId,$qty)
    {
            $cartService->updateQty($rowId,$qty);
            $this->emit('qtyChange');
    }

    public function render(CartService $cartService)
    {
        $cart = $cartService->getCart();

        return view('livewire.components.cartindex', compact('cart'));
    }
}
