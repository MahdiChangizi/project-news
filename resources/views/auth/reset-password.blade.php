@extends('auth.layout.master')
@section('title', "Password Reset")

@section('form')
    <form method="post" action="{{ route('password.store') }}" class="login100-form validate-form">
        @csrf


        <input type="hidden" name="token" value="{{ $request->route('token') }}">


        <span class="login100-form-title">
            Password Reset
        </span>



        <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="email" placeholder="Email" value="{{ $request->email }}">
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



        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
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


        <div class="wrap-input100 validate-input" data-validate="password_confirmation is required">
            <input class="input100" type="password" name="password_confirmation" placeholder="password_confirmation">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
        </div>
        @error('password_confirmation')
        <div class="alert alert-danger" role="alert" dir="rtl" style="border-radius: 25px;">
            {{ $message }}
        </div>
        @enderror


        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Send Email
            </button>
        </div>


    </form>
@endsection