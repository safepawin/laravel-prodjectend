@extends('admin.layouts.master')
@section('script')
    <script>
        function onChangeType(){
            var form = document.getElementById('form-select')
            form.submit()
        }
    </script>
@endsection
@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper ">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-tachometer-alt"></i> DashBroad</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @if (Session::has('success'))
                        <p class="alert alert-success text-center">{{Session::get('success')}}</p>
                    @endif
                    {{-- <h3 class="text-right"><a class="text" href="">ดูข้อมูลการขายทั้งหมด</a></h3> --}}
                {{-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol> --}}
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- PIE CHART -->
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <tr>
                            <td>#</td>
                            <td>ผู้ใช้</td>
                            <td>ร้านค้าที่มี</td>
                            <td>สถานะปัจจุบัน</td>
                            <td>สถานะ</td>

                        </tr>
                        <tr>
                            @foreach ($user as $item)
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->store}}</td>
                            <td>{{$item->user_type->type_name}}</td>
                            <td>
                                <form id="form-select" action="{{route('admin.edit.user')}}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="{{$item->id}}" name="id">
                                    <select onchange="onChangeType()" class="custom-select col-3" name="user_type" id="">
                                        <option value="" selected>Select</option>
                                        <option class="text-success" value="1">seller</option>
                                        <option class="text-danger" value="3">baned</option>
                                    </select>
                                </form>
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
    </div>
@endsection
