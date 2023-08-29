<!doctype html>
<html lang="en">

    <head>
        @include('admin.layouts.head-tag')
        @yield('head-tag')
    </head>

<body>
    @include('admin.layouts.header')

    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidbar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>

        </div>
    </div>

    @include('admin.layouts.script')
    @yield('script')

    <section class="toast-wrapper flex-row-reverse">
        @include('admin.alerts.toast.success')
        @include('admin.alerts.toast.error')
    </section>
    
</body>
</html>
