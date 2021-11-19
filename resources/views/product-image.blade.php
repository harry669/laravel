@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Image Upload  Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('image-store') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($message = Session::get('success'))
                             <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
                        @endif
                        <div class="form-group row">
                            <label for="File Upload" class="col-md-4 col-form-label text-md-right">{{ __('Upload File') }}</label>

                            <div class="col-md-6">
                        <input type="file" name="image-upload" id="image-upload" class="form-control @error('file') is-invalid @enderror" required>


                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="Product Select" class="col-md-4 col-form-label text-md-right">{{ __('Select Product') }}</label>

                          <div class="col-md-6">
                           <select class="form-control" id="product-select" name= "product-select" required>
                                <option value=""> Select Product </option>
                                @foreach($product_list as $product)
                            <option value={{ $product->id }}>{{ $product->product_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        </div>

                          <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
