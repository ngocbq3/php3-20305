<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Clients\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//Route admin
Route::prefix('admin')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('admin.posts.index');

        Route::delete('/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
    });
});
