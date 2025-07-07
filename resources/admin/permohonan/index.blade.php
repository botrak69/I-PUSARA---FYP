@extends('Frontend.layout')

@section('title', 'Senarai Permohonan')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Senarai Permohonan Pengebumian</h2>

    @if (count($applications) == 0)
        <p>Tiada permohonan setakat ini.</p>
    @else
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Waris</th>
                <th>Nama Arwah</th>
                <th>Tarikh Kematian</th>
                <th>Hubungan</th>
                <th>No Tel</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $index => $app)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $app['namaWaris'] ?? '-' }}</td>
                    <td>{{ $app['namaSiMati'] ?? '-' }}</td>
                    <td>{{ $app['tarikhMasihi'] ?? '-' }}</td>
                    <td>{{ $app['hubunganWaris'] ?? '-' }}</td>
                    <td>{{ $app['noTelWaris'] ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
