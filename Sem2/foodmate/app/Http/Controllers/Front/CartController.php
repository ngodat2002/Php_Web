<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function add($id){
          if (Auth::id()){
              $product = Product::findOrFail($id);
              Cart::add([
                  'id'=>$id,
                  'name'=>$product->name,
                  'qty'=>1,
                  'restaurant_id'=>$product->restaurants->id,
                  'weight'=> 0,
                  'price'=>$product->price,
                  'options'=>[
                      'images'=>$product->image,
                      'restaurant_name'=>$product->restaurants->name,
                  ],
              ]);
              return redirect()->back();
          }else{
              return redirect('/login');
          }
    }

    public function index(){
        if (Auth::id()){
            $carts= Cart::content();
            $total = Cart::total();
            $subtotal =Cart::subtotal();
            return view('front.menu.cart',compact('carts','total','subtotal'));
        }else{
            return redirect('/login');
        }
    }


    public function delete($rowId){
        Cart::remove($rowId);
        return back();
    }
    public function destroy(){
        Cart::destroy();
        return back();
    }
    public function update(Request $request){
        if ($request->ajax()){
            Cart::update($request->rowId, $request->qty);
        }
    }
}
