@extends('layouts.adminlte')

@section('content')
<div class="container-fluid ">
    <div class="row">
        <div class="col-12">
            <h1 class="m-2 text-dark text-center"><i class="fas fa-calendar-check"></i> Order All</h1>
        </div>
    </div>
</div>
    <div class="container" style="height:100vh;">
        <div class="row">
            <div class="col-12 text-center">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>ชื่อสินค้า</th>
                            <th>ราคาสินค้า</th>
                            <th>จำนวนที่ซื้อ</th>
                            <th>ราคารวม</th>
                            <th>ผู้ซื้อ</th>
                            <th>ซื้อเมื่อ</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_detail as $order)
                        <tr>
                            <td>{{$order->product_name}}</td>
                            <td>{{$order->product_price}}</td>
                            <td>{{$order->order_quantity}}</td>
                            <td>{{$order->order_total_unit}}</td>
                            <td>{{$order->order->user->name}}</td>
                            <td>{{date_format($order->updated_at,'Y/m/d H:i')}}</td>
                            <td>{{$order->order->order_status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
