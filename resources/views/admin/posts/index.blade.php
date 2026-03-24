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

                    <tr>
                        <td>#001</td>
                        <td>
                            <img src="https://via.placeholder.com/60" alt="">
                        </td>
                        <td>Bài viết Laravel</td>
                        <td>Công nghệ</td>
                        <td>1200</td>
                        <td>20/03/2026</td>
                        <td>
                            <button class="btn edit">Sửa</button>
                            <button class="btn delete">Xóa</button>
                        </td>
                    </tr>

                    <tr>
                        <td>#002</td>
                        <td>
                            <img src="https://via.placeholder.com/60" alt="">
                        </td>
                        <td>Học React Native</td>
                        <td>Lập trình</td>
                        <td>980</td>
                        <td>18/03/2026</td>
                        <td>
                            <button class="btn edit">Sửa</button>
                            <button class="btn delete">Xóa</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
@endsection
