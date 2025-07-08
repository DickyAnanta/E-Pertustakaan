@extends('buku.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2> Detail Buku</h2>
            <a class="btn btn-primary" href="{{ route('buku.index') }}"> Kembali</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Judul:</strong>
            {{ $buku->judul }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Pengarang:</strong>
            {{ $buku->pengarang }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Tahun Terbit:</strong>
            {{ $buku->tahun_terbit }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Stok:</strong>
            {{ $buku->stok }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Kategori:</strong>
            {{ $buku->kategori }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Tanggal Dibuat:</strong>
            {{ $buku->created_at->format('d/m/Y H:i') }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Terakhir Diperbarui:</strong>
            {{ $buku->updated_at->format('d/m/Y H:i') }}
        </div>
    </div>
</div>
@endsection