@extends('layouts.app')
@section('header')
<script src="{{asset('js/thaibath.js')}}"></script>
<script>
    window.onload = (event) => {
        document.getElementById('thaibath').innerText = '( '+THBText({{Cart::session(Auth::id())->getTotal()}})+' )'
    };
</script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-light table-striped table-bordered table-responsive-sm table-info">
                    <thead>
                        <tr class="text-center table-danger">
                            <th><b>รูปสินค้า</b></th>
                            <th><b>ชื่อสินค้า</b></th>
                            <th><b>ราคา</b></th>
                            <th><b>จำนวน</b></th>
                            <th><b>ราคารวม</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::session(Auth::id())->getContent() as $item)
                        <tr class="text-center">
                            <td><img class="rounded" width="70px" src="{{'/images/'.$item->attributes->images->product_image}}" alt=""></td>
                            <td>{{$item->name}}</td>
                            <td>{{number_format($item->price,2)}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{number_format($item->quantity * $item->price,2)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="text-center table-success">
                            <td>รวมทั้งหมด</td>
                            <td colspan="3" ><span id="thaibath" style="font-size: 16px"></span></td>
                            <td class="text-danger">{{Cart::session(Auth::id())->getTotal()}} บาท</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>ธนาคาร</th>
                            <th>เลขบัญชี</th>
                            <th>ชื่อเจ้าของบัญชี</th>
                            <th>เบอร์ติดต่อเจ้าของบัญชี</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->bank as $item)
                        <tr class="text-center">
                            <td>{{$item->bank_name}}</td>
                            <td><b>{{$item->bank_number}}</b></td>
                            <td>{{$item->user->firstname}}  {{$item->user->lastname}}</td>
                            <td>{{$item->bank_phone}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 row">
                <form action="{{route('checkout.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="">
                    <div class="form-group col-lg-12">
                        <label for="">ยอดเงินที่ต้องชำระ</label>
                        <input type="text" readonly class="form-control text-right" name="total" value="{{Cart::session(Auth::id())->getTotal()}} บาท">
                    </div>
                    <div class="form-group col-lg-12">
                        <div class="row mb-3">
                            @if (strlen(Auth::user()->phone_number) > 0 && strlen(Auth::user()->address) > 0)
                            <div class="col-lg-12">
                                <label for="">ที่อยู่และเบอร์โทร <span class="badge badge-danger" style="font-size: 16px">* กรุณาตรวจสอบที่อยู่ก่อน ยืนยันการชำระเงิน</span></label>
                                <select class="custom-select" name="address" id="">
                                    @foreach (Auth::user()->address as $item)
                                        <option value="{{$item->id}}">{{$item->address}} เบอร์โทร {{Auth::user()->phone_number}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @else
                                <a href="{{route('user.profile')}}">กรุณาเพิ่มที่อยู่ และเบอร์โทร ของท่านก่อนค่ะ</a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="">รูปภาพใบเสร็จการโอนเงิน</label>
                        <input class="custom-file" type="file" name="billimage" required>
                    </div>
                        @if (strlen(Auth::user()->phone_number) > 0 && strlen(Auth::user()->address) > 0)
                        <button class="btn btn-primary" type="submit">ยืนยันการชำระเงิน</button>
                            @else
                                <a href="{{route('user.profile')}}">กรุณาเพิ่มที่อยู่ และเบอร์โทร ของท่านก่อนค่ะ</a>
                        @endif
                </div>
                </form>
            <div class="col-lg-6">
                <h2 class="text-center mt-3">ขั้นตอนการตรวจสอบการสั่งซื้อ</h2>
                <ol>
                    <li>เช็คที่ มุมบนขวามือ > ประวัติการสั่งซื้อ <a href="{{route('user.order')}}">ที่นี่</a></li>
                    <li>การโอนยอดที่เป็น จุดทศนิยม จะให้การตรวจสอบยอดง่ายขึ้น เช่น 600.01 , 600.20</li>
                    <li>หากพบปัญหา จากสินค้าที่สั่งซื้อ ให้โทรแจ้งผู้ขายโดยตรง</li>
                    <li>ทางเว็บไซต์ไม่มีส่วนใด้สว่นเสียกับการซื้อขายของท่านเป็นเพียง แพลตฟอร์ม สำหรับการซื้อขายเท่านั้น</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

