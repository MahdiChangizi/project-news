@extends('auth.layout.master')
@section('title', "فراموشی رمز عبور")

@section('form')
<form method="post" action="" class="login100-form validate-form">
    <span class="login100-form-title">
        Forgot Password
    </span>


    <div class="wrap-input100 validate-input">
        <input class="input100" type="text" name="email" placeholder="Email">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
    </div>


    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">
            Send
        </button>
    </div>



    <div class="text-center p-t-136">
        <a class="txt2" href="#">
            Create your Account
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a>
    </div>
</form>
@endsection