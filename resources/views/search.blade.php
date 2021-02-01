@extends('layouts.app')
@section('content')
@include('layouts.navbar')

            @foreach ($products as $product)
                <div class="container">
                <div class="img_container">
                    <img src="{{ $product->path }}" />
                    <a href="{{ route('shop.show',$product) }}" class="link-dark">{{ $product->name }}-{{ $product->price }}</a>
                </div>
                </div>
            @endforeach

@endsection
