@extends('layouts.app')
@section('content')

    <div class="containers">
        <div class="overlay">
            <div class="login-container">
                <div class="login-title">
                    <h1>Login</h1>
                </div>
                <span>  </span>
                <form class="login-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    @if(session()->has('loginError'))
                    <div class="text-white bg-danger rounded my-2 py-3 text-center">
                        {{ session('loginError') }}
                    </div>
                    @endif
                    <input type="text" placeholder="Username" name = "username" required />
                    <div class="text-danger mb-2">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </div>

                    <input type="password" placeholder="Password"  name = "password"  required/>
                    <div class="text-danger mb-2">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>

                    <input type="submit" value="Login" id="login-btn" />
                    <div class="redir">
                        <div class="register-text">
                            <p>Don't have an account? &nbsp; <a href="{{ route('register') }}">Sign up.</a> </p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
