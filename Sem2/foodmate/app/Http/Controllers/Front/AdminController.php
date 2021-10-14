<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\Translation\t;

class AdminController extends Controller
{
    public function product(Request $request){
//        $perPage=$request->show??'6';
        $admins=User::where('usertype','1')->get();
        $search = $request->search ?? '';
        $products = Product::where('name','like','%'.$search.'%')->paginate(4);
//        $products=$this->pagination($products,$perPage);
        return view('admin.food',compact('admins','products'));
    }
//    public function pagination($products,$perPage){
//        $products=$products->simplePaginate($perPage);
//        $products->append(['show'=>$perPage]);
//        return $products;
//    }
    public function add(){
        $admins=User::where('usertype','1')->get();
        return view('admin.add-user',compact('admins'));
    }
    public function delete_user($id){
        $users=User::find($id);
        $users->delete();
        return redirect()->back();
    }
    public function update_user($id){
        $admins=User::where('usertype','1')->get();
        $users=User::find($id);
        return view('admin.update_user',compact('users','admins'));
    }

    public function upload_user(Request $request){
        $users =new User();

        $users->name=$request->name;
        $users->email=$request->email;
        $users->phone=$request->phone;
        $users->address=$request->address;
        $users->password=Hash::make($request->password);
        $users->save();
        return redirect()->back()->with('success','Bạn đã thêm thành công một người dùng mới!');
    }
    public function update_userview($id,Request $request){
        $users=User::find($id);
        $users->name=$request->name;
        $users->email=$request->email;
        $users->phone=$request->phone;
        $users->address=$request->address;
        $users->password=Hash::make($request->password);
        $users->save();
        return redirect()->back()->with('success','Bạn đã cập nhập thành công người dùng!');
    }

    public function delete($id){
        $products=Product::find($id);
        $products->delete();
        return redirect()->back();
    }
    public function restaurants(){
        $admins=User::where('usertype','1')->get();
        $restaurants=Restaurant::all();
        return view('admin.restaurants',compact('admins','restaurants'));
    }
    public function delete_res($id){
        $restaurants = Restaurant::find($id);
        $restaurants->delete();
        return redirect()->back();
    }
    public function create(){
        $admins=User::where('usertype','1')->get();
        return view('admin.add-food',compact('admins'));
    }
    public function update_food($id){
        $admins=User::where('usertype','1')->get();
        $products=Product::find($id);

        return view('admin.update-food',compact('products','admins'));
    }

    public function update($id,Request $request){
        $products=Product::find($id);
        $image=$request->image;

        $imagename =time().'.'.$image->getClientOriginalExtension();
        $request->image->move('front/img/menu',$imagename);

        $products->image=$imagename;

        $products->meal_id=$request->meal_id;
        $products->product_categories_id=$request->product_categories_id;
        $products->restaurant_id=$request->restaurant_id;
        $products->name=$request->name;
        $products->qty=$request->qty;
        $products->price=$request->price;
        $products->description=$request->description;
        $products->rate=$request->rate;

        $products->save();

        return redirect()->back()->with('success','Bạn đã cập nhập thành công món ăn!');
    }

    public function upload(Request $request){
        $products = new Product();
        $image=$request->image;

        $imagename =time().'.'.$image->getClientOriginalExtension();
        $request->image->move('front/img/menu',$imagename);

        $products->image=$imagename;

        $products->meal_id=$request->meal_id;
        $products->product_categories_id=$request->product_categories_id;
        $products->restaurant_id=$request->restaurant_id;
        $products->name=$request->name;
        $products->qty=$request->qty;
        $products->price=$request->price;
        $products->description=$request->description;
        $products->rate=$request->rate;

        $products->save();

        return redirect()->back()->with('success','Bạn đã thêm thành công một món ăn mới!');
    }

    public function index(Request $request){
        $search = $request->search ?? '';
        $admins=User::where('usertype','1')->get();
        $orders =Order::where('status','0')

            ->where('tracking_no','LIKE','%'.$search .'%')
            ->paginate(4);
        return view('admin.orders.index',compact('orders','admins'));
    }
    public function view($id){
        $admins=User::where('usertype','1')->get();
        $orders =Order::where('id',$id)->first();

        return view('admin.orders.view',compact('orders','admins'));
    }
    public function update_order(Request $request,$id){
        $orders= Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status','Order Updated Successfully');
    }
    public function orderhistory(Request $request){
        $search = $request->search ?? '';
        $admins=User::where('usertype','1')->get();
        $orders =Order::where('tracking_no','LIKE','%'.$search .'%')
            ->where('status','1')
            ->orWhere('status','2')
            ->paginate(4);
        return view('admin.orders.history',compact('orders','admins'));

    }

}
