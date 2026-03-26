<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //Lấy danh sách, phân trang 10 bài/ 1 trang
        $posts = Post::with('category')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    //Xóa dữ liệu
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->back()->with('success', 'Xóa dữ liệu thành công');
    }
}
