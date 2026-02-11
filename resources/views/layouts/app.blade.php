<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penjualan</title>

    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
</head>
<body class="bg-light">

    <header class="container py-3">
        <h2 class="mb-0">Penjualan</h2>
        <hr>
        <nav class="d-flex gap-2">
            <a href="{{ route('barang.index') }}" class="btn btn-outline-primary btn-sm">Barang</a>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-primary btn-sm">Pelanggan</a>
            <a href="{{ route('penjualan.index') }}" class="btn btn-outline-primary btn-sm">Penjualan</a>
        </nav>
    </header>

    <main class="container pb-4">
        @yield('content')
    </main>

    <footer class="container py-3">
        <hr>
    </footer>

    <script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
