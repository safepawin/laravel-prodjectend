@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 bg-dark py-2 px-3">
                <h1 class="text-white">{{$store->store_name}}</h1>
                <h4 class="text-white-50">{{$store->start_store_at}}</h4>
            </div>
            <div class="col-8 border py-2 px-3">
                <p>รายการสินค้า : <b>{{count($store->product)}}</b></p>
                <p>เข้าร่วมเมื่อ : <b>{{$store->created_at}}</b></p>
                <p>เกี่ยวกับร้าน <b>{{$store->store_detail}}</b></p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center">สินค้าทั้งหมด</h2>
            </div>
            @foreach ($product as $item)
                <div class="col-3 p-3">
                    <a href="http://projectend.test:8080/product/{{$item->id}}"><img class="img img-fluid" src="{{$item->product_image[0]->product_image}}" alt=""></a>
                    <p>{{$item->product_name}}</p>
                    <span>
                        ราคา
                        <b>{{$item->product_price}}</b>
                      </span>
                      <span>
                        คงเหลือ
                        <b>{{$item->product_quantity}}</b>
                      </span>
                </div>
             @endforeach
             <div class="col-12">
                {{$product->links()}}
             </div>
        </div>
    </div>
@endsection
