@extends('Frontend.layout')

@section('title', 'Utama')

@section('content')
<!-- Hero Section -->
<div class="hero">
  <div class="hero-overlay">
    <h1 class="display-5 fw-bold">SELAMAT DATANG KE I-PUSARA (TPIB)</h1>
    <p class="lead">Platform komuniti untuk pengurusan dan bantuan pengebumian</p>

    <!-- Search Box -->
    <form action="{{ route('map') }}" method="GET" class="search-box">
      <div class="input-group input-group-lg">
        <input type="text" class="form-control" name="search" placeholder="Carian nama atau identiti..." required>
        <button class="btn btn-primary" type="submit">CARI</button>
      </div>
    </form>
  </div>
</div>

<!-- Content after hero -->
<div class="row g-4 mt-4">
  <div class="col-lg-4">
    <div class="card shadow">
      <div class="card-body text-center">
        <h5 class="card-title">Mengenai Kami</h5>
        <p class="card-text">Ketahui lebih lanjut mengenai pengurusan pengebumian TPIB.</p>
        <a href="{{ route('mengenai') }}" class="btn btn-primary">Lihat</a>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card shadow">
      <div class="card-body text-center">
        <h5 class="card-title">Nota & Panduan</h5>
        <p class="card-text">Akses panduan dan dokumen berkaitan pengebumian.</p>
        <a href="{{ route('nota') }}" class="btn btn-primary">Lihat</a>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card shadow">
      <div class="card-body text-center">
        <h5 class="card-title">Lokasi Pusara</h5>
        <p class="card-text">Cari lokasi pusara dan maklumat berkaitan.</p>
        <a href="{{ route('lokasi') }}" class="btn btn-primary">Lihat</a>
      </div>
    </div>
  </div>
</div>
@endsection
