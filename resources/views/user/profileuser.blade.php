@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('user.update')}}" method="post">
            <div class="row">
                @csrf
                @method('put')
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Firstname</label>
                        <input class="form-control" type="text" name="firstname" value="{{$user->firstname}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Lastname</label>
                        <input class="form-control" type="text" name="lastname" value="{{$user->lastname}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input class="form-control" type="text" name="phone_number" value="{{$user->phone_number}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Add New Address</label>
                        <input class="form-control" type="text" name="address" value="">
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="">Type</label>
                        <input class="form-control" type="text" value="{{$user->user_type->type_name}}" readonly>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="">NickName</label>
                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                    </div>
                </div>
                <div class="col-6">
                    <label for="">Old Address</label>
                    <ul class="list-group">
                        @foreach ($user->address as $item)
                            <li class="list-group-item p-1">
                                <b class="text-center ml-2">{{$item->address}}</b>
                                <a class="btn " onclick="deleteAddress({{$item->id}},this)"><i class="far fa-trash-alt text-danger"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6 ">
                    <label for="">* ถ้ากดแล้วระบบจะทำการบันทึกข้อมูลใหม่ โปรดตรวจสอบให้แน่ใจว่าข้อมูลถูกต้อง</label>
                    <button class="btn btn-success ">แก้ไข</button>
                </div>
            </div>
        </form>
    </div>
@endsection


<script>
    function deleteAddress(id,e){
        e.parentElement.remove()
        axios.delete('http://projectend.test:8080/user/delete/'+id).then(res=>{
            console.log(res)
        })
    }
</script>
