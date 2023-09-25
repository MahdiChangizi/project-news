@extends('auth.layout.master')
@section('title', "Password Reset")

@section('form')
<form method="post" action="{{ route('password.email') }}" class="login100-form validate-form">
    @csrf
    <span class="login100-form-title">
        Password Reset
    </span>

    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
        <input class="input100" type="text" name="email" placeholder="Email">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
    </div>
    @error('email')
    <div class="alert alert-danger" role="alert" dir="rtl" style="border-radius: 25px;">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: left;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">
            Send Email
        </button>
    </div>


</form>
@endsection