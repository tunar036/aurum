<div class="container">
    @if (count($cart) > 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-grid">
                    <!-- Row Header Starts -->
                    <div class="hidden-xs">
                        <div class="row cart-row-header">
                            <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2"></div>
                                    <div class="col-xs-9 col-sm-9 col-md-10 col-lg-10 left">Product</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-4 col-lg-4">Price</div>
                                    <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">Quantity</div>
                                    <div class="col-xs-3 col-sm-3 col-md-4 col-lg-4">Total</div>
                                    <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($cart as $item)
                        <div class="row cart-row">
                            <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                                        <img src="{{ $item['product']->getFirstMediaUrl('product_images', 'thumb-small') }}"
                                            alt="" class="img-responsive" />
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-10 col-lg-10">
                                        <h1 class="product-name">{{ $item['product']->name }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                        <div class="product-price">{{ $item['product']->price }} &#8380</div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                        <div class="product-qty">
                                            <button
                                                wire:click="updateQty('{{ $item['rowId'] }}',{{ $item['qty'] - 1 }})"
                                                class="minus"><i class="fa fa-minus"></i></button>
                                            <span class="quantity">{{ $item['qty'] }}</span>
                                            <button
                                                wire:click="updateQty('{{ $item['rowId'] }}',{{ $item['qty'] + 1 }})"
                                                class="plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="visible-xs-block clearfix"></div>
                                    <div class="col-xs-6 col-sm-3 col-md-4 col-lg-4">
                                        <div class="total-product-price">
                                            {{ $item['qty'] * $item['product']->price }} &#8380</div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                        <ul class="actions">
                                            <li>
                                                <i wire:click="deleteFromCart('{{ $item['rowId'] }}')"
                                                    class="fa fa-times"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row proceed-to-checkout">
            <div style="float: right" class="col-lg-6 col-md-6 col-sm-6">
                <ul class="button">
                    <li><span style="font-size: 16px" class="fill-orange">Cart Total : {{ Cart::subTotal() }}
                            &#8380</span></li>
                    <li><a href="{{route('frontend.checkout.all')}}" class="fill-orange">Proceed to Checkout</a></li>
                </ul>
            </div>
        </div>
    @else
        <div style="background:transparent" class="row error-page">
            <div class="col-lg-12">
                <p style="text-align:center;color:#f53700" class="text-3">Sebetde mehsul yoxdu</p>
            </div>
        </div>
    @endif
    {{-- <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 cart-total">
            <div class="hero-text-2">
                <h1>Cart Total</h1>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Cart Subtotals</th>
                        <td>154 &#8380</td>
                    </tr>
                    <tr>
                        <th scope="row">Shipping & Handling</th>
                        <td>$20.00</td>
                    </tr>
                    <tr>
                        <th scope="row">Order Totals</th>
                        <td>$70.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 cal-shipping">
            <div class="hero-text-2">
                <h1>Calculate Shipping</h1>
            </div>
            <div class="form">
                <div class="form-group">
                    <select class="form-control">
                        <option>Select you Country</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="Mobile" placeholder="State" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="Address" placeholder="Postal Code" />
                </div>
                <button type="submit" class="btn btn-default">Update Total</button>
            </div>
        </div>
    </div> --}}
</div>
