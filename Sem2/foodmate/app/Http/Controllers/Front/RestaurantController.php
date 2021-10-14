<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Database\Factories\UserFactory;




class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::all();
        return view('front.restaurant.index',compact('restaurants'));
    }
    public function show($id,Request $request){
        $restaurants = Restaurant::findOrFail($id);
        $categories_res=ProductCategory::all();
        $meals=Meal::all();
        //Get products
        $perPage=$request->show??6;
        $products_res = Product::where('restaurant_id',$id);
        $products_res=$this->filter($products_res,$request);
        $products_res=$this->pagination($products_res,$perPage);
       return view('front.restaurant.show',compact('restaurants','products_res','categories_res','meals'));
    }
    public function category($categoryName,Request $request){

        $categories_res=ProductCategory::all();
        $meals=Meal::all();
        //Get products
        $perPage=$request->show??6;
        $products_res = ProductCategory::where('name',$categoryName)->first()->products->toQuery();
        $products_res=$this->filter($products_res,$request);
        $products_res=$this->pagination($products_res,$perPage);
        return view('front.restaurant.show',compact('categories_res','meals','products_res'));
    }
    public function filter($products_res,Request $request){
        $meals=$request->meal??[];
        $meal_ids=array_keys($meals);
        $products_res=$meal_ids!= null ? $products_res->whereIn('meal_id',$meal_ids):$products_res;
        return $products_res;
    }
    public function pagination($products_res,$perPage){
        $products_res=$products_res->simplePaginate($perPage);
        $products_res->append(['show'=>$perPage]);
        return $products_res;
    }
}

