@extends('front.layout.master')
@section('title','Menu')
@section('body')

<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Food Menu</h2>
            </div>
            <div class="col-12">
                <a href="/">Home</a>
                <a href="menu">Menu</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->



<!-- Food Start -->
<div class="food mt-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="food-item">
                    <i class="flaticon-burger"></i>
                    <h2>Burgers</h2>
                    <p>
                        Hamburger is a famous and popular cake type around the world.
                    </p>
                    <a href="">View Menu</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="food-item">
                    <i class="flaticon-snack"></i>
                    <h2>Snacks</h2>
                    <p>
                        Fine food, convenient but still meets enough calories for the body.
                    </p>
                    <a href="">View Menu</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="food-item">
                    <i class="fas fa-drumstick-bite"></i>
                    <h2>Chickens</h2>
                    <p>
                        There are many delicious and attractive dishes made from chickens.
                    </p>
                    <a href="">View Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Food End -->


<!-- Menu Start -->
<!-- Menu Start -->
<div class="menu">
    <div class="container">
        <div class="section-header text-center">
            <p>Food Menu</p>
            <h2>Delicious Food Menu</h2>

        </div>
        <div class="menu-tab">
            <div class="row">
                <div class="col-6 col-md-4">
                    <form action="">
                    <div class="food-filter">
                        <h3 class="ff-title">Categories</h3>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="menu/{{$category->name}}" class="ct-link">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="food-filter">
                        <h3 class="ff-title">Meal</h3>
                        <div class="ff-meal-check">
                            @foreach($meals as $meal)
                            <div class="ab-item">
                                <label for="ab-{{$meal->id}}">
                                    <input type="checkbox"
                                           {{(request("meal")[$meal->id]??'')=='on' ? 'checked' : ''}}
                                           name="meal[{{$meal->id}}]"
                                           onchange="this.form.submit();"
                                           id="ab-{{$meal->id}}">
                                    {{$meal->name}}
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="food-filter">
                        <h3 class="ff-title">Tags</h3>
                        <div class="ff-tags">
                            <a href="#">Dinner</a>
                            <a href="#">Lunch</a>
                            <a href="#">Breakfast</a>
                            <a href="#">Snacks</a>
                            <a href="#">Chinese</a>
                            <a href="#">Vietnamese</a>
                            <a href="#">Mexico</a>
                            <a href="#">Sen Restaurant</a>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="col-md-8">
                    <div class="menu-food">
                        <h4>Menu FoodMate</h4>
                    </div>
                    <div class="menu-list">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="front/img/menu/{{$product->productImages[0]->path}}" alt="">
                                        </div>
                                        <div class="pi-text">
                                            <div class="food-name">{{$product->restaurants->name}}</div>
                                            <a href="#">
                                                <h5>{{$product->name}}</h5>
                                            </a>

                                            <div class="food-price">
                                                ${{$product->price}}
                                            </div>
                                            <div class="cart-view">
                                                <ul>
                                                    <li class="w-icon active"><a href="./cart/add/{{$product->id}}" class="btn btn-warning"><i class="uil uil-shopping-bag"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{$products ->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->
<!-- Menu End -->


@endsection
