<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Banners\BannerController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Comments\CommentController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Menus\MenuController;
use App\Http\Controllers\Admin\Posts\PostController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Users\UserController;


Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {

    // Dashboard
    Route::get('/index', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::middleware(['admin'])->group(function () {

        // category
        Route::prefix('category')->namespace('Category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::put('/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        });

        // post
        Route::prefix('post')->namespace('Post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
            Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
            Route::post('/store', [PostController::class, 'store'])->name('admin.post.store');
            Route::get('/edit/{post}', [PostController::class, 'edit'])->name('admin.post.edit');
            Route::put('/update/{post}', [PostController::class, 'update'])->name('admin.post.update');
            Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('admin.post.destroy');
            Route::get('/change-breaking-news/{post}', [PostController::class, 'breakingNews'])->name('admin.post.breaking-news');
            Route::get('/change-selected/{post}', [PostController::class, 'selected'])->name('admin.post.selected');
        });

        // Banner
        Route::prefix('banner')->namespace('Banner')->group(function () {
            Route::get('/', [BannerController::class, 'index'])->name('admin.banner.index');
            Route::get('/create', [BannerController::class, 'create'])->name('admin.banner.create');
            Route::post('/store', [BannerController::class, 'store'])->name('admin.banner.store');
            // Route::get('/show/{category}', [BannerController::class , 'show'])->name('admin.banner.show');
            Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('admin.banner.edit');
            Route::put('/update', [BannerController::class, 'update'])->name('admin.banner.update');
            Route::delete('/destroy/{banner}', [BannerController::class, 'destroy'])->name('admin.banner.destroy');
        });

        // Comment
        Route::prefix('comment')->namespace('Comment')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('admin.comment.index');
            Route::get('/create', [CommentController::class, 'create'])->name('admin.comment.create');
            Route::post('/store/{post}', [CommentController::class, 'store'])->name('admin.comment.store');

            Route::delete('/destroy/{comment}', [CommentController::class, 'destroy'])->name('admin.comment.destroy');

            Route::get('/status/{comment}', [CommentController::class, 'status'])->name('admin.comment.status');
        });

        // Menu
        Route::prefix('menu')->namespace('Menu')->group(function () {
            Route::get('/', [MenuController::class, 'index'])->name('admin.menu.index');
            Route::get('/create', [MenuController::class, 'create'])->name('admin.menu.create');
            Route::post('/store', [MenuController::class, 'store'])->name('admin.menu.store');
            Route::get('/edit/{menu}', [MenuController::class, 'edit'])->name('admin.menu.edit');
            Route::put('/update/{menu}', [MenuController::class, 'update'])->name('admin.menu.update');
            Route::delete('/destroy/{menu}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');
        });

        // User
        Route::prefix('user')->namespace('User')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
            Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
            // Route::get('/show/{user}', [UserController::class , 'show'])->name('admin.user.show');
            Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
            Route::put('/update/{user}', [UserController::class, 'update'])->name('admin.user.update');
            Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');

            Route::get('/change/{user}', [UserController::class, 'change'])->name('admin.user.change');
        });

        // Setting
        Route::prefix('setting')->namespace('Setting')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
            Route::get('/edit/{setting}', [SettingController::class, 'edit'])->name('admin.setting.edit');
            Route::put('/update/{setting}', [SettingController::class, 'update'])->name('admin.setting.update');
        });
    });
});