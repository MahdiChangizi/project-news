@extends('home.layouts.master')

@section('content')




            <div class="col-lg-12 top-post-left">
                <section class="top-post-area pt-10">
                    <div class="container no-padding">
                        <div class="row">
                            <div class="col-lg-12">

                                @if (!empty($category->name ))
                                    <div class="hero-nav-area">
                                        <h1 class="text-white">اخبار دسته بندی {{ $category->name }}</h1>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </section>
            </div>




            <div class="col-lg-12">

                @if (!empty($breakingNews[0]->title ))
                    <div class="news-tracker-wrap">
                        <h6><span>خبر فوری:</span> <a href="{{ route('home.show-post', $breakingNews[0]->id) }}">{{ $breakingNews[0]->title }}</a></h6>
                    </div>
                @endif

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


                    @if (!empty($categories))

                    @foreach ($categories as $category)
                    <div class="single-latest-post row align-items-center">
                        <div class="col-lg-5 post-left">
                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>

                                @if (!empty($category->image))
                                    <img class="img-fluid" src="{{ asset($category->image['indexArray']['medium'] )}}">
                                @endif

                            </div>

                            @if (!empty($category->category->name))
                                <ul class="tags">
                                    <li><a href="#">{{ $category->category->name }}</a></li>
                                </ul>
                            @endif

                        </div>
                        <div class="col-lg-7 post-right">

                            @if (!empty($category->title))
                                <a href="{{ route('home.show-post', $category->id) }}">
                                    <h4>{{ $category->title }}</h4>
                                </a>
                            @endif

                            <ul class="meta">
                                <li><a href="#"><span class="lnr lnr-user"></span> {{ $category->user->username }}</a></li>
                                <li><a href="#">{{ jdate($category->created_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#"> {{ $category->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                            <p class="excert">
                                {{ wordwrap($category->summary, 20, "\n", true) }}
                            </p>
                        </div>
                    </div>
                    @endforeach

                    @endif


                </div>

                @if (!empty($categories))
                    <div class="mt-3">
                        {{ $categories->links('pagination::simple-bootstrap-5') }}
                    </div>
                @endif

            </div>





@endsection
