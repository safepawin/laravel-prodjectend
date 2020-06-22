@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (!($user->store->isEmpty()))
                <div class="col-12 border-top">
                    <h2 class="pt-2">ร้านค้าของคุณ</h2>
                </div>
                    @foreach ($user->store as $item)
                        <div class="col-3">
                            <div class="text-center">
                                <a class="" href="{{route('store.profile',$item->id)}}"><img class="img img-fluid text-center" src="{{$item->store_image}}" alt=""></a>
                            </div>
                            <p class="text-center pt-2"><b><a href="{{route('store.profile',$item->id)}}">{{$item->store_name}}</a></b></p>
                        </div>
                    @endforeach
                        <div class="col-12 border-bottom mb-2"></div>
            @else
                <div class="col-12 border-bottom mb-2">
                    <h2>คุณไม่มีร้านค้า</h2>
                </div>
            @endif
            <div class="col-12 border-bottom">
                    <h2>เพิ่มร้านค้าของคุณ</h2>
                <form class="row" action="{{route('store.store')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-group col-4">
                        <label for="">ชื่อร้าน</label>
                        <input type="text" class="form-control" name="store_name" placeholder="exam ร้านยายจ่อย" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="">ข้อมูลร้าน</label>
                        <input type="text" class="form-control" name="store_detail" placeholder="exam ร้านขายของชำทุกอย่าง เช่น น้ำเปล่า ขนม ทิชชู่" required>
                    </div>
                    <div class="form-group col-2">
                        <label for="">เวลาเปิด-ปิด</label>
                        <input type="text" class="form-control" name="start_store_at" placeholder="exam 9.30 น. - 17.30 น." required>
                    </div>
                    <div class="form-group col-4">
                        <label for="">ชื่อ-สกุล</label>
                        <input type="text" class="form-control" name="fullname" placeholder="exam นาย สมพงษ์ ทิพรง" value="{{$user->firstname}} {{$user->lastname}}" required>
                    </div>
                    <div class="form-group col-2">
                        <label for="">เบอร์โทร</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="exam 0123456789" value="{{$user->phone_number}}" required>
                    </div>
                    @if ($user->address->isEmpty())
                    <div class="form-group col-6">
                        <label for="">ที่อยู่</label>
                        <input type="text" class="form-control" name="address" placeholder="exam 01/2 ม.1 ต.ครุ้งราน อ.บางปะอิน จ.พระนตรศรีอยุธยา 13000" value="{{$user->address}}" required>
                    </div>
                    @else
                    <div class="form-group col-6">
                        <label for="">ที่อยู่</label>
                        <select class="custom-select" id="inputGroupSelect01" name="address" required>
                            @foreach ($user->address as $item)
                                <option value="1">{{$item->address}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary">ร่วมธุรกิจ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
