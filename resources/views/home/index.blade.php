@extends('home.layouts.master')

@section('content')




            <div class="col-lg-8 top-post-left">
                <div class="feature-image-thumb relative">
                    <div class="overlay overlay-bg"></div>

                    @if (!empty($topSelectedPost[0]->image['indexArray']['small']))
                        <img class="img-fluid" src="{{ asset($topSelectedPost[0]->image['indexArray']['small']) }}">
                    @endif

                </div>

                <div class="top-post-details">

                    @if (!empty($topSelectedPost[0]->category->name))
                        <ul class="tags">
                            <li><a href="{{ route('home.category', $topSelectedPost[0]->category->id) }}">{{ $topSelectedPost[0]->category->name }}</a></li>
                        </ul>
                    @endif

                    @if (!empty($topSelectedPost[0]->title))
                        <a href="{{ route('home.show-post', $topSelectedPost[0]->id) }}">
                            <h3>{{ $topSelectedPost[0]->title }}</h3>
                        </a>
                    @endif


                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span> {{ $topSelectedPost[0]->user->username }} </a></li>
                            <li><a href="#">{{ jdate($topSelectedPost[0]->created_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                            <li><a href="#"> {{ $topSelectedPost[0]->comments->count() }} <span class="lnr lnr-bubble"></span></a></li>
                        </ul>


                </div>
            </div>


            <div class="col-lg-4 top-post-right">


                @if (!empty($topSelectedPost[1]))
                    <div class="single-top-post">
                        <div class="feature-image-thumb relative">
                            <div class="overlay overlay-bg"></div>

                            @if (!empty($topSelectedPost[1]->image['indexArray']['small']))
                                <img class="img-fluid" src="{{ asset($topSelectedPost[1]->image['indexArray']['small'] )}}">
                            @endif

                        </div>
                        <div class="top-post-details">

                            @if (!empty($topSelectedPost[1]->category->name))
                                <ul class="tags">
                                    <li><a href="{{ route('home.category', $topSelectedPost[1]->category->id) }}">{{ $topSelectedPost[1]->category->name }}</a></li>
                                </ul>
                            @endif

                            @if (!empty($topSelectedPost[1]->title))
                                <a href="{{ route('home.show-post', $topSelectedPost[1]->id) }}">
                                    <h4>{{ $topSelectedPost[1]->title }}</h4>
                                </a>
                            @endif

                            <ul class="meta">
                                <li><a href="#"><span class="lnr lnr-user"></span> {{ $topSelectedPost[1]->user->username }} </a></li>
                                <li><a href="#">{{ jdate($topSelectedPost[1]->created_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#"> {{ $topSelectedPost[1]->comments->count() }} <span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                @endif


                @if (!empty($topSelectedPost[2]))
                    <div class="single-top-post mt-10">
                        <div class="feature-image-thumb relative">
                            <div class="overlay overlay-bg"></div>

                            @if (!empty($topSelectedPost[2]->image['indexArray']['small']))
                                <img class="img-fluid" src="{{ asset($topSelectedPost[2]->image['indexArray']['small'] )}}">
                            @endif

                        </div>

                        <div class="top-post-details">

                            @if (!empty($topSelectedPost[2]->category->name))
                                <ul class="tags">
                                    <li><a href="{{ route('home.category', $topSelectedPost[2]->category->id) }}">{{ $topSelectedPost[2]->category->name }}</a></li>
                                </ul>
                            @endif

                            @if (!empty($topSelectedPost[2]->title))
                                <a href="{{ route('home.show-post', $topSelectedPost[2]->id) }}">
                                    <h4>{{ $topSelectedPost[2]->title }}</h4>
                                </a>
                            @endif


                            <ul class="meta">
                                <li><a href="#"><span class="lnr lnr-user"></span> {{ $topSelectedPost[2]->user->username }} </a></li>
                                <li><a href="#">{{ jdate($topSelectedPost[2]->created_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#"> {{ $topSelectedPost[2]->comments->count() }} <span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                @endif


            </div>



            @if (!empty($breakingNews[0]->title))
                <div class="col-lg-12">
                    <div class="news-tracker-wrap">
                        <h6><span>خبر فوری:</span> <a href="{{ route('home.show-post', $breakingNews[0]->id) }}">{{ $breakingNews[0]->title }}</a></h6>
                    </div>
                </div>
            @endif


        </div>
    </div>
</section>


<!-- End top-post Area -->
<!-- Start latest-post Area -->


<section class="latest-post-area pb-120">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-8 post-list">

                @if (!empty($latestNews))
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">آخرین اخبار</h4>

                        @foreach ($latestNews as $latestNew)
                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>

                                    @if (!empty($latestNew->image))
                                        <img class="img-fluid" src="{{ asset($latestNew->image['indexArray']['medium'] )}}">
                                    @endif

                                </div>

                                @if (!empty($latestNew->category->name))
                                    <ul class="tags">
                                        <li><a href="{{ route('home.category', $latestNew->category->id) }}">{{ $latestNew->category->name }}</a></li>
                                    </ul>
                                @endif

                            </div>
                            <div class="col-lg-7 post-right">

                                @if (!empty($latestNew->title))
                                    <a href="{{ route('home.show-post', $latestNew->id) }}">
                                        <h4>{{ $latestNew->title }}</h4>
                                    </a>
                                @endif

                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span> {{ $latestNew->user->username }}</a></li>
                                    <li><a href="#">{{ jdate($latestNew->created_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#"> {{ $latestNew->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                                <p class="excert">
                                {!! $latestNew->summary !!}
                                </p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                @endif



                @if (!empty($banners[0]->image))
                    <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                        <img class="img-fluid" src="{{ asset($banners[0]->image['indexArray']['banner1']) }}">
                    </div>
                @endif






                <!-- Start popular-post Area -->
                <div class="popular-post-wrap">
                    <h4 class="title">اخبار پربازدید</h4>

                    @if (!empty($popular))
                        <div class="feature-post relative">
                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>

                                @if (!empty($popular[0]->image))
                                    <img class="img-fluid" src="{{ asset($popular[0]->image['indexArray']['small'] )}}">
                                @endif

                            </div>

                            <div class="details">
                                @if (!empty($popular[0]->category->name))
                                    <ul class="tags">
                                        <li><a href="{{ route('home.category', $popular[0]->category->id) }}">{{ $popular[0]->category->name }}</a></li>
                                    </ul>
                                @endif

                                @if (!empty($popular[0]->title))
                                <a href="{{ route('home.show-post', $popular[0]->id) }}">
                                    <h3>{{ $popular[0]->title }}</h3>
                                </a>
                                @endif

                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span> {{ $popular[0]->user->username }}</a></li>
                                    <li><a href="#"> {{ jdate($popular[0]->published_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#"> {{ $popular[0]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                            </div>
                        </div>



                    <div class="row mt-20 medium-gutters">
                        @if (!empty($popular[1]))
                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>

                                        @if (!empty($popular[1]->image))
                                            <img class="img-fluid" src="{{ asset($popular[1]->image['indexArray']['medium'] )}}">
                                        @endif

                                    </div>

                                    @if (!empty($popular[1]->category->name))
                                        <ul class="tags">
                                            <li><a href="{{ route('home.category', $popular[1]->category->id) }}">{{ $popular[1]->category->name }}</a></li>
                                        </ul>
                                    @endif

                                </div>


                                <div class="details">

                                    @if (!empty($popular[1]->title))
                                        <a href="{{ route('home.show-post', $popular[1]->id) }}">
                                            <h4>{{ $popular[1]->title }}</h4>
                                        </a>
                                    @endif

                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span> {{ $popular[1]->user->username }}</a></li>
                                        <li><a href="#"> {{ jdate($popular[1]->created_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"> {{ $popular[1]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                    <p class="excert">
                                        {!! $popular[1]->summary !!}
                                    </p>
                                </div>


                            </div>
                        @endif


                        @if (!empty($popular[2]))
                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>

                                        @if (!empty($popular[2]->image))
                                        <img class="img-fluid" src="{{ asset($popular[2]->image['indexArray']['medium'] )}}">
                                        @endif

                                    </div>

                                    @if (!empty($popular[1]->category->name ))
                                        <ul class="tags">
                                            <li><a href="{{ route('home.category', $popular[2]->category->id) }}">{{ $popular[2]->category->name }}</a></li>
                                        </ul>
                                    @endif

                                </div>
                                <div class="details">

                                    @if (!empty($popular[2]->title ))
                                        <a href="{{ route('home.show-post', $popular[2]->id) }}">
                                            <h4>{{ $popular[2]->title }}</h4>
                                        </a>
                                    @endif

                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>{{ $popular[2]->user->username }}</a></li>
                                        <li><a href="#"> {{ jdate($popular[2]->created_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"> {{ $popular[2]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                    <p class="excert">
                                        {!! $popular[2]->summary !!}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                @endif

            </div>






@endsection
