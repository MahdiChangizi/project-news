<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Http\Requests\Admin\Post\PostUpdateRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at' , 'desc')->simplePaginate(15);
        return view('admin.posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request , ImageService $imageService)
    {
        $inputs = $request->all();

        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        // save image in public
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'posts');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.post.index')->with('toast-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }


        // set user_id
        // $inputs['user_id'] = 1;
        $inputs['user_id'] = Auth::user()->id;

        // create
        $posts = Post::create($inputs);
        return to_route('admin.post.index')->with('toast-success' , 'پست شما با موفقیت اضافه شد');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.posts.show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit' , compact('post' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, ImageService $imageService , Post $post)
    {
        $inputs = $request->all();

        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        // save image in public
        if ($request->hasFile('image')) {
            if (!empty($post->image)) {
                $imageService->deleteDirectoryAndFiles($post->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'posts');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return to_route('admin.post.index')->with('toast-alert', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else
        {
            if (isset($inputs['currentImage']) && !empty($post->image)) {
                $image = $post->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }


        // set user_id
        $inputs['user_id'] = auth()->user()->id;

        // create
        $post->update($inputs);
        return to_route('admin.post.index')->with('toast-success' , 'پست شما با موفقیت اضافه شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.post.index');
    }

    public function breakingNews(Post $post)
    {
        if($post['breaking_news'] == 1)
        {
            $post['breaking_news'] = 0;
            $post->save();
            return  to_route('admin.post.index')->with('toast-success' , "وضعیت 'خبر فوری' شما با موفقیت تغییر کرد");
        }
        elseif($post['breaking_news'] == 0){
            $post['breaking_news'] = 1;
            $post->save();
            return  to_route('admin.post.index')->with('toast-success' , "وضعیت 'خبر فوری' شما با موفقیت تغییر کرد");
        }
    }

    public function selected(Post $post)
    {
        if($post['selected'] == 1)
        {
            $post['selected'] = 0;
            $post->save();
            return  to_route('admin.post.index')->with('toast-success' , "وضعیت  'انتخاب شد'  شما با موفقیت تغییر کرد");
        }
        elseif($post['selected'] == 0){
            $post['selected'] = 1;
            $post->save();
            return  to_route('admin.post.index')->with('toast-success' , "وضعیت  'انتخاب شد'  شما با موفقیت تغییر کرد");
        }
    }


}
