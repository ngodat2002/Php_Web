@extends('front.layout.master')
@section('title','Check Out')
@section('body')
<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Check Out</h2>
            </div>
            <div class="col-12">
                <a href="./">Home</a>
                <a href="checkout">Check Out</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Shopping cart Begin -->
<div class="checkout-section">
    <div class="container">
        <form action="" method="post" class="checkout-form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="{{route('login')}}" class="content-btn">Click Here To Login</a>
                    </div>
                    <h4>Billing Details</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="fir">First Name<span>:</span></label>
                            <input type="text" id="fir" required="required" name="first_name">
                        </div>
                        <div class="col-lg-6">
                            <label for="last">Last Name<span>:</span></label>
                            <input type="text" id="last" required="required" name="last_name">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun-name">Company Name<span>:</span></label>
                            <input type="text" id="cun-name" required="required" name="company_name">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-12">
                            <label for="cun">Country<span>:</span></label>
                            <input type="text" id="cun" required="required" name="country">
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Street Address<span>:</span></label>
                            <input type="text" id="street" required="required" name="street_address">
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Postcode / ZIP<span>:</span></label>
                            <input type="text" id="zip" required="required" name="postcode_zip">
                        </div>
                        <div class="col-lg-12">
                            <label for="town">Town / City<span>:</span></label>
                            <input type="text" id="town" required="required" name="town_city">
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email Address<span>:</span></label>
                            <input type="text" id="email" required="required" name="email">
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Phone<span>:</span></label>
                            <input type="text" id="phone" required="required" name="phone">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <input type="text" placeholder="Enter Your Coupon Code">
                    </div>
                    <div class="place-order">
                        <h4>Your Oder</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Product<span>Total</span></li>
                                @foreach($carts as $cart)
                                     <li class="fw-normal"><b>{{$cart->name}}</b> x {{$cart->qty}} / {{$cart->options->restaurant_name}}<span>${{$cart->price * $cart->qty}}</span></li>
                                @endforeach
                                <li class="fw-normal">Subtotal<span>${{$subtotal}}</span></li>
                                <li class="fw-normal">Total<span>${{$total}}</span></li>
                            </ul>
                            <div class="payment-check1">
                                <div class="pc-item">
                                    <label for="pc-check">
                                        Pay later
                                        <input type="radio" id="pc-check" name="payment_type" value="pay_later" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Online Payment
                                        <input type="radio" id="pc-paypal" name="payment_type" value="online_payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Shopping cart End -->
@endsection

