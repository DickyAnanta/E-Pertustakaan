<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard Admin!</h1>
    <p>Halo, <strong>{{ Auth::guard('admin')->user()->name }}</strong>.</p>
    <hr>
    <h3>Menu Manajemen</h3>
    <a href="{{ route('users.index') }}" class="btn btn-user">Kelola User</a>
    <a href="{{ route('admins.index') }}" class="btn btn-admin">Kelola Admin</a>
    <br><br><br>
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</body>
</html>