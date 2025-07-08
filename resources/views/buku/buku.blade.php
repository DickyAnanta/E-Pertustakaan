@extends('buku.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Kelola Buku</h2>
            <a class="btn btn-success" href="{{ route('buku.create') }}"> Tambah Buku Baru</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th width="280px">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($buku as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->judul }}</td>
        <td>{{ $item->pengarang }}</td>
        <td>{{ $item->tahun_terbit }}</td>
        <td>{{ $item->stok }}</td>
        <td>{{ $item->kategori }}</td>
        <td>
            <form action="{{ route('buku.destroy',$item->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('buku.show',$item->id) }}">Detail</a>
                <a class="btn btn-primary btn-sm" href="{{ route('buku.edit',$item->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

{!! $buku->links('pagination::bootstrap-5') !!}

@endsection