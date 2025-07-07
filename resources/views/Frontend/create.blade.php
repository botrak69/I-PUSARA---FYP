@extends('Frontend.layout-dashboard')

@section('title', 'Add New')

@section('content')
<style>
body {
    font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    font-size: 13px;
}

label {
    font-weight: 600;
}

input, select, textarea {
    font-size: 13px !important;
}

.card {
    border: 1px solid #ddd;
}
</style>

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Tambah Rekod Baru</h5>
    </div>
    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dashboard.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <!-- Left column -->
                <div class="col-md-6">
                    <label>Nama Si Mati</label>
                    <input type="text" name="NamaSiMati" class="form-control" required>

                    <label class="mt-2">No KP</label>
                    <input type="text" name="NoKP" class="form-control">

                    <label class="mt-2">Kampung</label>
                    <input type="text" name="Kampung" class="form-control">

                    <label class="mt-2">Umur</label>
                    <input type="number" name="Umur" class="form-control">

                    <label class="mt-2">Jantina</label>
                    <select name="Jantina" class="form-select">
                        <option value="LELAKI">LELAKI</option>
                        <option value="PEREMPUAN">PEREMPUAN</option>
                    </select>

                    <label class="mt-2">Nama Bapa</label>
                    <input type="text" name="NamaBapa" class="form-control">

                    <label class="mt-2">Nama Emak</label>
                    <input type="text" name="NamaEmak" class="form-control">
                </div>

                <!-- Right column -->
                <div class="col-md-6">
                    <label>Tarikh Hijrah</label>
                    <input type="text" name="TarikhHijrah" id="tarikhHijrah" class="form-control" readonly placeholder="Auto generate">

                    <label class="mt-2">Tarikh Masihi</label>
                    <input type="date" name="TarikhMasihi" id="tarikhMasihi" class="form-control">

                    <label class="mt-2">Masa Pengebumian</label>
                    <input type="text" name="MasaPengebumian" class="form-control" placeholder="contoh: 11.00 AM">

                    <label class="mt-2">Sebab Kematian</label>
                    <input type="text" name="SebabKematian" class="form-control">

                    <label class="mt-2">Nama Waris</label>
                    <input type="text" name="NamaWaris" class="form-control">

                    <label class="mt-2">No Tel Waris</label>
                    <input type="text" name="NoTelWaris" class="form-control">

                    <label class="mt-2">Hubungan Waris</label>
                    <input type="text" name="HubunganWaris" class="form-control">

                    <label class="mt-2">No Plot</label>
                    <input type="text" name="NoPlot" class="form-control">
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan Rekod</button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
// ✅ Convert Tarikh Masihi ke Hijrah dalam Bahasa Melayu/Rumi
document.getElementById('tarikhMasihi').addEventListener('change', function() {
    const masihiDate = this.value;
    if (masihiDate) {
        const dateParts = masihiDate.split('-');
        const year = parseInt(dateParts[0]);
        const month = parseInt(dateParts[1]) - 1;
        const day = parseInt(dateParts[2]);

        const gregorianDate = new Date(year, month, day);

        // Convert to Islamic Date (Hijri)
        const hijriDate = gregorianToHijri(gregorianDate);

        document.getElementById('tarikhHijrah').value = hijriDate;
    } else {
        document.getElementById('tarikhHijrah').value = '';
    }
});

// ✅ Hijri Months in Malay
const hijriMonths = [
    'Muharam', 'Safar', 'Rabiulawal', 'Rabiulakhir', 'Jamadilawal', 'Jamadilakhir',
    'Rejab', 'Syaaban', 'Ramadan', 'Syawal', 'Zulkaedah', 'Zulhijjah'
];

// ✅ Conversion Function (Simple Formula)
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
