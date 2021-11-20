@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product List') }}</div>

                <div class="card-body">

                        @if ($message = Session::get('success'))
                             <div class="alert alert-success alert-block">
                             <button type="button" class="close" data-dismiss="alert">×</button>
                             <strong>{{ $message }}</strong>
                             </div>
                        @endif

                    @foreach($list as $product)
                     <form method="POST" action="{{ route("add-cart-item") }}">
                        @csrf
                     <input type="hidden" id="product_id" name="product_id" value="{{ $product->product_id }}">
                	<div class="card">
                    <img  class="card-img-top" src="{{ asset('/storage/product/'.$product->product_image) }}" alt="" title="" />
                    <div class="card-body">
                    <h4 class="card-title">{{$product->product_name}}</h4>
                    <p class="card-text">Some example text.</p>

                    <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="product-add{{ $product->product_id }}">
                  <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" id= "product-add{{ $product->product_id}}" name="product-add{{ $product->product_id }}" class="form-control input-number" value="1" min="1" max="10" onchange="updateCart({{ $product->product_id}})">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="product-add{{ $product->product_id }}">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
                      </div>
                    <button type="submit" class="btn btn-primary"> {{ __('Add To Cart') }}</button>
                    </div>
                    </div>
                    </form>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
 </div>
@endsection
@push('cart-script')
    <script src="{{ asset('js/plus-minus-cart.js') }}" defer></script>
@endpush