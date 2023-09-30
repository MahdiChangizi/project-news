<?php


use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/

// Home page
Route::prefix('')->namespace('Home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/show-post/{post}', [HomeController::class, 'show'])->name('home.show-post');
    Route::get('/category/{category}', [HomeController::class, 'category'])->name('home.category');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';