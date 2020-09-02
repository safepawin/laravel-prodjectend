<?php

namespace App\Http\Controllers;

use App\Address;
use App\Bank;
use App\Category;
use App\Order;
use App\Order_detail;
use App\Product;
use App\Store;
use App\User;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\Vue;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('store.store');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.createstore')->with('user', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input());
        $store = Store::create([
            'store_name' => $request->store_name,
            'store_detail' => $request->store_detail,
            'start_store_at' => $request->start_store_at,
            'user_id' => Auth::id()
        ]);

        if (Address::where('user_id', Auth::id())->get()->isEmpty()) {
            $address = Address::create([
                'address' => $request->address,
                'user_id' => Auth::id()
            ]);
        }
        $address = Address::latest()->where('user_id', Auth::id())->first();
        $fullname = explode(' ', $request->fullname);
        $firstname = $fullname[0];
        $lastname = $fullname[1];
        if($lastname = ''){
            $lastname = 'ไม่ระบุนามสกุล';
        }
        $user = User::find(Auth::id())->update([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone_number' => $request->phone_number,
            'type_id' => 'seller',
            'address' => $address->id
        ]);

        return redirect(route('store.create'));

        //return dd(User::find(Auth::id()));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::find($id);
        $product = $store->product()->paginate(8);
        return view('store.showstore')->with('store', $store)->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::find($id);
        return view('store.editstore', ['store' => $store, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->store_image == null || '') {
            $store = Store::find($id)->update([
                'store_name' => $request->store_name,
                'store_detail' => $request->store_detail,
                'start_store_at' => $request->start_store_at
            ]);
            return redirect('store/profile/' . $id);
        } else {
            $name = date('YmdHis') . $request->store_image->getClientOriginalName();
            $request->store_image->move(public_path() . '/images/' . Auth::id() . '/' . $request->store_name . '/store_image/', $name);
            $store = Store::find($id)->update([
                'store_name' => $request->store_name,
                'store_detail' => $request->store_detail,
                'start_store_at' => $request->start_store_at,
                'store_image' => Auth::id() . '/' . $request->store_name . '/store_image/' . $name
            ]);
            return redirect('store/profile/' . $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeProfile($id)
    {
        $user = Auth::id();
        $store = Store::where('user_id', $user)->get();
        if ($store->isEmpty()) {
            return abort(404, 'คุณยังไม่มีร้านค้าค่ะ');
        }
        $product = Product::where('store_id', $id)->paginate(6);
        $order_detail = Order_detail::where('store_id', $id)->orderBy('order_quantity', 'desc')->limit(5)->get();
        // $order_detail = Order_detail::selectRaw('select product_name, SUM(order_quantity),store_id,order_id from `order_details` where `store_id` = 10 group by `product_name`')->get();
        $order_detail = Order_detail::where('store_id', $id)
            ->groupBy('product_name')
            ->orderBy('order_quantity')
            ->selectRaw('SUM(order_details.order_quantity) as order_quantity,product_name,store_id,order_id,Sum(order_total_unit) as order_total_unit,product_price')
            ->get();
        // dd($order_detail);
        return view('store.profilestore')->with('id', $id)->with('product', $product)->with('order_detail', $order_detail);
    }

    public function storeEditProduct($id, $pid)
    {
        $product = Product::find($pid);
        $category = Category::all();
        return view('store.editproduct', ['product' => $product, 'category' => $category, 'id' => $id]);
    }
    public function storeEditProductSave(Request $request, $id, $pid)
    {
        if (!isset($request->image)) {
            $product = Product::find($pid)->update([
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_detail' => $request->product_detail,
                'product_status' => $request->product_status,
                'product_quantity' => $request->product_quantity,
                'category_id' => $request->category
            ]);
            session()->flash('success', 'แก้ไขข้อมูลสินค้าเรียบร้อย');
            return redirect('store/profile/' . $id);
        } else {
            $name = date('YmdHis') . $request->image->getClientOriginalName();
            $request->image->move(public_path() . '/images/' . Store::find($id)->store_name . '/' . $request->product_name, $name);
            $product = Product::find($pid)->update([
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_detail' => $request->product_detail,
                'product_status' => $request->product_status,
                'product_quantity' => $request->product_quantity,
                'category_id' => $request->category,
                'preview_image' => Store::find($id)->store_name . '/' . $request->product_name . '/' . $name
            ]);
            session()->flash('success', 'แก้ไขข้อมูลสินค้าเรียบร้อย');
            return redirect('store/profile/' . $id);
        }
    }

    public function storeShowAllOrder($id)
    {
        $order_detail = Order_detail::where('store_id', $id)->get();
        return view('store.storeshowallorder', ['id' => $id, 'order_detail' => $order_detail]);
    }

    public function updateBank(Request $request){

        $store = Bank::where('store_id','=',$request->store_id)->first();

        // dd($store);
        if(isset($store)){
            $bank = $store->update([
                'bank_name' => $request->bank_name,
                'bank_number' => $request->bank_number,
                'bank_phone' => $request->bank_phone
            ]);
            return redirect('store/profile/'.$request->store_id);
            // dd($store);
        }else{
            $bank = Bank::create([
                'bank_name' => $request->bank_name,
                'store_id' => $request->store_id,
                'bank_number' => $request->bank_number,
                'bank_phone' => $request->bank_phone
            ]);
            return redirect('store/profile/'.$request->store_id);
        }
        // dd($request);
    }
}
