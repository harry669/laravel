@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product List') }}</div>

                <div class="card-body">

                    @foreach($list as $product)
                	<div class="card">
                    <img  class="card-img-top" src="{{ asset('/storage/product/'.$product->product_image) }}" alt="" title="" />
                    <div class="card-body">
                    <h4 class="card-title">{{$product->product_name}}</h4>
                    <p class="card-text">Some example text.</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
 </div>
@endsection