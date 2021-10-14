@extends('front.layout.master')

@section('title','Shopping Cart')
@section('body')
<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Shopping Cart</h2>
            </div>
            <div class="col-12">
                <a href="index.html">Home</a>
                <a href="shopping-cart.html">Shopping Cart</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Shopping cart Begin -->
<div class="shopping-cart">
    <div class="container">
        @if(Cart::count()>0)
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th class="p-name">Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th><i onclick="confirm('Are you sure?') === true ? window.location='./cart/destroy':''"
                                   class="far fa-times-circle" style="cursor: pointer"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                        <tr>
                            <td class="cart-pic"><img src="front/img/menu/{{$cart->options->images}}" alt=""></td>
                            <td class="cart-title first-row">
                                <h5 class="text_product">{{$cart->name}}</h5>

                                <div class="product-text">
                                    <div class="food-name">
                                        {{$cart->options->restaurant_name}}
                                    </div>
                                </div>
                            </td>
                            <td class="p-price first-row">${{number_format($cart->price,2)}}</td>
                            <td class="qua-col first-row">
                                <div class="pro-qty">
                                    <input type="text" value="{{$cart->qty}}" data-rowid="{{$cart->rowId}}">
                                </div>
                            </td>
                            <td class="total-price first-row">
                                ${{number_format($cart->price*$cart->qty,2)}}
                            </td>
                            <td class="close-td first-row"><i onclick="window.location='./cart/delete/{{$cart->rowId}}'" class="far fa-times-circle"  style="cursor: pointer"></i> </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="discount-coupon">
                    <h6>Discount Codes</h6>
                    <form action="#" class="coupon-form">
                        <input type="text" placeholder="Enter your code">
                        <button type="submit" class="site-btn coupon-btn">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 offset-md-4">
                <div class="proceed-checkout">
                    <ul>
                        <li class="subtotal">Subtotal<span>${{$total}}</span></li>
                        <li class="cart-total">Total<span>${{$subtotal}}</span></li>
                    </ul>
                    <a href="./checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>
                </div>
            </div>
        </div>
        @else
            <div class="col-lg-12">
                <h4>Your cart is empty</h4>
            </div>
            <div class="col-lg-4">
                <a href="/" class="btn btn-warning" style="margin-top: 10px">Continue Shopping</a>
            </div>
        @endif
    </div>
</div>

<!-- Shopping cart End -->
@endsection
