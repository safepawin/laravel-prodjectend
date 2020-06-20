@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="/store/storeEditProduct/{{$id}}/{{$product->id}}" method="post">
                    @method('post')
                    @csrf
                    <div class="form-group">
                        <label for="">ชื่อสินค้า</label>
                        <input class="form-control" type="text" name="product_name" value="{{$product->product_name}}">
                    </div>
                    <div class="form-group">
                        <label for="">ราคา</label>
                        <input class="form-control" type="text" name="product_price" value="{{$product->product_price}}">
                    </div>
                    <div class="form-group">
                        <label for="">จำนวน</label>
                        <input class="form-control" type="text" name="product_quantity" value="{{$product->product_quantity}}">
                    </div>
                    <div class="form-group">
                        <label for="">รายระเอียดสินค้า</label>
                        <input class="form-control" type="text" name="product_detail" value="{{$product->product_detail}}">
                    </div>
                    <div class="form-group">
                        <label for="">หมวดหมู่สินค้า</label>
                        <select class="custom-select" name="category" id="">
                            <option value="{{$product->category->id}}">{{$product->category->category_name}}</option>
                            @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">สถานะสินค้า</label>
                        <select class="custom-select" name="product_status" id="">
                            <option value="1">พร้อมขาย</option>
                            <option value="2">ไม่พร้อมขาย</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
