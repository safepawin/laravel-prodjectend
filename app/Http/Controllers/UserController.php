<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use App\Order_detail;
use App\Product;
use App\Product_image;
use App\User;
use App\User_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userprofile(){
        return view('user.profileuser',['user'=>Auth::user()]);
    }
    public function userupdate(Request $request){
        $userId = Auth::id();
        if($request->address == ''){
            $user = User::find($userId)->update([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'phone_number'=>$request->phone_number,
                'name'=>$request->name,
            ]);
        }else{
            $address = Address::create([
                'address' => $request->address,
                'user_id' => $userId
            ]);
            $user = User::find($userId)->update([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'phone_number'=>$request->phone_number,
                'address_id'=>$address->id,
                'name'=>$request->name,
            ]);
        }

        return redirect(route('user.profile'));
    }

    public function userdelete($id)
    {
        $address = Address::find($id)->delete();

        return response()->json('success');
    }

    public function userOrder()
    {
        $order = Order::where('user_id',Auth::id())->get();
        return view('user.userorder',['order'=>$order]);
    }

    public function orderDetail($id)
    {
        $orderdetail = Order_detail::where('order_id',$id)->get();

        return view('user.orderdetail',['orderdetail'=> $orderdetail]);
    }

    public function editAddress(Request $request)
    {
        $address = Address::find($request->addressId)->update([
            'address' => $request->address
        ]);
        return redirect(route('user.profile'));
    }
}
