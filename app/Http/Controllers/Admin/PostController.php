<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

    //Form thêm
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }
    //Lưu dữ liệu vào Database
    public function store(Request $request)
    {
        $data = $request->except('image'); //loại trừ hình ảnh

        $data['view'] = 0;
        $data['image'] = ''; //Khi chưa có ảnh
        if ($request->hasFile('image')) {
            //Lưu ảnh vào và lấy được dẫn ảnh
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        //Lưu dữ liệu vào CSDL
        Post::query()->create($data);
        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Thêm dữ liệu thành công');
    }
}
