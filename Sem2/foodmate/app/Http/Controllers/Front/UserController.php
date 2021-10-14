<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $orders =Order::where('user_id',Auth::id())->get();
        return view('front.orders.index',compact('orders'));
    }
    public function view($id){
        $orders = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('front.orders.view-orders',compact('orders'));
    }
    public function search(Request $request){
        $fromDate=$request->input('fromDate');
        $toDate=$request->input('toDate');
        $orders =Order::where('user_id',Auth::id())
            ->where('created_at','>=',$fromDate)
            ->where('created_at','<=',$toDate)
            ->get();
        return view('front.orders.index',compact('orders'));
    }
    public function delete_order($id){
        $orders=Order::find($id);
        $orders->delete();
        return redirect()->back();
    }
}
