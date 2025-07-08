<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan</title>

    {{-- Memuat CSS dari Bootstrap via CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ route('buku.index') }}">
          <i class="bi bi-book-half"></i> E-Perpustakaan
        </a>
      </div>
    </nav>

    <main>
        {{-- Konten dari halaman lain (index, create, etc.) akan dimuat di sini --}}
        @yield('content')
    </main>

    {{-- Memuat Javascript dari Bootstrap via CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Slot untuk script tambahan dari halaman lain --}}
    @stack('scripts')
</body>
</html>