@extends('front.layout.master')
@section('title','Result')
@section('body')

    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Result</h2>
                </div>
                <div class="col-12">
                    <a href="/">Home</a>
                    <a href="{{url('checkout')}}">Check out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 style="margin-top: 40px">Congratulations on your successful order!</h4>
            </div>
            <div class="col-lg-4">
                <a href="/" class="btn btn-warning" style="margin-top: 10px">Continue Shopping</a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('my-orders')}}" class="btn btn-warning" style="margin-top: 10px">My order</a>
            </div>

        </div>
    </div>

@endsection
