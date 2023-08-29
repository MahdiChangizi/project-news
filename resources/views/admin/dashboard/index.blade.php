@extends('admin.layouts.master')


@section('head-tag')
    <title>Dashboard</title>
@endsection

@section('content')
<div class="row mt-3">

    <div class="col-sm-6 col-lg-3">
        <a href="{{ route('admin.category.index') }}" class="text-decoration-none">
            <div class="card text-white bg-gradiant-green-blue mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fas fa-clipboard-list"></i>
                         Categories
                    </span>
                    <span class="badge badge-pill right">{{ $categories->count() }}</span></div>
                <div class="card-body">
                    <section class="font-12 my-0"><i class="fas fa-clipboard-list"></i> GO TO Categories!</section>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-lg-3">
        <a href="{{ route('admin.user.index') }}" class="text-decoration-none">
            <div class="card text-white bg-juicy-orange mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i
                            class="fas fa-users"></i> Users</span><span class="badge badge-pill right">{{ $NormalUser->count() }}</span></div>
                <div class="card-body">
                    <section class="d-flex justify-content-between align-items-center font-12">
                        <span class=""><i class="fas fa-users-cog"></i> Admin <span
                                class="badge badge-pill mx-1">{{ $userAdmin->count() }}</span></span>
                        <span class=""><i class="fas fa-user"></i> All Users <span
                                class="badge badge-pill mx-1">{{ $users->count() }}</span></span>
                    </section>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-lg-3">
        <a href="{{ route('admin.post.index') }}" class="text-decoration-none">
            <div class="card text-white bg-dracula mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i
                            class="fas fa-newspaper"></i> Article</span><span class="badge badge-pill right">{{ $posts->count() }}</span>
                </div>
                <div class="card-body">
                    <section class="d-flex justify-content-between align-items-center font-12">
                        <span class=""><i class="fas fa-bolt"></i> Views <span
                                class="badge badge-pill mx-1">{{ $views }}</span>
                        </span>
                    </section>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-lg-3">
        <a href="{{ route('admin.comment.index') }}" class="text-decoration-none">
            <div class="card text-white bg-neon-life mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i
                            class="fas fa-comments"></i> Comment</span><span class="badge badge-pill right">{{ $comment->count() }}</span>
                </div>
                <div class="card-body">
                    <!--                        <h5 class="card-title">Info card title</h5>-->
                    <section class="d-flex justify-content-between align-items-center font-12">
                        <span class=""><i class="far fa-eye-slash"></i> Unseen <span
                                class="badge badge-pill mx-1">{{ $unseen->count() }}</span></span>
                        <span class=""><i class="far fa-check-circle"></i> Approved <span class="badge badge-pill mx-1">{{ $seen->count() }}</span></span>
                    </section>
                </div>
            </div>
        </a>
    </div>

</div>


<div class="row mt-2">
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Most viewed posts
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($popularPosts as $popularPost)
                    <tr>
                        <td>{{ $popularPost->id }}</td>
                        <td>{{ $popularPost->title }}</td>
                        <td><span class="badge badge-secondary">{{ $popularPost->view }}</span></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Most commented posts

        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>comment</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($mostCommentedPosts as $mostCommentedPost)
                    <tr>
                        <td>{{ $mostCommentedPost->id }}</td>
                        <td>{{ $mostCommentedPost->title }}</td>
                        <td><span class="badge badge-secondary">{{ $mostCommentedPost->comments_count }}</span></td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Comments
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>username</th>
                        <th>comment</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->user->id }}</td>
                        <td>{{ $comment->user->username }}</td>
                        <td><span class="badge badge-secondary">{{ $comment->comment }}</span></td>
                        @if ($comment->status == 1)
                        <td><span class="badge badge-success">دیده شده</span></td>
                        @else
                        <td><span class="badge badge-danger">دیده نشده</span></td>
                        @endif
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
