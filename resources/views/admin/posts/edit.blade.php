@extends('admin.layouts.layout')

@section('title', 'Cập nhật bài viết')

@section('content')
    <main>
        <div class="form-wrapper">

            <h2>Cập nhật bài viết</h2>

            @if ($errors->any())
                <h2>Bạn cần nhập đúng dữ liệu</h2>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            @endif

            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Tiêu đề -->
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" name="title" value="{{ $post->title }}" placeholder="Nhập tiêu đề">
                </div>

                <!-- Danh mục -->
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="category_id">

                        @foreach ($categories as $cate)
                            <option value="{{ $cate->id }}" @selected($cate->id === $post->category_id)>
                                {{ $cate->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Hình ảnh -->
                <div class="form-group">
                    <label>Hình ảnh</label> <br>
                    <img src="{{ Storage::URL($post->image) }}" width="100" alt="">
                    <input type="file" name="image">
                </div>

                <!-- Mô tả -->
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" rows="3" placeholder="Mô tả ngắn">{{ $post->description }}</textarea>
                </div>

                <!-- Nội dung -->
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="content" rows="6" placeholder="Nội dung chi tiết">{{ $post->content }}</textarea>
                </div>

                <!-- Button -->
                <div class="form-actions">
                    <button type="submit" class="btn-save">Lưu</button>
                    <button type="reset" class="btn-cancel">Hủy</button>
                </div>

            </form>

        </div>
    </main>
@endsection
