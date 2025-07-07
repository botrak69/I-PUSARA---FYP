<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>I-PUSARA - @yield('title')</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('css/GPT.css') }}" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('utama') }}">
      <img src="{{ asset('picture/Logo JAIS Official PNG.PNG') }}" alt="I-PUSARA Logo" width="40">
      <img src="{{ asset('picture/lembaga.png') }}" alt="Lembaga Amanah Masjid Kg Bako Logo" width="40">
      <span class="ms-2">I-PUSARA (TPIB)</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('utama') }}">UTAMA</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            PENGENALAN
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('mengenai') }}">MENGENAI KAMI</a></li>
            <li><a class="dropdown-item" href="{{ route('berita') }}">BERITA TPIB</a></li>
            <li><a class="dropdown-item" href="{{ route('borang') }}">BORANG PERMOHONAN</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('nota') }}">NOTA DAN PANDUAN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('lokasi') }}">LOKASI</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('hubungi') }}">HUBUNGI KAMI</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('profil') }}">PROFIL</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<main class="container my-5">
  @yield('content')
</main>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <div class="container">
    <small>&copy; 2025 I-PUSARA (TPIB). All rights reserved.</small>
  </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Page-specific scripts -->
@yield('scripts')

</body>
</html>
