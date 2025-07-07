@extends('Frontend.layout-dashboard')

@section('title', 'Approval')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Senarai Permohonan Pengkebumian - Menunggu Kelulusan</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Si Mati</th>
                    <th>No KP</th>
                    <th>Kampung</th>
                    <th>Umur</th>
                    <th>Jantina</th>
                    <th>Tarikh Hijrah</th>
                    <th>Tarikh Masihi</th>
                    <th>Masa Pengebumian</th>
                    <th>Sebab Kematian</th>
                    <th>Nama Waris</th>
                    <th>No Tel Waris</th>
                    <th>Hubungan Waris</th>
                    <th>No Plot</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item['NamaSiMati'] ?? '-' }}</td>
                    <td>{{ $item['NoKP'] ?? '-' }}</td>
                    <td>{{ $item['Kampung'] ?? '-' }}</td>
                    <td>{{ $item['Umur'] ?? '-' }}</td>
                    <td>{{ $item['Jantina'] ?? '-' }}</td>
                    <td>{{ $item['TarikhHijrah'] ?? '-' }}</td>
                    <td>{{ $item['TarikhMasihi'] ?? '-' }}</td>
                    <td>{{ $item['MasaPengebumian'] ?? '-' }}</td>
                    <td>{{ $item['SebabKematian'] ?? '-' }}</td>
                    <td>{{ $item['NamaWaris'] ?? '-' }}</td>
                    <td>{{ $item['NoTelWaris'] ?? '-' }}</td>
                    <td>{{ $item['HubunganWaris'] ?? '-' }}</td>
                    <td>{{ $item['NoPlot'] ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('approval.accept', $index) }}" class="btn btn-sm btn-success">Terima</a>
                        <a href="{{ route('approval.reject', $index) }}" class="btn btn-sm btn-danger"
                           onclick="return confirm('Adakah anda pasti untuk tolak permohonan ini?')">Tolak</a>
                    </td>
                </tr>
                @endforeach
                @if(count($data) == 0)
                <tr>
                    <td colspan="15" class="text-center">Tiada permohonan menunggu kelulusan.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
