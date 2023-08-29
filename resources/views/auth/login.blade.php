<!DOCTYPE html>
<html lang="en">

<head>
    @include('auth.layout.head-tag')
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vazir-font/dist/font-face.css">
</head>

<body>

<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('auth/assets/images/img-01.png') }}" alt="IMG">
                </div>

                <form method="post" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
                        Member Login
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: left;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="{{ route('password.request') }}">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{ route('register') }}">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('auth.layout.script')
</body>

</html>



