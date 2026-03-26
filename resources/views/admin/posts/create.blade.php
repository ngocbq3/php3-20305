@extends('admin.layouts.layout')

@section('title', 'Thêm mới bài viết')

@section('content')
    <main>
        <div class="form-wrapper">

            <h2>Thêm bài viết</h2>

            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tiêu đề -->
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" name="title" placeholder="Nhập tiêu đề">
                </div>

                <!-- Danh mục -->
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="category_id">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach ($categories as $cate)
                            <option value="{{ $cate->id }}">
                                {{ $cate->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Hình ảnh -->
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="image">
                </div>

                <!-- Mô tả -->
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" rows="3" placeholder="Mô tả ngắn"></textarea>
                </div>

                <!-- Nội dung -->
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="content" rows="6" placeholder="Nội dung chi tiết"></textarea>
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
