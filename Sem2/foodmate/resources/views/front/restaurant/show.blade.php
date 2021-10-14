@extends('front.layout.master')
@section('title','Restaurant Menu')
@section('body')

    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Restaurants</h2>
                </div>
                <div class="col-12">
                    <a href="/">Home</a>
                    <a href="restaurant">Restaurants</a>
                    <a href="restaurant/show/{{$restaurants->id}}">{{$restaurants->name}}</a>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="section-header text-center">
        <div class="pink2">
            <p style="font-size: 24px;">{{$restaurants->name}}</p>
            <h2>Restaurant menu list</h2>
        </div>
    </div>

    <!-- Menu Start -->
    <div class="menu">
        <div class="container">
            <div class="section-header text-center">
                <p>Restaurant Menu</p>
                <h2>Delicious Food Menu Of Restaurant</h2>

            </div>
            <div class="menu-tab">
                <div class="row">

                    <div class="col-6 col-md-4">
                        <form action="">
                            <div class="food-filter">
                            <h3 class="ff-title">Categories</h3>

                          <ul>
                              @foreach($categories_res as $category)
                                  <li><a href="restaurant/show/{{$restaurants->id}}/{{$category->name}}" class="ct-link">{{$category->name}}</a></li>
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
                                @foreach($products_res as $product)
                                    @include('front.components.product-item')

                                @endforeach
                            </div>
                        </div>
                        {{$products_res ->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->

@endsection
