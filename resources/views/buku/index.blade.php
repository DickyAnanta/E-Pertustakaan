@extends('buku.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Kelola Data Buku Perpustakaan</h2>
                {{-- Tombol ini mengarah ke halaman create.blade.php --}}
                <a class="btn btn-success" href="{{ route('buku.create') }}">
                    <i class="bi bi-plus-lg"></i> Tambah Buku Baru
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center" width="280px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                {{-- Loop untuk menampilkan semua data buku --}}
                @forelse ($buku as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td class="text-center">{{ $item->tahun_terbit }}</td>
                    <td class="text-center">{{ $item->stok }}</td>
                    <td class="text-center">
                        <form action="{{ route('buku.destroy', $item->id) }}" method="POST">
                            {{-- Tombol ini mengarah ke halaman show.blade.php --}}
                            <a class="btn btn-info btn-sm" href="{{ route('buku.show', $item->id) }}">Detail</a>

                            {{-- Tombol ini mengarah ke halaman edit.blade.php --}}
                            <a class="btn btn-primary btn-sm" href="{{ route('buku.edit', $item->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')
                            {{-- Tombol ini untuk menghapus data --}}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data buku belum tersedia.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{-- Menampilkan navigasi halaman --}}
            {!! $buku->links() !!}
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Menambahkan sedikit CSS untuk ikon (opsional) --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush