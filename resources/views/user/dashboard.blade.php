<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; }
        .logout-btn { background: #dc3545; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Selamat Datang di Dashboard User!</h1>
    <p>Halo, <strong>{{ Auth::user()->name }}</strong>.</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</body>
</html>