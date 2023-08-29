@extends('admin.layouts.master')

@section('head-tag')
    <title>Comments</title>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i>Comments</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="#" class="btn btn-sm btn-success disabled">create</a>
        </div>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of comments</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>user ID</th>
                    <th>post ID</th>
                    <th>comment</th>
                    <th>status</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($comments as $comment)
                <tr>
                    <td><a href="">1</a></td>
                    <td>{{ $comment->user->username }}</td>
                    <td>{{ $comment->post->title }}</td>
                    <td>{{ $comment->comment }}</td>
                    @if ($comment->status == 1)
                    <td>فعال</td>
                    @else
                    <td>غیر فعال</td>
                    @endif

                    <td>
                        @if($comment->status == 0)
                        <a class="btn btn-sm btn-success text-white" href="{{ route('admin.comment.status', $comment->id) }}">click to approved</a>
                        @else
                        <a class="btn btn-sm btn-warning text-white" href="{{ route('admin.comment.status', $comment->id) }}">click not to approved</a>
                        @endif

                        <form class="d-inline" action="{{ route('admin.comment.destroy', $comment->id) }}" method="post">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> Delete</button>
                        </form>

                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </section>
@endsection

@section('script')
@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
