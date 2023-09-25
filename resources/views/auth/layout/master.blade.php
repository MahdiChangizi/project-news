<!DOCTYPE html>
<html lang="en">

<head>
    @include('auth.layout.head-tag')
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vazir-font/dist/font-face.css">
</head>

<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('auth/assets/images/img-01.png') }}" alt="IMG">
            </div>

            @yield('form')
            
        </div>
    </div>
</div>

    @include('auth.layout.script')

</body>
</html>