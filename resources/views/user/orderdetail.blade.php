@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ชื่อสินค้า</th>
                            <th>ราคาสินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                            <th>ชื่อของร้าน</th>
                            <th>รหัสใบเส็รจ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderdetail as $item)
                        <tr class="text-center">
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->product_price}}</td>
                            <td>{{$item->order_quantity}}</td>
                            <td>{{$item->order_total_unit}}</td>
                            <td>{{$item->store->store_name}}</td>
                            <td>{{$item->order->billcode}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
