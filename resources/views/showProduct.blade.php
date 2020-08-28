@extends('layouts.app')

@section('content')
    <div class="container " style="border-top: 6px solid red">
        <div class="row mt-3">
            <div class="col-6">
                <div class="col-12 border-bottom p-3">
                    <h2 class="d-inline pr-2">{{$data->product_name}}</h2><span class="{{$data->product_status = 0 ? "badge badge-danger" : "badge badge-success"}}">{{$data->product_status = 0 ? 'ไม่พร้อมจำหน่าย' :'พร้อมจำหน่าย'}}</span>
                </div>
                <img class="img img-fluid img-thumbnail" src="{{'/images/'.$data->preview_image}}" alt="">
            </div>
            <div class="col-6">
                <div class="row d-flex">
                    <div class="col-12 pt-3 border-bottom mt-5 ">
                        <h3> รายระเอียดสินค้า  {{$data->product_detail}}</h3>
                        <h4>{{$data->product_price}} บาท</h4>
                    </div>
                    {{-- <div class="col-12 p-2">
                        <span class="mr-1">จำนวน</span><input class="form-control d-inline input-sm col-1 mr-1" type="number" value="1">
                    </div> --}}
                    <div class="col-12 p-2 mt-2 ">
                        <h3>หมวดหมู่ {{$data->category->category_name}}</h3>
                    </div>
                    <div class="col-12 border-bottom">
                        <p>ร้าน {{$data->store->store_name}}</p>
                    </div>
                    <div class="col-12 mt-2">
                        <p>คงเหลือ {{$data->product_quantity}} ชิ้น</p>
                    </div>
                    <div class="col-12 border-top">
                        {{-- <a class="btn btn-danger text-white" onclick="window.history.back();">ย้อนหลับ</a> --}}
                        <a class="btn btn-primary mt-2 px-4" href="/cart/{{$data->id}}"><h5 class="pt-2">สั่งซื้อ</h5></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 mx-auto">
                <h2 class="text-center">ภาพเพิ่มเติม</h2>
            </div>
            @foreach ($data->product_image as $item)
                <div class="col-4 mb-3 mx-auto">
                    <img height="200" src="{{'/images/'.$item->product_image}}" alt="">
                </div>
            @endforeach
        </div>
    </div>

@endsection


