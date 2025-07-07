@extends('Frontend.layout')

@section('title', 'Hubungi Kami')

@section('content')
<!-- Hubungi Kami Section -->
<div class="container my-5">
    <h2>Hubungi Kami</h2>
    <div class="row">
        <div class="col-md-6">
            <h5>Alamat</h5>
            <p>
                Lembaga Amanah Masjid Kampung Bako <br />
                Lot 1568 Block 3 Muara Tebas Land District <br />
                Sungai Buda Off Jalan Bako <br />
                93050 Kuching, Sarawak
            </p>

            <h5>No Telefon</h5>
            <p>
                Encik Awg Majri Awg Rosli (+6014-2131287) <br />
                Encik Musa Hj Yusup (+6012-8008213) <br />
                Encik Zaidi Sabki (+6019-4860410) <br />
                Encik Rezuan Man (+6011-21895178)
            </p>

            <h5>Emel</h5>
            <p>ipusara@jais.gov.my</p>
        </div>
    </div>
</div>

<!-- Borang Maklum Balas -->
<div class="container my-5">
    <h2>Borang Maklum Balas</h2>
    <form>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Penuh</label>
            <input type="text" class="form-control" id="nama" required>
        </div>
        <div class="mb-3">
            <label for="emel" class="form-label">Emel</label>
            <input type="email" class="form-control" id="emel" required>
        </div>
        <div class="mb-3">
            <label for="telefon" class="form-label">Nombor Telefon</label>
            <input type="tel" class="form-control" id="telefon">
        </div>
        <div class="mb-3">
            <label for="mesej" class="form-label">Maklum Balas</label>
            <textarea class="form-control" id="mesej" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Hantar</button>
    </form>
</div>
@endsection
