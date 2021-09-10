<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    public function index(){
        $carts = Cart::content();
        $total =Cart::total();
        $subtotal= Cart::subtotal();
        return view('front.checkout.index',compact('carts','total','subtotal'));

    }

    public function addOrder(Request $request){
        //01.Them don hang
        $order= Order::create($request ->all());

        //02.Them chi tiet don hang
        $carts =Cart::content();

        foreach ($carts as $cart){
            $data =[
                'order_id'=> $order->id,
                'product_id'=> $cart->id,
                'qty'=> $cart->qty,
                'amount'=> $cart->price,
                'total'=>  $cart->price* $cart->qty,
            ];
            OrderDetail::create($data);
        }

        if ($request->payment_type=='pay_later'){
            //03.Gui email
            $total =Cart::total();
            $subtotal= Cart::subtotal();
            $this->sendEmail($order,$total,$subtotal);
            //04.Xoa gio hang
            Cart::destroy();

            //05.Tra ve ket qua
            return redirect('checkout/result')->with('notification','Success! You will pay on delivery. Please check your email');
        }

        if ($request->payment_type=='online_payment'){
            //01. Lay URL thanh toan VNpay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef'=>$order->id,//Id don hang
                'vnp_OrderInfo'=>'Mo ta don hang o day...',
                'vnp_Amount'=>Cart::total(0,'','')*23075,
            ]);
            //02. Chuyen huong toi URL lay duoc
            return  redirect()->to($data_url);
        }

        else{
            return "Online payment method is not supported";
        }
    }

    public function vnPayCheck(Request $request){
        //01.lay data tu url do VNPAY GUI VE QUA VNP RETURNURL
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        $vnp_Amount = $request->get('vnp_Amount');
        //02.kIEM TRA KET QUA GIAO DICH VE TU VN PAY
        if ($vnp_ResponseCode != null){
            //Neu thanh cong:
            if ($vnp_ResponseCode ==00){
                //Gui email
                $order =Order::find($vnp_TxnRef);
                $total =Cart::total();
                $subtotal= Cart::subtotal();
                $this->sendEmail($order,$total,$subtotal);
                //04.Xoa gio hang
                Cart::destroy();
                //Thong bao ket qua
                return redirect('checkout/result')->with('notification','Success! Has paid online .Please check your email');

            }
            else{
                //Neu khong thanh cong
                Order::find($vnp_TxnRef)->delete();
                //XOA DON HANG DA THEM VAO DATABASE, VA TRA VE THONG BAO LOI
                return redirect('checkout/result')->with('notification','Error : payment failed or canceled');
            }
        }
    }

    private function  sendEmail($order,$total,$subtotal){
        $email_to = $order->email;
        Mail::send('front.checkout.email',compact('order','total','subtotal'),function ($message) use($email_to){
            $message->from('dat3578@gmail.com','Ngô Chí Thành Đạt');
            $message->to($email_to,$email_to);
            $message->subject('Order Notification');
        });
    }



    public function result(){
        $notification = session('notification');

        return view('front.checkout.result',compact('notification'));
    }
}
