@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="/store/storeEditProduct/{{$id}}/{{$product->id}}" method="post" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="form-group">
                        <label for="">ชื่อสินค้า</label>
                        <input class="form-control" type="text" name="product_name" value="{{$product->product_name}}">
                    </div>
                    <div class="form-group">
                        <label for="">ราคา</label>
                        <input class="form-control" type="text" name="product_price" value="{{$product->product_price}}">
                    </div>
                    <div class="form-group">
                        <label for="">จำนวน</label>
                        <input class="form-control" type="text" name="product_quantity" value="{{$product->product_quantity}}">
                    </div>
                    <div class="form-group">
                        <label for="">รายระเอียดสินค้า</label>
                        <input class="form-control" type="text" name="product_detail" value="{{$product->product_detail}}">
                    </div>
                    <div class="form-group">
                        <label for="">หมวดหมู่สินค้า</label>
                        <select class="custom-select" name="category" id="">
                            <option value="{{$product->category->id}}">{{$product->category->category_name}}</option>
                            @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">สถานะสินค้า</label>
                        <select class="custom-select" name="product_status" id="">
                            <option value="1">พร้อมขาย</option>
                            <option value="2">ไม่พร้อมขาย</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="d-block" for="">เปลี่ยนรูปภาพ Preview</label>
                        <div class="previewPicture">
                            <img id="imgpreview" class="" width="180" height="120" src="{{'/images/'.$product->preview_image}}" alt="">
                        </div>
                        <input class="custom-file pt-2" type="file" name="image" onchange="previewFiles(this)">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
<script>
    function previewFiles(file) {

     var preview = document.querySelector('#previewPicture');
     var image = document.querySelector('#imgpreview')
     var files  = file.files;

     function readAndPreview(file) {

     // Make sure `file.name` matches our extensions criteria
     if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
         var reader = new FileReader();

         reader.addEventListener("load", function () {
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
