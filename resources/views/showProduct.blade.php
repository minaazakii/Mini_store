@extends('layouts.app')


    @include('layouts.navbar')

    <div class="container">
        @if(session()->has('cartSuccess'))
            <div class="text-white bg-success rounded py-2 my-2">
                {{ session('cartSuccess') }}
            </div>
        @endif

        <div class="row">

            <!-- products image -->
            <div class="col-xs-4">
                <div class="imgs_container">
                    <img src="{{ $product->path }}" />
                </div>
            </div>

             <!-- products info -->
             <div class="col-xs-6 col-xs-offset-1">
                <div class="product_info">

                    <div class="product_name">
                        <h1>{{ $product->name }} </h1>
                        <label class="prod_code">Zara Brand code: #12566</label>
                    </div>

                    <div class="rating">
                        <span id="rate_1"></span>
                        <span id="rate_2"></span>
                        <span id="rate_3"></span>
                        <span id="rate_4"></span>
                        <span id="rate_5"></span>

                        <div class="review">312 Reviews</div>
                    </div>


                    <div class="price">
                        <span id="price_number">Price:{{ $product->price }}</span>
                        {{-- <span id="old_price">$250</span>
                        <p id="offer">Special offer today 30% off</p> --}}
                    </div>

                    <div class="color_container">
                        <div class="color1"></div>
                        <div class="color2"></div>
                        <div class="color3"></div>
                        <div class="color4"></div>
                    </div>
                    <p id="in_stock">in Stock: <span> {{ $product->stock }} </span></p>
                    <hr>
                    <br>
                    <div class="prod_description">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus quis voluptatem eveniet accusantium atque fugit inventore nesciunt perferendis, harum blanditiis recusandae dignissimos, amet quidem dolorem excepturi doloremque, at repellat necessitatibus!
                    </div>
                    <hr>
                    <br>

                    <div class="row">
                        <div class="col-xs-4">

                        </div>

                        <div class="col-xs-8">
                            <div class="add_cart">
                                <form action="{{ route('addToCart',$product) }}" method="POST">
                                    @csrf
                                    <div class="quantity">
                                        <label >Quantity</label><br>
                                    </div>
                                    <input name="quantity" class="quantity" type="number" min="0" max="{{ $product->stock }}" placeholder="Quantity">

                                    <button type="submit" class="btn btn-primary">Add To Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div><!--End Row-->
    </div> <!-- End Container -->




    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

