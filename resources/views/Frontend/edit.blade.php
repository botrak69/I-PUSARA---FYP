@extends('Frontend.layout-dashboard')

@section('title', 'Edit Rekod')

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <b>I-PUSARA</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTop">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTop">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.create') }}">Add New</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Edit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="return confirm('Log Keluar?')">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endsection

@section('content')
<style>
body {
    font-family: 'Times New Roman', Times, serif;
    font-size: 11pt;
}

label {
    font-weight: 600;
}

input, select, textarea {
    font-size: 11pt !important;
}

.card {
    border: 1px solid #ddd;
}
</style>

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Kemaskini Rekod</h5>
    </div>
    <div class="card-body">

        @if(!isset($data[$id]))
            <div class="alert alert-danger">
                Rekod tidak dijumpai.
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
        @else

        <form action="{{ route('dashboard.update', $id) }}" method="POST">
            @csrf
            <div class="row g-3">
                <!-- Left column -->
                <div class="col-md-6">
                    <label>Nama Si Mati</label>
                    <input type="text" name="NamaSiMati" class="form-control" required value="{{ $data[$id]['NamaSiMati'] ?? '' }}">

                    <label class="mt-2">No KP</label>
                    <input type="text" name="NoKP" class="form-control" value="{{ $data[$id]['NoKP'] ?? '' }}">

                    <label class="mt-2">Kampung</label>
                    <input type="text" name="Kampung" class="form-control" value="{{ $data[$id]['Kampung'] ?? '' }}">

                    <label class="mt-2">Umur</label>
                    <input type="number" name="Umur" class="form-control" value="{{ $data[$id]['Umur'] ?? '' }}">

                    <label class="mt-2">Jantina</label>
                    <select name="Jantina" class="form-select">
                        <option value="LELAKI" {{ ($data[$id]['Jantina'] ?? '') == 'LELAKI' ? 'selected' : '' }}>LELAKI</option>
                        <option value="PEREMPUAN" {{ ($data[$id]['Jantina'] ?? '') == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                    </select>

                    <label class="mt-2">Nama Bapa</label>
                    <input type="text" name="NamaBapa" class="form-control" value="{{ $data[$id]['NamaBapa'] ?? '' }}">

                    <label class="mt-2">Nama Emak</label>
                    <input type="text" name="NamaEmak" class="form-control" value="{{ $data[$id]['NamaEmak'] ?? '' }}">
                </div>

                <!-- Right column -->
                <div class="col-md-6">
                    <label>Tarikh Hijrah</label>
                    <input type="text" name="TarikhHijrah" class="form-control" value="{{ $data[$id]['TarikhHijrah'] ?? '' }}" placeholder="contoh: 8 JAMADIL AKHIR 1443">

                    <label class="mt-2">Tarikh Masihi</label>
                    <input type="date" name="TarikhMasihi" class="form-control" value="{{ $data[$id]['TarikhMasihi'] ?? '' }}">

                    <label class="mt-2">Masa Pengebumian</label>
                    <input type="text" name="MasaPengebumian" class="form-control" value="{{ $data[$id]['MasaPengebumian'] ?? '' }}" placeholder="contoh: 11.00 AM">

                    <label class="mt-2">Sebab Kematian</label>
                    <input type="text" name="SebabKematian" class="form-control" value="{{ $data[$id]['SebabKematian'] ?? '' }}">

                    <label class="mt-2">Nama Waris</label>
                    <input type="text" name="NamaWaris" class="form-control" value="{{ $data[$id]['NamaWaris'] ?? '' }}">

                    <label class="mt-2">No Tel Waris</label>
                    <input type="text" name="NoTelWaris" class="form-control" value="{{ $data[$id]['NoTelWaris'] ?? '' }}">

                    <label class="mt-2">Hubungan Waris</label>
                    <input type="text" name="HubunganWaris" class="form-control" value="{{ $data[$id]['HubunganWaris'] ?? '' }}">

                    <label class="mt-2">No Plot</label>
                    <input type="text" name="NoPlot" class="form-control" value="{{ $data[$id]['NoPlot'] ?? '' }}">
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Kemaskini Rekod</button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
        @endif
    </div>
</div>
@endsection
