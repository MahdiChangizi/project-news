@extends('auth.layout.master')

@section('title', "Register")

@section('form')
<form method="post" action="{{ route('register') }}" class="login100-form validate-form">
    @csrf
    <span class="login100-form-title">
        Register
    </span>

    {{-- userName --}}
    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
        <input class="input100" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-user" aria-hidden="true"></i>
        </span>
    </div>
    @error('username')
    <div class="alert alert-danger" role="alert" dir="rtl" style="border-radius: 25px;">
        {{ $message }}
    </div>
    @enderror


        {{-- Email --}}
    <div class="wrap-input100 validate-input">
        <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
    </div>
    @error('email')
    <div class="alert alert-danger" role="alert" dir="rtl" style="border-radius: 25px;">
        {{ $message }}
    </div>
    @enderror


      {{-- Password --}}
    <div class="wrap-input100 validate-input" data-validate="Password is required">
        <input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>
    @error('password')
    <div class="alert alert-danger" role="alert" dir="rtl" style="border-radius: 25px;">
        {{ $message }}
    </div>
    @enderror


    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">
            Register
        </button>
    </div>


    <a class="btn btn-danger mt-2 d-flex justify-content-center align-items-center w-100" href="{{ route('google.redirect') }}">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
        <span class="ml-2">Register with Google</span>
    </a>


    <div class="text-center p-t-136">
        <a class="txt2" href="{{ route('login') }}">
            Login your Account
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a>
    </div>
</form>
@endsection