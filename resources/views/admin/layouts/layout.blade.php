<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>

<body>

    <div class="admin">

        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>
                {{ Auth::user()->name }}
            </h2>
            <ul>
                <li class="active">Bài viết</li>
                <li>Danh mục</li>
                <li>Người dùng</li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Main content -->
        @yield('content')

    </div>

</body>

</html>
