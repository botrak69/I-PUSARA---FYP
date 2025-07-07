@extends('Frontend.layout-dashboard')

@section('title', 'Overview')

@section('content')

<h2 class="mb-4">Dashboard Overview - Statistik Data</h2>

<div class="row g-4">
    <!-- Row 1 -->
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Statistik Jantina</div>
            <div class="card-body">
                <canvas id="genderChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">Statistik Sebab Kematian</div>
            <div class="card-body">
                <canvas id="causeChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Row 2 -->
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">Statistik Mengikut Kampung</div>
            <div class="card-body">
                <canvas id="kampungChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Row 3 -->
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">Statistik Umur</div>
            <div class="card-body">
                <canvas id="umurChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">Kematian Mengikut Tahun</div>
            <div class="card-body">
                <canvas id="yearChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Row 4 -->
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-danger text-white">Statistik Hubungan Waris</div>
            <div class="card-body">
                <canvas id="hubunganChart"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const genderData = {!! json_encode($genderData) !!};
    const causeData = {!! json_encode($causeData) !!};
    const kampungData = {!! json_encode($kampungData) !!};
    const umurGroup = {!! json_encode($umurGroup) !!};
    const yearData = {!! json_encode($yearData) !!};
    const hubunganData = {!! json_encode($hubunganData) !!};

    // ✅ Jantina
    new Chart(document.getElementById('genderChart'), {
        type: 'pie',
        data: {
            labels: Object.keys(genderData),
            datasets: [{
                data: Object.values(genderData),
                backgroundColor: ['#0d6efd', '#dc3545']
            }]
        }
    });

    // ✅ Sebab Kematian
    new Chart(document.getElementById('causeChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(causeData),
            datasets: [{
                label: 'Bilangan',
                data: Object.values(causeData),
                backgroundColor: '#198754'
            }]
        },
        options: { indexAxis: 'y' }
    });

    // ✅ Kampung
    new Chart(document.getElementById('kampungChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(kampungData),
            datasets: [{
                label: 'Bilangan',
                data: Object.values(kampungData),
                backgroundColor: '#ffc107'
            }]
        }
    });

    // ✅ Umur
    new Chart(document.getElementById('umurChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(umurGroup),
            datasets: [{
                label: 'Bilangan',
                data: Object.values(umurGroup),
                backgroundColor: '#0dcaf0'
            }]
        }
    });

    // ✅ Year
    new Chart(document.getElementById('yearChart'), {
        type: 'line',
        data: {
            labels: Object.keys(yearData),
            datasets: [{
                label: 'Bilangan',
                data: Object.values(yearData),
                borderColor: '#6c757d',
                backgroundColor: '#adb5bd',
                fill: true,
                tension: 0.3
            }]
        }
    });

    // ✅ Hubungan Waris
    new Chart(document.getElementById('hubunganChart'), {
        type: 'pie',
        data: {
            labels: Object.keys(hubunganData),
            datasets: [{
                data: Object.values(hubunganData),
                backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0', '#9966ff']
            }]
        }
    });
</script>
@endsection
