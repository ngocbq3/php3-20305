@extends('admin.layouts.layout')

@section('title', 'Danh sách bài viết')

@section('content')
    <div class="main">

        <!-- Header -->
        <header class="header">
            <h1>Danh sách bài viết</h1>
            <button class="btn-add">+ Thêm mới</button>
        </header>

        <!-- Table -->
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Hình</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Lượt xem</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                <img src="{{ Storage::URL($post->image) }}" width="100" alt="">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td> {{ $post->category->name }} </td>
                            <td> {{ $post->view }} </td>
                            <td> {{ $post->created_at->format('d/m/Y') }} </td>
                            <td>
                                <button class="btn edit">Sửa</button>
                                <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete"
                                        onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $posts->links() }}
        </div>

    </div>
@endsection
