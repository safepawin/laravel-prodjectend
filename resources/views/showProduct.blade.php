@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-6">
                <img class="img img-fluid img-thumbnail" src="https://via.placeholder.com/400x300" alt="">
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 border-bottom p-3">
                        <h4 class="d-inline pr-2">{{$data->product_name}}</h4><span class="{{$data->product_status = 0 ? "badge badge-danger" : "badge badge-success"}}">{{$data->product_status = 0 ? 'ไม่พร้อมจำหน่าย' :'พร้อมจำหน่าย'}}</span>
                    </div>
                    <div class="col-12 pt-3 border-bottom">
                        <p> รายระเอียดสินค้า {{$data->product_detail}}</p>
                        <h2>{{$data->product_price}} บาท</h2>
                    </div>
                    {{-- <div class="col-12 p-2">
                        <span class="mr-1">จำนวน</span><input class="form-control d-inline input-sm col-1 mr-1" type="number" value="1">
                    </div> --}}
                    <div class="col-12 mt-2">
                        <p>คงเหลือ {{$data->product_quantity}} ชิ้น</p>
                    </div>
                    <div class="col-12 ">
                        <a class="btn btn-danger" href="/">ย้อนหลับ</a>
                        <a class="btn btn-primary" href="/cart/{{$data->id}}">ซื้อ</a>
                    </div>
                    <div class="col-12 p-2 mt-2 border-top">
                        <p>หมวดหมู่ {{$data->category->category_name}}</p>
                    </div>
                    <div class="col-12 border-bottom">
                        <p>ร้าน {{$data->store->store_name}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 mx-auto">
                <h2 class="text-center">ภาพเพิ่มเติม</h2>
            </div>
            @foreach ($data->product_image as $item)
                <div class="col-4 mb-3">
                    <img class="img img-fluid img-thumbnail " src="{{$item->product_image}}" alt="">
                </div>
            @endforeach
        </div>
    </div>
@endsection
