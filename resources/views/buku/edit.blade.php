@extends('buku.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Edit Data Buku</h2>
                <a class="btn btn-primary" href="{{ route('buku.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terjadi kesalahan pada input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.update',$buku->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-md-6 mb-3">
                <label for="judul" class="form-label"><strong>Judul:</strong></label>
                <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control" placeholder="Judul Buku">
            </div>
            <div class="col-md-6 mb-3">
                <label for="pengarang" class="form-label"><strong>Pengarang:</strong></label>
                <input type="text" name="pengarang" value="{{ $buku->pengarang }}" class="form-control" placeholder="Nama Pengarang">
            </div>
            <div class="col-md-4 mb-3">
                <label for="tahun_terbit" class="form-label"><strong>Tahun Terbit:</strong></label>
                <input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" class="form-control" placeholder="Tahun">
            </div>
            <div class="col-md-4 mb-3">
                <label for="stok" class="form-label"><strong>Stok:</strong></label>
                <input type="number" name="stok" value="{{ $buku->stok }}" class="form-control" placeholder="Jumlah Stok">
            </div>
            <div class="col-md-4 mb-3">
                <label for="kategori" class="form-label"><strong>Kategori:</strong></label>
                <input type="text" name="kategori" value="{{ $buku->kategori }}" class="form-control" placeholder="Kategori Buku">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </div>
    </form>
@endsection