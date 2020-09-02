@extends('admin.layouts.master')

@section('content')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper ">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><i class="fas fa-tachometer-alt"></i> Edit System</h1>
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
                        <form class="col-lg-4" action="{{route('admin.system.addcategory')}}" method="POST">
                            @method('post')
                            @csrf
                            <div class="form-group ">
                                <label for="">Categories</label>
                                <input class="form-control" name="category_name" type="text" placeholder="ประเภทสินค้า">
                                <button type="submit" class="btn btn-success mt-1">บันทึก</button>
                            </div>
                        </form>
                        <form class="col-lg-4" action="{{route('admin.system.addusertype')}}" method="POST">
                            @method('post')
                            @csrf
                            <div class="form-group ">
                                <label for="">User Type</label>
                                <input class="form-control " name="user_type_name" type="text" placeholder="ประเภทผู้ใช้">
                                <button type="submit" class="btn btn-success  mt-1">บันทึก</button>
                            </div>
                        </form>
                        </div>
                        <div class="row">
                            <table class="table table-striped text-center col-lg-6 ">
                                <tr class="bg-primary">
                                    <td>ประเภทสินค้า</td>
                                </tr>
                                @foreach ($categories as $item)
                                <tr>
                                    <td>{{$item->category_name}}</td>
                                </tr>
                                @endforeach
                            </table>
                            <table class="table table-striped text-center col-lg-6 ">
                                <tr class="bg-success">
                                    <td>ประเภทผู้ใช้</td>
                                </tr>
                                @foreach ($user_type as $item)
                                <tr>
                                    <td>{{$item->type_name}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
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
