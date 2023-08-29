<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topSelectedPost = Post::where('selected', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $breakingNews = Post::where('breaking_news', 1)->orderBy('created_at', 'desc')->limit(1)->get();
        $latestNews = Post::orderBy('created_at', 'desc')->limit(6)->get();
        $banners = Banner::orderBy('created_at', 'desc')->limit(2)->get();

        $categories = Category::where('created_at', '<', now())->get();

        $popular = Post::orderBy('view', 'desc')->limit(3)->get();

        $mostControversialPosts = Post::withCount('comments')->orderBy('comments_count', 'desc')->limit(20)->get();


        return view('home.index', compact( 'categories', 'latestNews', 'popular', 'topSelectedPost', 'breakingNews', 'banners', 'mostControversialPosts'));
    }


    public function show(Post $post)
    {
        $nextPost = Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
        $prevPost = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();

        return view('home.show-post', compact('post', 'nextPost', 'prevPost'));
    }


    public function category(Category $category)
    {
        $breakingNews = Post::where('breaking_news', 1)->orderBy('created_at', 'desc')->limit(1)->get();
        $categories = $category->posts()->simplePaginate(2);
        return view('home.category', compact('category', 'breakingNews', 'categories'));
    }

}
