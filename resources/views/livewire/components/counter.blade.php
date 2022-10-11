<li class="dropdown shop_cart pull-right ">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-shopping-cart"
            aria-hidden="true"></i><span id="cart_count">{{ count(Cart::content()) }}</span></a>
    <ul class="dropdown-menu">
        <li>
            <div class="yamm-content">
                <div class="shop_cart_content">
                    <h4>Shopping Cart</h4>
                    <div class="cart_items">
                        @if ($cart)
                            {{-- @foreach (session('cart') as $id => $details) --}}
                            @foreach ($cart as $item)
                                <div class="item clearfix">
                                    <a href="#"><img
                                            src="{{ $item['product']->getFirstMediaUrl('product_images', 'thumb-small') }}"
                                            alt="" /></a>
                                    <div class="item_desc">
                                        <div class="row1 clearfix">
                                            <a href="#">{{ $item['product']->name }}</a>
                                            {{-- <div wire:click="deleteFromCart('{{ $item['rowId'] }}')"
                                                class="close"><i class="fa fa-times" aria-hidden="true"></i>
                                            </div> --}}
                                        </div>
                                        <div class="row2 clearfix">
                                            <span class="item_quantity">{{ $item['qty'] }}</span>
                                            <span class="item_price">{{ $item['product']->price }}
                                                &#8380</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <!-- End item -->
                        {{-- @php $total = 0 @endphp
                            @foreach ((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            @endforeach --}}
                    </div>
                    <div class="total-price clearfix">
                        <span class="caption">Total</span>
                        <span class="shop_checkout_price">{{ Cart::subTotal() }} &#8380</span>
                    </div>
                    <div class="shop_action clearfix">
                        <a class="btn btn-dark pull-left" href="{{ route('frontend.checkout.all') }}">Check
                            out</a>
                        <a class="btn2 btn-dark pull-right" href="{{ route('frontend.cart.all') }}">View Cart</a>
                    </div>
                    <!-- End cart items -->
                </div>
                <!-- End shop cart content -->
            </div>
        </li>
    </ul>
</li>
