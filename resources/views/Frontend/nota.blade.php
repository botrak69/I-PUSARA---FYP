@extends('Frontend.layout')

@section('title', 'Nota dan Panduan - I-PUSARA')

@section('content')
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <section class="mb-5">
                <h2 class="text-center mb-4">NOTA DAN PANDUAN</h2>
                <div class="text-center">
                    <img src="{{ asset('picture/CARTA ALIR PENGURUSAN JENAZAH TANAH PERKUBURAN ISLAM BAKO.drawio.png') }}" 
                         alt="Carta alir proses pengebumian" 
                         class="img-fluid border shadow rounded">
                </div>
                <p class="text-center mt-3 text-muted">Langkah-langkah proses permohonan pengebumian</p>
            </section>

            <section class="mb-5 p-4 bg-light rounded">
                <h3 class="text-center mb-3">PAKEJ PENGEBUMIAN</h3>
                <div class="text-center">
                    <p class="fs-5">RM 720 termasuk:</p>
                    <ul class="list-unstyled">
                        <li>Penyediaan liang lahad</li>
                        <li>Papan lapis</li>
                        <li>Napor</li>
                        <li>Nisan</li>
                    </ul>
                </div>
            </section>

            <section>
                <h3 class="text-center mb-4">PERKHIDMATAN VAN</h3>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Van Jenazah Yayasan Haji Suadi & Hajah Halimah</h5>
                                <p class="card-text">
                                    Masjid Imaduddin Bako Indah<br>
                                    Khas untuk Zon Bako (PERCUMA)<br>
                                    <strong>Kontak:</strong> Bahawi @ Suut Majali (+6012-8807441)
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Van Jenazah AMAL Kuching</h5>
                                <p class="card-text">
                                    (PERCUMA)<br>
                                    <strong>Kontak:</strong> Mahadir (+6019-8557806)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3">Waris boleh berurusan sendiri dengan mana-mana pertubuhan</p>
            </section>
        </div>
    </div>
</main>
@endsection
