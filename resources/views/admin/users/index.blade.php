<!DOCTYPE html>
<html>
<head>
    <title>Kelola User</title>
    <style>body{font-family:sans-serif;padding:2rem}table{width:100%;border-collapse:collapse}th,td{border:1px solid #ddd;padding:8px;text-align:left}th{background-color:#f2f2f2}.btn{text-decoration:none;color:white;padding:5px 10px;border-radius:5px;display:inline-block;border:none;cursor:pointer}.btn-add{background:#007bff}.btn-edit{background:#ffc107;color:black}.btn-delete{background:#dc3545}.success{padding:1rem;margin-bottom:1rem;background-color:#d4edda;color:#155724;border-radius:5px}.error{padding:1rem;margin-bottom:1rem;background-color:#f8d7da;color:#721c24;border-radius:5px}</style>
</head>
<body>
    <h1>Daftar User</h1>
    <a href="{{ route('admin.dashboard') }}">Kembali ke Dashboard</a>
    <hr>
    
    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-add" style="margin-bottom: 1rem;">+ Tambah User Baru</a>
    
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Tidak ada data user.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>