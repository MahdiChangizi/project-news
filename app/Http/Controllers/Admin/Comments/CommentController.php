<?php

namespace App\Http\Controllers\Admin\Comments;

use App\Http\Controllers\Controller;
use App\Models\Admin\Comment;
use App\Models\Admin\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index' , compact('comments'));
    }


    public function store(Post $post, Request $request)
    {
        $inputs = $request->validate([
            'comment' => ['required', 'min:3', 'max:500'],
        ]);

        $inputs['post_id'] = $post->id;
        $inputs['user_id'] = auth()->user()->id;

        $result = Comment::create($inputs);

        return back();
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }



    public function status(Comment $comment)
    {
        $comment->status = $comment->status == 1 ? 0 : 1 ;
        $comment->save();
        return back()->with('toast-success' , 'وضعیت با موفقیت تغییر کرد!');
    }


}
