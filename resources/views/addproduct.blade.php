@extends('layouts.app')
@include('layouts.navbar')
@section('content')

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-sm-4 mt-5">
                <form action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control my-4" placeholder="Product Name">
                    </div>

                    @error('name')
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="form-group">
                        <input type="number" name="price" class="form-control my-4"placeholder="Price">
                    </div>

                    @error('price')
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="form-group">
                        <input type="number" name="stock" class="form-control my-4"placeholder="stock">
                    </div>

                    @error('stock')
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="form-group">
                      <label class="d-block my-4">Insert Product Picture</label>
                      <input type="file" name="image" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection



