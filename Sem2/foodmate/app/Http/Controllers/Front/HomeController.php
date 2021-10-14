<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function redirects(Request $request){
        $categories= ProductCategory::all();
        //Get meals
        $meals= Meal::all();
        $perPage=$request->show ?? 6;
        $search = $request->search ?? '';
        $products = Product::where('name','like','%'.$search.'%');
        $products=$this->filter($products,$request);
        $products = $this->pagination($products,$perPage);

        $admins=User::where('usertype','1')->get();
        $users=User::where('usertype','0')->get();
        $usertype=Auth::user()->usertype;
        if ($usertype=='1')
        {
            return view('admin.admin',compact('users','admins'));
        }

        else{
            return view('front.index',compact('categories','meals','products'));
        }
    }
    public function index(Request $request){
        if (Auth::id()){
            return redirect('redirects');
        }
        else{
            $categories= ProductCategory::all();
            //Get meals
            $meals= Meal::all();
            $perPage=$request->show ?? 6;
            $search = $request->search ?? '';
            $products = Product::where('name','like','%'.$search.'%');
            $products=$this->filter($products,$request);
            $products = $this->pagination($products,$perPage);
            return view('front.index',compact('categories','meals','products'));
        }
    }

    public function category($categoryName,Request $request){
        //Get Categories
        $categories =ProductCategory::all();
        //Get meals
        $meals= Meal::all();
        //Get products
        $perPage=$request->show??6;
        $products=ProductCategory::where('name',$categoryName)->first()-> products->toQuery();
        $products=$this->filter($products,$request);
        $products = $this->pagination($products,$perPage);
        return view('front.index',compact('categories','meals','products'));
    }
    public function filter($products,Request $request){
        $meals=$request->meal??[];
        $meal_ids=array_keys($meals);
        $products=$meal_ids!= null ? $products->whereIn('meal_id',$meal_ids):$products;
        return $products;
    }
    public function pagination($products,$perPage){
        $products=$products->simplePaginate($perPage);
        $products->append(['show'=>$perPage]);
        return $products;
    }
    public function your_cart(Request $request){
        $user=User::all();
        $restaurants= Restaurant::all();
            $orders= OrderDetail::all();
            return view('front.your-cart.your-cart',compact('orders','user','restaurants'));

    }
}
