<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>اخبار پربازدید</h4>
                <ul>
                    @foreach (App\Models\Admin\Post::where('selected', 1)->orderBy('created_at', 'desc')->limit(4)->get() as $topSelectedPost)
                    <li>
                        <a href="">{{ $topSelectedPost->title }}</a>
                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>لینک سریع</h4>
                <ul>

                    @foreach ( App\Models\Admin\Menu::whereNull('parent_id')->get() as $menu)
                    <li class="menu-active">
                        <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                    </li>
                    @endforeach

                </ul>
            </div>


            {{-- <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>ایسنتاگرام</h4>
                <ul class="instafeed d-flex flex-wrap">
                    <li><img src="img/i1.jpg" alt=""></li>
                    <li><img src="img/i2.jpg" alt=""></li>
                    <li><img src="img/i3.jpg" alt=""></li>
                    <li><img src="img/i4.jpg" alt=""></li>
                    <li><img src="img/i5.jpg" alt=""></li>
                    <li><img src="img/i6.jpg" alt=""></li>
                    <li><img src="img/i7.jpg" alt=""></li>
                    <li><img src="img/i8.jpg" alt=""></li>
                </ul>
            </div> --}}


        </div>
        <div class="footer-bottom row align-items-center">

            <div class="col-lg-4 col-md-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
