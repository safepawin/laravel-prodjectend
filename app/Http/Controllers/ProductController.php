<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\Product_image;
use App\Store;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_name'=>'required',
            'product_detail'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required',
            'category'=>'required',
            'store'=>'required',
            ]);
        $product = Product::create([
            'product_name' => $request->product_name,
            'product_detail'=>$request->product_detail,
            'product_price'=>$request->product_price,
            'product_quantity'=>$request->product_quantity,
            'category_id'=>$request->category,
            'store_id'=>$request->store,
            'product_status'=>1
        ]);

        foreach($request->images as $image)
            {
                $name = date('YmdHis').$image->getClientOriginalName();
                $image->move(public_path().'/images/'.Store::find($request->store)->store_name.'/'.$product->product_name, $name);
                $product_image = Product_image::create([
                    'product_image_name'=>$name,
                    'product_image'=>Store::find($request->store)->store_name.'/'.$product->product_name.'/'.$name,
                    'product_id'=>$product->id
                ]);
            }
            $updatedimage = Product::find($product->id)->update([
                'preview_image' => $product_image->product_image
            ]);
            // dd($updatedimage);
            session()->flash('success','เพิ่มสินค้าสำเร็จ');
            return redirect(route('store.profile',$request->store));
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
        //dd($product->product_image);
        return view('showProduct')->with('data', $product);
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
    public function createProduct($id){
        $category = Category::all();
        return view('addproduct',['id' => $id, 'category' => $category]);
    }
}
