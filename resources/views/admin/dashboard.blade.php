<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>body{font-family:sans-serif;padding:2rem}.btn{text-decoration:none;color:white;padding:10px 15px;border-radius:4px;margin-right:10px}.btn-user{background:#17a2b8}.btn-admin{background:#ffc107;color:black}.logout-btn{background:#dc3545;color:white;padding:10px 15px;border:none;border-radius:4px;cursor:pointer}</style>
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