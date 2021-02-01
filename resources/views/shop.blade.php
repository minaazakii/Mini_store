@extends('layouts.app')
@include('layouts.navbar')
@section('content')


    <div class="container">
        @if(session('paymentSuccess'))
            <div class="bg-success text-white rounded">
                {{ session('paymentSuccess') }}
            </div>
        @endif
    </div>
    <div class="header">
        <div class="shop_titles">
            <h1><span id="m">M</span><span id="s">S</span> Products</h1>
            <h3>Awarded best shop for 2019 </h3>
            <p>Shop, Buy, deliver all in one place </p>
        </div>
    </div>
    <div class="products" id="prod">
        <h1>Our Products</h1>
        <div class="pro_imgs">
            @foreach ($products as $product)
                <div class="img_container">
                    <img src="{{ $product->path }}" />
                    <a href="{{ route('shop.show',$product) }}" class="link-dark">{{ $product->name }}-{{ $product->price }} L.E</a>
                </div>

            @endforeach


            <div class="clear"></div>
        </div>
    </div>
    <div class="news_overlay">
        <div class="news_img"></div>
    </div>
    <footer>
        <p>Copyrights &copy;2019 MS Shop All Rights Reserved</p>
    </footer>
    @endsection
