<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>

<body>

    <div class="admin">

        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Admin</h2>
            <ul>
                <li class="active">Bài viết</li>
                <li>Danh mục</li>
                <li>Người dùng</li>
            </ul>
        </aside>

        <!-- Main content -->
        @yield('content')

    </div>

</body>

</html>
