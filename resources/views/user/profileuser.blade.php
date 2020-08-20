@extends('layouts.app')
@section('script')
    <script>
        function deleteAddress(id,e){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    e.parentElement.remove()
                    axios.delete('http://projectend.test/user/delete/'+id).then(res=>{
                    // console.log(res)
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                    })

                }
            })
        }
        function editAddress(e,id){
            const address = e.getAttribute('data-modal-address')
            const editAddress = document.getElementById('address')
            const addressId = document.getElementById('addressId')
            editAddress.value = address
            addressId.value = id
        }

    </script>

@endsection
@section('content')
    <div class="container">
        <form class="form" action="{{route('user.update')}}" method="post">
            <div class="row">
                @csrf
                @method('put')
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Firstname</label>
                        <input class="form-control" type="text" name="firstname" value="{{$user->firstname}}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Lastname</label>
                        <input class="form-control" type="text" name="lastname" value="{{$user->lastname}}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input class="form-control" type="text" name="phone_number" value="{{$user->phone_number}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Add New Address</label>
                        <input class="form-control" type="text" name="address" value="">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Type</label>
                        <input class="form-control" type="text" value="{{$user->user_type->type_name}}" readonly>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">NickName</label>
                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="">Old Address</label>
                    <ul class="list-group">
                        @foreach ($user->address as $item)
                            <li class="list-group-item p-1 text-truncate" title="{{$item->address}}">
                                <b class="text-center pl-2  ">{{$item->address}}</b>
                                {{-- <a class="btn " onclick="deleteAddress({{$item->id}},this)"><i class="far fa-trash-alt text-danger"></i></a> --}}
                                <a class="btn " onclick="editAddress(this,{{$item->id}})" data-toggle="modal" data-target="#modalEdit" data-modal-address="{{$item->address}}"><i class="far fa-edit text-info"></i></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6 ">
                    <label for="">* ถ้ากดแล้วระบบจะทำการบันทึกข้อมูลใหม่ โปรดตรวจสอบให้แน่ใจว่าข้อมูลถูกต้อง</label>
                    <button class="btn btn-success save-profile">บันทึก</button>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">จัดการผู้ใช้</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.editAddress')}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="addressId" id="addressId">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input class="form-control" type="text" name="address" id="address" placeholder="แก้ไขที่อยู่" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-save">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


