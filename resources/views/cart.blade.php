@extends('layouts.app')

<head>
    <style>
        body
        {
            background-image: linear-gradient(to top,rgb(255, 255, 255) ,rgba(73, 255, 209, 0.115));
            background-repeat: no-repeat;
        }
    </style>
</head>


<legend class="legend">Your Cart</legend>
{{-- Check if There is Product --}}
@if(empty($products))
    <div class="text-center"> no products</div>

@else

    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="bought_list_container">
                    <ul>
                        {{-- Listing Products --}}
                        @foreach($products as $product)
                            <li>
                                <div class="bought_item">
                                    <img src="{{ $product->path }}" class="bought_img" />
                                    <label>{{ $product->name }}</label>
                                    <label>Price Per piece: {{ $product->price }}</label>

                                    <label id="prod_total">Total: <span id="prod_total_amount">{{ $carts[$i]->totalPrice }}</span></label>
                                    <label>Quantity
                                        <form action="{{ route('cart.edit',$carts[$i]) }}" method="POST">
                                            @csrf
                                            <input name="quantity" class="quantity" type="number" value="{{ $carts[$i++]->quantity }}" max="{{ $product->stock }}" min="0" placeholder="Quantity">
                                            <button class="btn btn-primary mt-2 d-inline">Edit</button>
                                        </form>

                                        <form action="{{ route('cart.remove',$carts[$i-1]) }}", method="POST">
                                            @csrf
                                              <button class="btn btn-danger mt-2 ">Remove</button>
                                        </form>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div><!-- bought list container-->
@endif

            </div> <!-- col-->

            {{-- ads --}}
            {{-- <div class="col-xs-3">
                <div class="ads">
                    <ul>
                        <li>
                            <div> <img src="imgs/sky3.jpg" class="ads_img" /> </div>
                        </li>
                        <li>
                            <div> <img src="imgs/sky4.jpg" class="ads_img" /> </div>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div><!-- row-->

        {{-- if There is No Products Hide Payment Button --}}
        @if(empty($products)== false)
        <hr>
            <div class="total_amount col-xs-4">
                <label>Bill</label>
                <input type="text" placeholder=" {{ $totalprice }}  " disabled />
            </div>
            <div class="go_payment col-xs-offset-2 col-xs-6">
                <form action="{{ route('payment.index')}}">
                    @csrf
                    <button class="btn btn-success">Procced To Payment &rarr;</button>
                </form>
            </div>
            <div class="clear"></div>
        @endif
    </div>





    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
