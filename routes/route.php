<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Clients\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//Route admin
Route::middleware(['auth', CheckRole::class])->prefix('admin')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('admin.posts.index');

        Route::delete('/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');

        //Thêm mới
        Route::get('/create', [AdminPostController::class, 'create'])->name('admin.posts.create'); //Form thêm
        Route::post('/create', [AdminPostController::class, 'store'])->name('admin.posts.store'); //Lưu thêm vào CSDL

        //Cập nhật
        Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/edit/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    });
});
