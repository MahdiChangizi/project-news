@extends('home.layouts.master')

@section('content')




            <div class="col-lg-12 top-post-left">
                <section class="top-post-area pt-10">
                    <div class="container no-padding">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hero-nav-area">
                                    <h1 class="text-white">اخبار دسته بندی {{ $category->name }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>




            <div class="col-lg-12">
                <div class="news-tracker-wrap">
                    <h6><span>خبر فوری:</span> <a href="{{ route('home.show-post', $breakingNews[0]->id) }}">{{ $breakingNews[0]->title }}</a></h6>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- End top-post Area -->
<!-- Start latest-post Area -->


<section class="latest-post-area pb-120">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-8 post-list">



                <!-- Start latest-post Area -->
                <div class="latest-post-wrap">
                    <h4 class="cat-title">آخرین اخبار</h4>

                    @foreach ($categories as $category)
                    <div class="single-latest-post row align-items-center">
                        <div class="col-lg-5 post-left">
                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset($category->image['indexArray']['medium'] )}}" alt="">
                            </div>
                            <ul class="tags">
                                <li><a href="#">{{ $category->category->name }}</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-7 post-right">
                            <a href="{{ route('home.show-post', $category->id) }}">
                                <h4>{{ $category->title }}</h4>
                            </a>
                            <ul class="meta">
                                <li><a href="#"><span class="lnr lnr-user"></span> {{ $category->user->username }}</a></li>
                                <li><a href="#">{{ jdate($category->created_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#"> {{ $category->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                            <p class="excert">
                            {!! $category->summary !!}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                    <div class="mt-3">
                        {{ $categories->links() }}
                    </div>

            </div>





@endsection
