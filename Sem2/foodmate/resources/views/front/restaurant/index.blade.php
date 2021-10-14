@extends('front.layout.master')

@section('title','Restaurant')
@section('body')
<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Restaurants</h2>
            </div>
            <div class="col-12">
                <a href="./">Home</a>
                <a href="./restaurant">Restaurants</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="section-header text-center">
    <div class="pink2">
        <p>Restaurant Menu</p>
        <h2>List of restaurants</h2>
    </div>

</div>

<!-- Restaurant Start -->
<div class="booking">
    <div class="container">
        @foreach($restaurants as $restaurant)
            <div class="row align-items-center pink">
                <div class="col-lg-7">
                    <div class="booking-content">
                        <div class="about-text">
                            <h3><a href="restaurant/show/{{$restaurant->id}}" style="color: #454545;">{{$restaurant->id}}.{{$restaurant->name}}</a></h3>
                            <p>
                                {{$restaurant->description}}
                            </p>
                            <p>
                              <span style="color:#fbaf32">Address:</span> {{$restaurant->address}}
                                <br>
                                <span style="color:#fbaf32">Phone:</span>  {{$restaurant->phone}}
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="restaurant">
                        <img src="front/img/retaurants/{{$restaurant->images}}" alt="">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Restaurant End -->
@endsection
