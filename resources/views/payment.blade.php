@extends('layouts.app')
@section('content')


    <div class="pay-container">
        <div class="reg-overlay">
            <div class="pay-text">
                <h1><span id="payment">Payment</span> Check out</h1>
            </div>
            <div class="pay-form">
            <form action="{{ route('payment.pay') }}"method="POST">
                @csrf
                <input type="text" name="cardname" placeholder="Credit Card Owner Name" />
                @error('cardname')
                    <div class="text-danger mb-2">
                        {{ $message }}
                    </div>
                @enderror

                <input type="number" name="number" placeholder="Credit Card Number" />
                @error('number')
                    <div class="text-danger mb-2">
                        {{ $message }}
                    </div>
                @enderror

                <input type="text" name="address" placeholder="Billing Address" />
                <input type="" name="cvc" placeholder="CVC" />
                @error('cvc')
                    <div class="text-danger mb-2">
                        {{ $message }}
                    </div>
                @enderror

                <input type="date" name="date" placeholder="Expire Date" />
                @error('date')
                    <div class="text-danger mb-2">
                        {{ $message }}
                    </div>
                @enderror

                <input type="submit" value="Check Out" id="checkout" />
            </form>
            </div>
        </div>
    </div>

@endsection
