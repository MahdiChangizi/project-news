<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
   @include('home.layouts.headTag')
</head>

<body>

    @include('home.layouts.navbar')

    <div class="site-main-container">


        <div class="site-main-container">
            <section class="top-post-area pt-10">
                <div class="container no-padding">
                    <div class="row small-gutters">


        <!-- Start top-post Area -->
        @yield('content')
        <!-- End latest-post Area -->

        @include('home.layouts.sidbar')



                     </div>
                </div>
            </section>
        </div>



    </div>

    @include('home.layouts.footer')
    @include('home.layouts.script')
</body>

</html>
