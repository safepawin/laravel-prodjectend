<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\User_type;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
        $user = User::where('user_type_id','!=','2')->get();
        // dd($user);
        return view('admin.home')->with('user',$user);
    }

    public function editSystem(){
        $user_type = User_type::all();
        $categories = Category::all();
        return view('admin.editSystem')->with('categories',$categories)->with('user_type',$user_type);
    }

    public function addCategory(Request $request){
        $category = Category::create([
            'category_name' => $request->category_name
        ]);

        return redirect(route('admin.edit.system'));
    }

    public function addUserType(Request $request){
        $user_type = User_type::create([
            'type_name' => $request->user_type_name
        ]);
        return redirect(route('admin.edit.system'));
    }

    public function adminEditUser(Request $request){
        $user = User::find($request->id)->update([
            'user_type_id' => $request->user_type
        ]);
        return redirect(route('admin.index'));
    }
}
