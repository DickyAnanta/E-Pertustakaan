<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; }
        .logout-btn { background: #dc3545; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Selamat Datang di Dashboard Admin!</h1>
    
    {{-- Mengambil nama admin yang sedang login --}}
    <p>Halo, <strong>{{ Auth::guard('admin')->user()->name }}</strong>.</p>
    <p>Anda telah berhasil login.</p>

    <hr>
    <a href="{{ route('users.index') }}" style="background: #17a2b8; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; margin-right: 10px;">Kelola User</a>

    {{-- TAMBAHKAN LINK INI --}}
    <a href="{{ route('admins.index') }}" style="background: #ffc107; color: black; padding: 10px 15px; text-decoration: none; border-radius: 4px;">Kelola Admin</a>
    <br><br>

    <form action="{{ route('admin.logout') }}" method="POST">
    
    <br><br>
    
    {{-- Form untuk logout --}}
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</body>
</html>