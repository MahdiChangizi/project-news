@php
$topSelectedPost = App\Models\Admin\Post::where('selected', 1)->orderBy('created_at', 'desc')->limit(3)->get();
$mostControversialPosts = App\Models\Admin\Post::withCount('comments')->orderBy('comments_count', 'desc')->limit(20)->get();
$banners = App\Models\Admin\Banner::orderBy('created_at', 'desc')->limit(2)->get();
@endphp

<div class="col-lg-4">
    <div class="sidebars-area">
        <div class="single-sidebar-widget editors-pick-widget">
            <h6 class="title">انتخاب سردبیر</h6>

            <div class="editors-pick-post">
                <div class="feature-img-wrap relative">
                    <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{ asset($topSelectedPost[0]->image['indexArray']['small'] )}}" alt="">

                    </div>
                    <ul class="tags">
                        <li><a href="{{ route('home.category', $topSelectedPost[0]->category->id) }}">{{ $topSelectedPost[0]->category->name }}</a></li>
                    </ul>
                </div>
                <div class="details">
                    <a href="{{ route('home.show-post', $topSelectedPost[0]->id) }}">
                        <h4 class="mt-20">{{ $topSelectedPost[0]->title }}</h4>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-user"></span> {{ $topSelectedPost[0]->user->username }}</a></li>
                        <li><a href="#">{{ jdate( $topSelectedPost[0]->cerated_at ) }}<span class="lnr lnr-calendar-full"></span></a></li>
                        <li><a href="#"> {{ $topSelectedPost[0]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                    </ul>
                    <p class="excert">
                        {!! $topSelectedPost[0]->summary !!}
                    </p>
                </div>
            </div>


        </div>

        <div class="single-sidebar-widget ads-widget">
            <img class="img-fluid" src="{{ asset($banners[0]->image['indexArray']['banner1']) }}" alt="">
        </div>


        <div class="single-sidebar-widget most-popular-widget">
            <h6 class="title">پر بحث ترین ها</h6>

            @foreach ($mostControversialPosts as $mostControversialPost)
                <div class="single-list flex-row d-flex">
                    <div class="thumb">
                        <img width="110" src="{{ asset($mostControversialPost->image['indexArray']['small']) }}" alt="">
                    </div>
                    <div class="details">
                        <a href="{{ route('home.show-post', $mostControversialPost->id) }}">
                            <h6>{{ $mostControversialPost->title }}</h6>
                        </a>
                        <ul class="meta">
                            <li><a href="#"> {{ jdate($mostControversialPost->created_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                            <li><a href="#"> {{ $mostControversialPost->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                        </ul>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>


