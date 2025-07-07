<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>body{font-family:sans-serif;display:flex;justify-content:center;align-items:center;height:100vh;background-color:#f4f4f4}.container{background:white;padding:2rem;border-radius:8px;box-shadow:0 4px 6px rgba(0,0,0,0.1);width:400px}.form-group{margin-bottom:1rem}label{display:block;margin-bottom:.5rem}input{width:100%;padding:.5rem;border:1px solid #ddd;border-radius:4px;box-sizing:border-box}.btn{display:block;width:100%;padding:.75rem;border:none;background-color:#007bff;color:white;border-radius:4px;cursor:pointer}</style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak ingin diubah">
            </div>
            <button type="submit" class="btn">Update User</button>
        </form>
    </div>
</body>
</html>