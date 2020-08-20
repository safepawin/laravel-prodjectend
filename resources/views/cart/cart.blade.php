@extends('layouts.app')
@section('script')

    <script>
        function deleteProduct(id,e){
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
                    axios.delete('cart/'+id).then(res=>{
                    console.log(res)
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    ).then(function(){
                        window.location.href = 'cart'
                    })
                    })

                }
            })
        }

        function increase(id){
            let value = document.getElementById(id).value ;
            axios.put('/cart/'+id).then(res=>{
                document.getElementById('price'+id).innerHTML = res.data[0].quantity * res.data[0].price + ' บาท'
                document.getElementById('totalPrice').innerHTML = res.data[1]
                value = res.data[0].quantity
                document.getElementById(id).value = value;
                console.log(res)
        })
    }

    function decrease(id){
        let value = document.getElementById(id).value ;
        document.getElementById(id).value = value;
        axios.delete('/cart/decrease/'+id).then(res=>{
            document.getElementById('price'+id).innerHTML = res.data[0].quantity * res.data[0].price + ' บาท'
            document.getElementById('totalPrice').innerHTML = res.data[1]
            value = res.data[0].quantity
            document.getElementById(id).value = value;
            console.log(res)
        })
    }
    </script>

@endsection
@section('content')
<div class="container">
    <div class="card shopping-cart">
      <div class="card-header bg-dark ">
        <button class="btn text-danger btn-outline" onclick="window.history.back()"><i class="fas fa-less-than text-danger pr-1"></i>Back</button>
        <i class="fa fa-shopping-cart ml-2" aria-hidden="true"></i>
        <span>Shipping cart</span>
        <div class="clearfix"></div>
    </div>
      <div class="card-body">
        <!-- PRODUCT -->
            @if (!(Cart::session(Auth::id())->getContent()->isEmpty()))
                @foreach (\Cart::session(Auth::id())->getContent() as $item)
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img
                        class="img-responsive"
                        src="{{'/images/'.$item->attributes->images->product_image}}"
                        alt="prewiew"
                        width="120"
                        height="80"
                    />
                    </div>
                    <div class="col-12 text-center col-sm-12 text-md-left col-md-6">
                    <h4 class="product-name pt-2">
                        <strong>{{$item->name}}</strong>
                    </h4>
                    <p id="price{{$item->id}}">{{$item->price * $item->quantity}} บาท</p>
                    <h4>
                        <small>{{$item->product_detail}}</small>
                    </h4>
                    </div>
                    <div class="col-12 col-sm-12 text-center col-md-4 text-md-right row">
                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                        <h6>
                        <strong>
                            {{$item->price}}
                            <span class="text-muted">x</span>
                        </strong>
                        </h6>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 mx-auto">
                        <div class="quantity">
                        <input type="button" value="+" class="plus" onclick="increase({{$item->id}})"/>
                        <input
                            type="number"
                            step="1"
                            max="99"
                            min="1"
                            value="{{$item->quantity}}"
                            title="Qty"
                            class="qty"
                            size="4"
                            readonly
                            id="{{$item->id}}"
                        />
                        <input type="button" value="-" class="minus" onclick="decrease({{$item->id}})"/>
                        </div>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 text-right">
                        <button type="button" class="btn btn-outline-danger btn-xs btn-delete" onclick="deleteProduct({{$item->id}},this)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                    </div>
                </div>
                <hr />
                @endforeach
                @else
                    <h1 class="text-center">ไม่มีสินค้าในตระกร้า</h1>
            @endif
        <!-- END PRODUCT -->
        <!-- <div class="text-right">
          <a href class="btn btn-outline-secondary text-right">Update shopping cart</a>
        </div>-->
      </div>
      @if (!(Cart::session(Auth::id())->getContent()->isEmpty()))
      <div class="card-footer">
        <!-- <div class="coupon col-md-5 col-sm-5 no-padding-left text-left">
          <div class="row">
            <div class="col-6">
              <input type="text" class="form-control" placeholder="cupone code" />
            </div>
            <div class="col-6">
              <input type="submit" class="btn btn-default" value="Use cupone" />
            </div>
          </div>
        </div>-->
        <div class="text-right" style="margin: 10px">
          <a href="{{route('checkout.index')}}" class="btn btn-success text-right">Checkout</a>
          <div class="text-right" style="margin: 5px">
            Total price:
            <b id="totalPrice">{{Cart::session(Auth::id())->getTotal()}}</b>
          </div>
        </div>
      </div>
      @else
      @endif
    </div>
  </div>
@endsection

