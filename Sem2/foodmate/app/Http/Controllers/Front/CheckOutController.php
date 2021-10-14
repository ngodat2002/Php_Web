<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    //
    public function index(){
        if (Auth::id()) {
            $carts = Cart::content();
            $total = Cart::total();
            $subtotal = Cart::subtotal();

            return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
        }
        else{
            return redirect('/login');
        }
    }

    public function addOrder(Request $request){
        if ($request->payment_type == 'pay_later'){
            //01.Them don hang
             $order=new Order();
             $order->user_id=Auth::id();
             $order->first_name=$request->input('first_name');
             $order->last_name=$request->input('last_name');
             $order->company_name=$request->input('company_name');
             $order->country=$request->input('country');
             $order->street_address=$request->input('street_address');
             $order->postcode_zip=$request->input('postcode_zip');
             $order->town_city=$request->input('town_city');
             $order->email=$request->input('email');
             $order->phone=$request->input('phone');
             $order->payment_type=$request->input('payment_type');
             $order->tracking_no='foodmate'.rand(1,9999);
             $order->total_price=Cart::total();
             $order->save();

          //02.Them chi tiet don hang
            $carts =Cart::content();
            foreach ($carts as $cart){
                $data =[
                    'order_id'=> $order->id,
                    'product_id'=> $cart->id,
                    'restaurant_id'=>$cart->restaurant_id,
                    'qty'=> $cart->qty,
                    'amount'=> $cart->price,
                    'total'=>  $cart->price* $cart->qty,
                ];

                OrderDetail::create($data);
            }
            //03.Gui email
            $total = Cart::total();
            $subtotal =Cart::subtotal();

            $this->sendEmail($order,$total,$subtotal);
;
            //04.Xoa gio hang
            Cart::destroy();
            //05.Tra ve ket qua
            return view('front.checkout.result');
        }else{
            return "Online payment method is not supported.";
        }
    }
    private function sendEmail($order,$total,$subtotal){
        $email_to= $order->email;
        Mail::send('front.checkout.email',compact('order','total','subtotal'),function ($message) use ($email_to){
            $message->from('dat3578@gmail.com','Space Error');
            $message->to($email_to,$email_to);
            $message->subject('Oder Notification');
        });
    }
}
