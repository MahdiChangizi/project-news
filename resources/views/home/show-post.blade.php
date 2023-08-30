@extends('home.layouts.master')

@section('content')


<style>
.comment-box {
    background-color: #f8f8f8; /* یک رنگ خاکستری روشن برای پس زمینه */
    border: 1px solid #e5e5e5; /* رنگ مرز */
    padding: 15px; /* افزایش فاصله داخلی */
    margin: 15px 0; /* افزایش فاصله بین نظرات */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); /* افزودن سایه */
}
</style>


                <div class="col-lg-8 post-list mb-5">
                    <!-- Start single-post Area -->
                    <div class="single-post-wrap">
                        <div class="feature-img-thumb relative">
                            <div class="overlay overlay-bg"></div>

                            @if (!empty($post->image))
                                <img class="img-fluid" src="{{ asset($post->image['indexArray']['large'] )}}">
                            @endif

                        </div>
                        <div class="content-wrap">

                            @if (!empty($post->category->name))
                                <ul class="tags mt-10">
                                    <li><a href="{{ route('home.category', $post->category->id) }}"> {{ $post->category->name }}</a></li>
                                </ul>
                            @endif

                            @if (!empty($post->title))
                            <a href="#">
                                <h3> {{ $post->title }}</h3>
                            </a>
                            @endif

                            <ul class="meta pb-20">
                                <li><a href="#"><span class="lnr lnr-user"></span> {{ $post->user->username }}</a></li>
                                <li><a href="#"> {{ jdate($post->created_at) }}<span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#"> {{ $post->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                            </ul>

                            {!! $post->body !!}



                            <div class="navigation-wrap justify-content-between d-flex">
                                @if ($prevPost !== null)
                                <a class="prev" href="{{ route('home.show-post', $prevPost->id) }}"><span class="lnr lnr-arrow-right"></span>خبر بعدی</a>
                                @endif

                                @if ($nextPost !== null)
                                <a class="next" href="{{ route('home.show-post', $nextPost->id) }}">خبر قبلی<span class="lnr lnr-arrow-left"></span></a>
                                @endif
                            </div>



                            <div class="comment-sec-area">
                                <div class="container">
                                    <div class="row flex-column">
                                        <h6>نظرات</h6>

                                        @if ($post->comments->isEmpty())
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex comment-box">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="desc">
                                                        <p class="comment">
                                                            <span class="text-danger">نظری وجود ندارد</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @foreach ($post->comments()->where('status', 1)->get() as $comment)
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex comment-box">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="desc">
                                                        <h5><a href="#">{{ $comment->user->username }}</a></h5>
                                                        <p class="date mt-3">{{ jdate($comment->created_at) }}</p>
                                                        <p class="comment">
                                                            {{ $comment->comment }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach



                                    </div>
                                </div>
                            </div>



                        </div>


                        <div class="comment-form">
                            <h4>درج نظر جدید</h4>

                            <form action="{{ route('admin.comment.store', $post->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="comment" placeholder="متن نظر" onfocus="this.placeholder = ''" onblur="this.placeholder = 'متن نظر'" required=""></textarea>
                                </div>
                                <button type="submit" class="primary-btn text-uppercase">ارسال</button>
                            </form>

                        </div>
                    </div>
                    <!-- End single-post Area -->
                </div>


@endsection
