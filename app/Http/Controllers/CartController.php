<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(\Cart::session(Auth::id())->getContent());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if(\Cart::session(Auth::id())->getContent()->isEmpty()){
            $cart = \Cart::session(Auth::id())->add(array(
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => 1,
                'attributes' => array('images' => $product->preview_image, 'store' => $product->store->id,'bank'=>$product->store->bank)
            ));
            return redirect('/cart');
        }else{
            foreach (\Cart::session(Auth::id())->getContent() as $key => $value) {
                if ($value->attributes->store != $product->store->id) {
                    // return response()->json(['status' => 'error','message'=> 'สินค้าไม่อยู่ในร้านค้าเดียวกัน หากต้องการซื้อ กรุณา ลบสินค้าออกจากตะกร้าสินค้า']);
                    return redirect('/cart')->with('message','สินค้าไม่อยู่ในร้านค้าเดียวกัน หากต้องการซื้อ กรุณา ลบสินค้าออกจากตะกร้าสินค้า');

                } else {
                    $cart = \Cart::session(Auth::id())->add(array(
                        'id' => $product->id,
                        'name' => $product->product_name,
                        'price' => $product->product_price,
                        'quantity' => 1,
                        'attributes' => array('images' => $product->preview_image, 'store' => $product->store->id,'bank'=>$product->store->bank)
                    ));
                    return redirect('/cart');
                }
            }
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $product = Product::find($id);
        $cartcontent = \Cart::session(Auth::id())->getContent()->get($id);

        if ($cartcontent->quantity < $product->product_quantity) {
            \Cart::session(Auth::id())->update($id, [
                'quantity' => 1,
                'price' => $product->product_price,
                'relative' => false
            ]);
            return [$cartcontent, \Cart::session(Auth::id())->getTotal()];
        } else {
            \Cart::session(Auth::id())->update($id, [
                'quantity' => 0,
                'price' => $product->product_price,
                'relative' => false
            ]);
            return [$cartcontent, \Cart::session(Auth::id())->getTotal()];
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
        \Cart::session(Auth::id())->remove($id);
        return "success";
    }

    public function decrease($id)
    {
        $product = Product::find($id);
        $cartcontent = \Cart::session(Auth::id())->getContent()->get($id);
        if ($cartcontent->quantity <= 0) {
            \Cart::session(Auth::id())->update($id, [
                'quantity' => 1,
                'price' => $product->product_price,
                'relative' => true
            ]);
            return [$cartcontent, \Cart::session(Auth::id())->getTotal()];
        } else {
            \Cart::session(Auth::id())->update($id, [
                'quantity' => -1,
                'price' => $product->product_price,
                'relative' => false
            ]);
            return [$cartcontent, \Cart::session(Auth::id())->getTotal()];
        }
    }
}
