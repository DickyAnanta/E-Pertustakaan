{{-- resources/views/admin/users/index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Admin</title>
    <style> /* Anda bisa pakai CSS yang lebih baik */
        body { font-family: sans-serif; padding: 2rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { text-decoration: none; background: #ffc107; color: black; padding: 10px 15px; border-radius: 5px; }
        .success { padding: 1rem; margin-bottom: 1rem; background-color: #d4edda; color: #155724; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Daftar Admin</h1>
    <a href="{{ route('admin.dashboard') }}">Kembali ke Dashboard</a>
    <hr>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    {{-- DIUBAH: Mengarah ke rute untuk membuat admin --}}
    <a href="{{ route('admins.create') }}" class="btn" style="margin-bottom: 1rem; display: inline-block;">+ Tambah Admin Baru</a>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                {{-- Kolom Tanggal Dibuat dihapus karena tidak ada di tabel --}}
            </tr>
        </thead>
        <tbody>
            {{-- DIUBAH: Menggunakan variabel $admins --}}
            @forelse($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
            </tr>
            @empty
            <tr>
                {{-- DIUBAH: Teks disesuaikan --}}
                <td colspan="2">Tidak ada data admin.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>