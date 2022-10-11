@extends('layouts.frontend.master')
@section('title')
@endsection
@section('keyword')
@endsection
@section('description')
@endsection
@section('head')
@endsection
@section('content')
    <!-- /. NAVIGATION ENDS
                                                                                                                                               ========================================================================= -->
    <!-- INNER BANNER STARTS
                                                                                                                                               ========================================================================= -->
    <div class="inner-banner title-area text-center image-9">
        <div class="container title-area-content">
            <h1 class="animated" data-animation="fadeInUp" data-animation-delay="200">Shopping Checkout</h1>
            <h2 class="animated" data-animation="fadeInDown" data-animation-delay="200">ALL ABOUT DELICIEUX</h2>
            <div class="line animated" data-animation="fadeInDown" data-animation-delay="400"></div>
            <div class="bread-crumb"><a href="#">Home</a> <span>Shop</span></div>
        </div>
    </div>
    <!-- /. INNER BANNER STARTS
                                                                                                                                                                  ========================================================================= -->
    <div class="white-bg">
        <!-- GET IN TOUCH STARTS
                                                                                                                                                                      ========================================================================= -->
        <!-- Google Map Ends -->
        <div class="check-out">
            <div class="container">
                @if(count(Cart::content()))
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('frontend.checkout.inCart') }}">
                        @csrf
                        <div class="col-lg-4 col-md-4 col-sm-4">

                            <div class="payment-method animated" data-animation="fadeInUp" data-animation-delay="600">
                                <h1>Select Payment Method</h1>
                                <div class="form-group">
                                    <select name="payment_method_id" class="form-control">
                                        <option value="" selected>Seçin</option>
                                        @foreach ($paymentMethods as $paymentMethod)
                                            <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->transname }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <h1>Select Delivery Method</h1>
                                <div class="form-group">
                                    <select name="delivery_method_id" class="form-control" id="select">
                                        <option value="" selected>Seçin</option>
                                        @foreach ($deliveryMethods as $deliveryMethod)
                                            <option value="{{ $deliveryMethod->id }}">
                                                {{ $deliveryMethod->transname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="discount-total animated" data-animation="fadeInUp" data-animation-delay="400">
                                    <h1>Discount</h1>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th scope="row">10 % endirim oldu</th>
                                            <td>{{ Cart::Subtotal() - Cart::Subtotal() / 10 }} &#8380</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart-total animated" data-animation="fadeInUp" data-animation-delay="400">
                                    <h1>Cart Total</h1>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Total</th>
                                            <td>{{ Cart::Subtotal() }} &#8380 </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Payment Method Starts -->
                        </div>
                        <!-- Shipping Address Starts -->
                        <div class="col-lg-8 col-md-4 col-sm-4">
                            <div class="row animated" data-animation="fadeInUp" data-animation-delay="400">
                                <div class="col-lg-12">
                                    <h1>Shipping Address</h1>

                                    <div class="form-group">
                                        <input type="text" value="{{old('firstname')}}" class="form-control" name="firstname"
                                               placeholder="First Name *" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="{{old('lastname')}}" class="form-control" name="lastname"
                                               placeholder="Last Name *" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="{{old('address')}}" class="form-control" name="address" placeholder="Address *" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="{{old('phone')}}" class="form-control" name="phone" placeholder="Phone #" />
                                    </div>
                                      <input type="text" value="{{old('email')}}" class="form-control" name="email" placeholder="Email *" />
                                    <br>
                                    <div class="form-group">
                                        <textarea rows="5" value="{{old('more_info')}}" class="form-control" name="more_info" placeholder="Order Notes *"></textarea>
                                    </div>
                                </div>

                                <input class="btn btn-primary" type="submit" value="Order Now" />
                            </div>
                        </div>
                        <!-- Shipping Address Ends -->
                    </form>
                </div>
                @else
                <div style="background:transparent" class="row error-page">
                    <div class="col-lg-12">
                        <p style="text-align:center;color:#f53700" class="text-3">Sebetde mehsul yoxdu</p>
                    </div>
                </div>
            @endif
            </div>
        </div>
        <!-- /. GET IN TOUCH ENDS
                                                                                                                                                                      ========================================================================= -->
    </div>
@endsection
@section('scripts')
    <script>
        const select = document.getElementById('select');
        const table = document.querySelector(".discount-total");
        const table2 = document.querySelector(".cart-total");
        select.addEventListener("change", () => {
            if (select.value == 1) {
                table.style.display = "block";
                table2.style.display = "none";
            } else {
                table.style.display = "none";
                table2.style.display = "block";
            };
        });
    </script>
@endsection
