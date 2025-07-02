{{-- resources/views/admin/users/create.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Admin Baru</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; }
        .container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 400px; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: .5rem; }
        input { width: 100%; padding: .5rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .btn { display: block; width: 100%; padding: .75rem; border: none; background-color: #ffc107; color: black; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Admin Baru</h1>

        {{-- DIUBAH: Action form mengarah ke route 'admins.store' --}}
        <form action="{{ route('admins.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            {{-- DIUBAH: Teks tombol disesuaikan --}}
            <button type="submit" class="btn">Simpan Admin</button>
        </form>
    </div>
</body>
</html>