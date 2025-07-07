@extends('Frontend.layout')

@section('title', 'Buletin - I-PUSARA')

@section('content')
<main class="container my-5">
    <h2 class="mb-4 text-center">Buletin Terkini</h2>

    <div class="accordion" id="buletinAccordion">

        <!-- Item 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    [12 Mei 2025] Gotong-Royong Tanah Perkuburan Kampung Baru
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#buletinAccordion">
                <div class="accordion-body">
                    Aktiviti gotong-royong dijalankan bagi membersihkan kawasan tanah perkuburan Islam Kampung Baru.
                    Seramai lebih 30 orang penduduk turut serta bagi memastikan kebersihan dan keceriaan kawasan tersebut.
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    [5 Mei 2025] Taklimat Pengurusan Jenazah oleh JAIS
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#buletinAccordion">
                <div class="accordion-body">
                    Jabatan Agama Islam Sarawak (JAIS) telah mengadakan sesi taklimat kepada komuniti setempat tentang
                    proses pengurusan jenazah mengikut garis panduan Islam.
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                    [28 April 2025] Pelancaran Laman Web Rasmi I-PUSARA
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#buletinAccordion">
                <div class="accordion-body">
                    Laman web rasmi I-PUSARA telah dilancarkan secara rasmi oleh YBhg. Datuk Pengerusi bagi memudahkan urusan
                    pengurusan pengebumian secara atas talian.
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
