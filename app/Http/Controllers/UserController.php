<?php

namespace App\Http\Controllers;

use App\Address;
use App\Product;
use App\Product_image;
use App\User;
use App\User_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userprofile(){
        return view('profileuser',['user'=>Auth::user()]);
    }
    public function userupdate(Request $request){
        $userId = Auth::id();
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
        return redirect(route('user.profile'));
    }

    public function userdelete($id)
    {
        $address = Address::find($id)->delete();

        return response()->json('success');
    }
}
