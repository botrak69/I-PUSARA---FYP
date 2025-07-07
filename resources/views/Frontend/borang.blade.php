@extends('Frontend.layout')

@section('title', 'Borang Permohonan')

@section('content')
<div class="container my-5">

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h2 class="text-center mb-4">BORANG PERMOHONAN PENGEBUMIAN JENAZAH</h2>

    <form method="POST" action="{{ route('submit.borang') }}">
        @csrf

        <h5>1. Maklumat Waris</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Waris</label>
                <input type="text" name="namaWaris" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>No. Kad Pengenalan Waris</label>
                <input type="text" name="nokpWaris" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
            <label>No. Telefon Waris</label>
            <input type="text" name="noTelWaris" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Hubungan dengan Arwah</label>
            <input type="text" name="hubunganWaris" class="form-control" required>
        </div>

        <h5 class="mt-4">2. Maklumat Arwah</h5>
        <div class="mb-3">
            <label>Kampung</label>
            <input type="text" name="kampung" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Arwah</label>
                <input type="text" name="namaSiMati" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>No. KP Arwah</label>
                <input type="text" name="nokpSiMati" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Jantina</label>
                <select name="jantina" class="form-select" required>
                    <option value="">-- Sila Pilih --</option>
                    <option value="Lelaki">Lelaki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Umur Arwah</label>
                <input type="number" name="umurSiMati" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Bapa</label>
                <input type="text" name="namaBapa" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Nama Emak</label>
                <input type="text" name="namaEmak" class="form-control" required>
            </div>
        </div>

        <h5 class="mt-4">3. Tarikh dan Masa</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Tarikh Kematian (Hijrah)</label>
                <input type="text" name="tarikhHijrah" id="tarikhHijrah" class="form-control" readonly placeholder="Auto generate">
            </div>
            <div class="col-md-6 mb-3">
                <label>Tarikh Kematian (Masihi)</label>
                <input type="date" name="tarikhMasihi" id="tarikhMasihi" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
            <label>Masa Pengebumian</label>
            <input type="time" name="masaPengebumian" class="form-control" required>
        </div>

        <h5 class="mt-4">4. Sebab Kematian</h5>
        <div class="mb-3">
            <label>Sebab Kematian</label>
            <select name="sebabKematian" class="form-select" required>
                <option value="">-- Sila Pilih --</option>
                <option value="Sakit Tua">Sakit Tua</option>
                <option value="Kemalangan">Kemalangan</option>
                <option value="Mati Mengejut">Mati Mengejut</option>
                <option value="Lain-Lain">Lain-Lain</option>
            </select>
        </div>

        <hr class="my-4">
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">Hantar Permohonan</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
// ✅ Auto convert Tarikh Masihi ke Hijrah (BM Style)
document.getElementById('tarikhMasihi').addEventListener('change', function() {
    const masihiDate = this.value;
    if (masihiDate) {
        const dateParts = masihiDate.split('-');
        const year = parseInt(dateParts[0]);
        const month = parseInt(dateParts[1]) - 1;
        const day = parseInt(dateParts[2]);

        const gregorianDate = new Date(year, month, day);
        const hijriDate = gregorianToHijri(gregorianDate);

        document.getElementById('tarikhHijrah').value = hijriDate;
    } else {
        document.getElementById('tarikhHijrah').value = '';
    }
});

const hijriMonths = [
    'Muharam', 'Safar', 'Rabiulawal', 'Rabiulakhir', 'Jamadilawal', 'Jamadilakhir',
    'Rejab', 'Syaaban', 'Ramadan', 'Syawal', 'Zulkaedah', 'Zulhijjah'
];

function gregorianToHijri(gDate) {
    const day = gDate.getDate();
    const month = gDate.getMonth();
    const year = gDate.getFullYear();

    const m = month + 1;
    const y = year;

    let jd;
    if ((y > 1582) || (y === 1582 && m > 10) || (y === 1582 && m === 10 && day > 14)) {
        jd = Math.floor((1461 * (y + 4800 + Math.floor((m - 14) / 12))) / 4) +
            Math.floor((367 * (m - 2 - 12 * Math.floor((m - 14) / 12))) / 12) -
            Math.floor((3 * Math.floor((y + 4900 + Math.floor((m - 14) / 12)) / 100)) / 4) +
            day - 32075;
    } else {
        jd = 367 * y - Math.floor((7 * (y + 5001 + Math.floor((m - 9) / 7))) / 4) +
            Math.floor((275 * m) / 9) + day + 1729777;
    }

    const l = jd - 1948440 + 10632;
    const n = Math.floor((l - 1) / 10631);
    const l1 = l - 10631 * n + 354;
    const j = (Math.floor((10985 - l1) / 5316)) *
        (Math.floor((50 * l1) / 17719)) +
        (Math.floor(l1 / 5670)) *
        (Math.floor((43 * l1) / 15238));
    const l2 = l1 - (Math.floor((30 - j) / 15)) *
        (Math.floor((17719 * j) / 50)) -
        (Math.floor(j / 16)) *
        (Math.floor((15238 * j) / 43)) + 29;

    const mHijrah = Math.floor((24 * l2) / 709);
    const dHijrah = l2 - Math.floor((709 * mHijrah) / 24);
    const yHijrah = 30 * n + j - 30;

    return `${dHijrah} ${hijriMonths[mHijrah - 1]} ${yHijrah}H`;
}
</script>
@endsection
