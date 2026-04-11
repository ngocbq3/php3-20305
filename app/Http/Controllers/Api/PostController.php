<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestPost;
use App\Http\Requests\UpdateRequestPost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return response()->json([
            'message' => 'Danh sách bài viết',
            'data' => $posts
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestPost $request)
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
        return response()->json([
            'message' => 'Thêm bài viết thành công',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::query()->with('category')->find($id);
        if (!$post) {
            return response()->json([
                'message' => 'Bài viết không tồn tại'
            ], 404);
        }
        return response()->json([
            'message' => 'Chi tiết bài viết',
            'data' => $post
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestPost $request, string $id)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images');
        }
        $post = Post::query()->findOrFail($id);
        $post->update($data);
        return response()->json([
            'message' => 'Cập nhật bài viết thành công',
            'data' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
