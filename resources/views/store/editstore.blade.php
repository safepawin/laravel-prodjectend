@extends('layouts.adminlte')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-6">
                <form action="{{route('store.update',$id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">ชื่อร้าน</label>
                        <input class="form-control" type="text" name="store_name" value="{{$store->store_name}}">
                    </div>
                    <div class="form-group">
                        <label for="">รายระเอียดร้าน</label>
                        <input class="form-control" type="text" name="store_detail" value="{{$store->store_detail}}">
                    </div>
                    <div class="form-group">
                        <label for="">เวลาเปิด-ปิด</label>
                        <input class="form-control" type="text" name="start_store_at" value="{{$store->start_store_at}}">
                    </div>
                    <div class="form-group">
                        <label for="">รูปร้าน</label>
                        <input class="custom-file" type="file" name="store_image" onchange="previewFiles(this)">
                    </div>
                    <button class="btn btn-primary">บันทึก</button>
                </form>
            </div>
            <div class="col-lg-6">
                <form action="{{route('store.update',$id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">ชื่อธนาคาร</label>
                        <input class="form-control" type="text" name="bank_name" value="{{isset($store->bank->bank_name) ? $store->bank->bank_name : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="">เลขบัญชี</label>
                        <input class="form-control" type="text" name="bank_number" value="{{isset($store->bank->bank_number) ? $store->bank->bank_number : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="">เบอร์โทร</label>
                        <input class="form-control" type="text" name="bank_phone" value="{{isset($store->bank->bank_phone) ? $store->bank->bank_phone : ''}}">
                    </div>

                    <button class="btn btn-primary">บันทึก</button>
                </form>
            </div>
            <div class="col-6 mx-auto" id="previewPicture">

            </div>
        </div>
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
         image.className = 'img img-fluid img-thumbnail'
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
