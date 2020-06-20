@extends('layouts.adminlte')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-plus-square"></i> Add Product</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
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
              <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('post')
                  <input type="hidden" name="store" value="{{$id}}">
                <div class="row">
                    <div class="col-4 form-group">
                        <label for="">Product Name</label>
                        <input class="form-control " type="text" name="product_name" placeholder="exam ตระกร้าสาร ,ถุงผ้า, ของเล่นพลาสติกปลอดสาร">
                    </div>
                    <div class="col-4 form-group">
                        <label for="">Product Detail</label>
                        <input class="form-control " type="text" name="product_detail" placeholder="exam ตระกร้านี้ทำมาจากไม้วิเศษ ไม่มีวันหักหรืองอ ต้องผ่านวิธีการทำแบบพิเศษเท่านั้น!">
                    </div>
                    <div class="col-4 form-group">
                        <label for="">Price</label>
                        <input class="form-control " type="number" name="product_price" placeholder="exam 20.00 ,36.36 ,10 ,300">
                    </div>
                    <div class="col-4 form-group">
                        <label for="">Quantity</label>
                        <input class="form-control " type="number" name="product_quantity" placeholder="exam 7 ,8 ,9 ,10 ,11">
                    </div>
                    <div class="col-4 form-group">
                        <label for="">Type</label>
                        <select class="custom-select" name="category" id="">
                            @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 row">
                        <div class="col-3">
                            <input type="file" multiple name="images[]" class="custom-file" id="files" onchange="previewFiles(this)">
                            <label for="">รูปสินค้า</label>
                        </div>
                        <div class="col-9 row" id="previewPicture"></div>
                    </div>
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="เพิ่มสินค้า">
                    </div>
              </form>
                <div class="col-12 mt-3">
                    @foreach ($errors->all() as $message)
                        <p class="alert alert-danger">{{$message}}</p>
                    @endforeach
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


<script>
   function previewFiles(file) {

    var preview = document.querySelector('#previewPicture');
    var files  = file.files;

    function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
        var reader = new FileReader();

        reader.addEventListener("load", function () {
        var image = new Image();
        image.className = 'img img-fluid col-4'
        image.title = file.name;
        image.src = this.result;
        preview.appendChild( image );
        }, false);

        reader.readAsDataURL(file);
    }

    }

    if (files) {
    [].forEach.call(files, readAndPreview);
    }

}
</script>
