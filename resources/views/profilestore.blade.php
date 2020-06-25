@extends('layouts.adminlte')
@section('header')
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            @foreach ($order_detail as $item)
          ['{{$item->product_name}}', {{$item->order_quantity}}],
            @endforeach
        ]);

        // Set chart options
        var options = {'title':'สินค้าที่ผู้ใช้นิยม 5 รายการที่มีผู้ซื้อบ่อยที่สุด',
                       'width':700,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('pieChart'));
        chart.draw(data, options);
      }



    </script>
@endsection
@section('content')
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
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
                      <h3 class="text-right"><a class="text" href="">ดูข้อมูลการขายทั้งหมด</a></h3>
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
                    <div class="col-md-6">
                        <div class="card card-danger">
                            <div class="card-header">
                            <h3 class="card-title">Pie Chart</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> --}}
                            </div>
                            </div>
                            <div class="card-body mb-1">
                                <div id="pieChart" ></div>
                            </div>
                        </div>
                            <!-- /.card-body -->
                    </div>
                    <div class="col-md-6">
                        <!-- STACKED BAR CHART -->
                        <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">ตารางการขาย 5 รายการที่มีผู้ซื้อบ่อยที่สุด</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> --}}

                            </div>
                        </div>
                        <div class="card-body mb-3">
                            <table class="table w-100 ">
                                <thead>
                                    <tr class="text-center">
                                        <td>ชื่อสินค้า</td>
                                        <td>ราคา</td>
                                        <td>จำนวนที่ขายได้</td>
                                        <td>ราคารวม</td>
                                        <td>รายระเอียด</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_detail as $item)
                                    <tr class="text-center">
                                        <td>{{$item->product_name}}</td>
                                        <td>{{$item->product_price}}</td>
                                        <td>{{$item->order_quantity}}</td>
                                        <td>{{$item->order_total_unit}}</td>
                                        <td><a href=""><i class="fas fa-receipt"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-0">
                            <h3 class="card-title">Products</h3>
                            <div class="card-tools">
                                {{-- <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                                </a> --}}
                                {{$product->links()}}
                            </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>More</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>
                                                <img src="{{asset('/images/'.$item->product_image[0]->product_image)}}" alt="{{$item->product_name}}" class="img-circle img-size-32 mr-2">
                                                <b>{{$item->product_name}}</b>
                                            </td>
                                            <td><b>{{number_format($item->product_price,2)}}</b> บาท</td>
                                            <td>
                                                <small class="text-success mr-1">
                                                <i class="fas fa-arrow-up"></i>
                                                {{number_format($item->product_quantity)}}
                                                </small>
                                                {{number_format($item->product_quantity * $item->product_price,2)}}
                                            </td>
                                            <td>
                                                <b class="{{$item->product_status == 1 ? 'text-success' : 'text-danger' }}">{{$item->product_status == 1 ? 'พร้อมขาย' : 'ไม่พร้อมขาย' }}</b>
                                            </td>
                                            <td>
                                                <a href="/store/storeEditProduct/{{$id}}/{{$item->id}}" class="text-muted">
                                                <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>

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


