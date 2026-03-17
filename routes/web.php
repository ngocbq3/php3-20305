<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/abc', function () {
    return "Trang web ABC";
});

Route::get('/users/{name}', function ($name) {
    return "Xin chào $name";
});

//Trường tham số có tồn tại hoặc không
Route::get('/comments/{user?}', function ($user = 'Test') {
    return "Comment của user: $user";
});

//Nhóm các đường dẫn có chung tiền tố
Route::prefix('admin')->group(function () {
    Route::get('/productsnlandflal0s0f0ss0fs0f0s', function () {
        return "Trang sản phẩm";
    })->name('products'); //Đặt tên cho đường dẫn
    Route::get('/users', function () {
        return "Trang người dùng";
    });
});

Route::get('/demo', function () {
    return view('demo.index');
});
