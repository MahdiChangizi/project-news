@extends('admin.layouts.master')

@section('head-tag')
    <title>Articles</title>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Articles</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="{{ route('admin.post.create') }}" class="btn btn-sm btn-success">create</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of posts</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>summary</th>
                    <th>view</th>
                    <th>status</th>
                    <th>user Name</th>
                    <th>category Name</th>
                    <th>image</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $key => $post)
                    <tr>
                        <td>
                            <a class="text-primary" href="">
                                {{ $key + 1 }}
                            </a>
                        </td>
                        <td>
                            {{ $post->title }}
                        <td>
                            {{ Str::limit($post->summary, 20, '...') }}
                        </td>
                        <td>
                            {{ $post->view }}
                        </td>

                        <td>
                            @if ($post->breaking_news == 1)
                            <span class="badge badge-success">#breaking_news</span>
                            @endif
                            @if ($post->selected == 1)
                            <span class="badge badge-dark">#editor_selected</span>
                            @endif
                        </td>

                        <td>
                            {{ $post->user->username }}
                        </td>

                        <td>
                            {{ $post->category->name }}
                        </td>
                        <td>
                            @if (!empty($post->image))
                            <img style="width: 80px;" src="{{ asset($post->image['indexArray']['medium'] )}}" alt="{{ $post->id }}">
                            @else
                            <span class="text-danger">ندارد</span>
                            @endif
                        </td>

                        <td style="width: 25rem;">
                            <a role="button" class="btn btn-sm btn-warning text-dark" href="{{ route('admin.post.breaking-news', $post->id) }}">
                                @if ($post->breaking_news == 1)
                                remove breaking news
                                @else
                                add breaking news
                                @endif
                            </a>
                            <a role="button" class="btn btn-sm btn-warning text-dark" href="{{ route('admin.post.selected', $post->id) }}">
                                @if ($post->selected == 1)
                                remove selcted
                                @else
                                add selected
                                @endif
                            </a>
                            <hr class="my-1" />
                            <a role="button" class="btn btn-sm btn-primary text-white" href="{{ route('admin.post.edit' , $post->id) }}">edit</a>

                            <form class="d-inline" action="{{ route('admin.post.destroy' , $post->id) }}" method="post">
                                @csrf
                                @method('delete')
                            <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection

@section('script')
@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
