<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_detail;
use App\Product;
use App\Store;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = \Cart::session(Auth::id())->getContent();
        $name = date('YmdHis').$request->billimage->getClientOriginalName();
        $request->billimage->move(public_path().'/images/'.Auth::id().'/'.'bill/', $name);
        $order = Order::create([
            'order_total'=>$request->total,
            'order_status'=>1,
            'user_id'=>Auth::id(),
            'bill_image'=>Auth::id().'/'.'bill/'.$name,
            'address_id'=> $request->address,
            'billcode'=> Auth::id().date('YmdHis')
        ]);

        foreach($carts as $cart){
            $product = Product::find($cart->id);

            $order_detail = Order_detail::create([
                'product_name'=>$cart->name,
                'product_price'=>$cart->price,
                'order_quantity'=>$cart->quantity,
                'order_total_unit'=>$cart->price * $cart->quantity,
                'order_id'=>$order->id,
                'store_id'=>$product->store_id
            ]);

            // $product = Product::find($cart->id);
            $product->product_quantity = $product->product_quantity - $cart->quantity;
            $product->save();
        }
        \Cart::session(Auth::id())->clear();
        return redirect(route('user.order'));   //ลิ้งไป ที่ user > order
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
