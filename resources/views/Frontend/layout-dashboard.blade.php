<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I-PUSARA - @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            font-size: 14px;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: white;
        }
        .navbar-dark .navbar-nav .nav-link:hover {
            color: #cccccc;
        }
        .navbar-brand {
            font-weight: bold;
        }
        table {
            font-size: 13px;
        }
        th, td {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>

<!-- ✅ Navbar Same as layout.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
            <img src="{{ asset('picture/Logo JAIS Official PNG.PNG') }}" alt="I-PUSARA Logo" width="40">
            <img src="{{ asset('picture/lembaga.png') }}" alt="Lembaga Amanah Masjid Kg Bako Logo" width="40">
            <span class="ms-2">I-PUSARA (TPIB)</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.create') }}">Add New</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('approval') }}">Approval</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="return confirm('Log keluar daripada sistem?')">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ✅ Main Content -->
<main class="container-fluid my-4">
    @yield('content')
</main>

<!-- ✅ Footer -->
<footer class="bg-dark text-white text-center py-2">
    <small>&copy; 2025 I-PUSARA (TPIB). All rights reserved.</small>
</footer>

<!-- ✅ JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@yield('scripts')

</body>
</html>
