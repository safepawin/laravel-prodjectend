<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>


    @yield('header')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>ร้านค้าของคุณ</title>

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('store.profile',$id)}}" class="nav-link">Home</a>
          </li>
          {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li> --}}
        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" href="/" role="button"><i class="fas fa-shopping-basket text-danger mr-2"></i><b>กลับ</b></a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                class="fas fa-th-large"></i></a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('store.edit',$id)}}" class="brand-link" data-toggle="tooltip" data-placement="right" title="เปลี่ยนชื่อร้าน , รายระเอียด , รูปร้านค้า">
          {{-- <img src="{{.Auth::user()->store->find($id)->store_image}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8"> --}}
          <span class="brand-text font-weight-light">{{Auth::user()->store->find($id)->store_name}}</span>
          @if (isset(Auth::user()->store->find($id)->bank))
            @else <span class="text-white badge badge-danger d-block">กรอกข้อมูลชำระเงินที่นี่</span>
          @endif
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{'/images/'.Auth::user()->store->find($id)->store_image}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="{{route('store.profile',$id)}}" class="d-block">{{Auth::user()->firstname}} {{Auth::user()->lastname}} </a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('store.profile',$id)}}" class="nav-link active">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        DashBroad
                        {{-- <span class="right badge badge-danger">New</span> --}}
                      </p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-th-large"></i>
                    <p>
                        จัดการสินค้า
                        <i class="right fas fa-grip-lines"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.createProduct',$id)}}" class="nav-link ">
                            <i class="far fa-plus-square"></i>
                            <p>เพิ่มสินค้า</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="far fa-minus-square"></i>
                            <p>แก้ไขสินค้า</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      @yield('content')
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>


    @yield('script')
</body>
</html>
