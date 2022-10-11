<?php

namespace App\Http\Middleware;

use App\Services\Components\CartService;
use Closure;
use Illuminate\Http\Request;

class RedirectIfCartEmpty
{
    public function handle(Request $request, Closure $next)
    {
        $cartService =  new CartService();

        if (count($cartService->getCart()[0]) == 0) {
            return redirect()->route('frontend.home');
        }

        return $next($request);
    }
}
