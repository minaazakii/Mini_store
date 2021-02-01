@extends('layouts.app')
@section('content')

<div class="reg-page">
    <div class="reg-overlay">
        <div class="reg-container">
            <div class="reg-text">
                <h1>Register Now</h1>
            </div>
            <form class="reg-form" action="{{ route('register') }}" method="POST">
                @csrf
                <input type="text" placeholder="Enter Username" name = "username" value="{{ old('username') }}" />
                <div class="text-danger mb-2">
                    @error('username')
                        {{ $message }}
                    @enderror
                </div>

                <input type="password" placeholder="Enter Password" name = "password" />
                <div class="text-danger mb-2">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

                <input type="password" placeholder="Confirm Password" name="password_confirmation" />
                <div class="text-danger mb-2">
                    @error('password_confirmation')
                    you must Confirm your Password
                    @enderror
                </div>

                <input type="number" placeholder="+20 Phone number"  name="phone" value="{{ old('phone') }}"/>
                <div class="text-danger mb-2">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </div>

                <input type="email" placeholder="Enter Email" name="email" value="{{ old('email') }}" />
                <div class="text-danger mb-2">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <input type="email" placeholder="Confirm Email" name="email_confirmation" />
                <div class="text-danger mb-2">
                    @error('email_confirmation')
                        you must Confirm your Email
                    @enderror
                </div>

                <input type="submit" value="Register" id="reg-btn">
            </form>
        </div>
    </div>
</div>
@endsection

