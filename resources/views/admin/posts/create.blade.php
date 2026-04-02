@extends('admin.layouts.layout')

@section('title', 'Thêm mới bài viết')

@section('content')
    <main>
        <div class="form-wrapper">

            <h2>Thêm bài viết</h2>

            @if ($errors->any())
                <h2>Bạn cần nhập đúng dữ liệu</h2>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            @endif

            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tiêu đề -->
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Nhập tiêu đề">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Hình ảnh -->
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Mô tả -->
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" rows="3" placeholder="Mô tả ngắn">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nội dung -->
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="content" rows="6" placeholder="Nội dung chi tiết">{{ old('content') }}</textarea>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
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
