@extends('Frontend.layout-dashboard')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<style>
body {
    font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    font-size: 14px;
    background-color: #fff;
}

.table thead {
    background-color: #0d6efd;
    color: white;
}

.dataTables_wrapper .dataTables_filter {
    text-align: center !important;
}

.dataTables_wrapper .dataTables_filter label {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
}

.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 3px 7px;
}

.highlight {
    background-color: yellow;
    color: black;
}
</style>

<h2 class="mb-4">Dashboard - Rekod Lengkap</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- ✅ Top Buttons -->
<div class="mb-3 d-flex justify-content-between">
    <div>
        <a href="{{ route('dashboard.create') }}" class="btn btn-primary btn-sm">Tambah Rekod</a>
        <button class="btn btn-success btn-sm" onclick="exportTableToExcel('dataTable', 'DataJenazah')">Export Excel</button>
    </div>
</div>

<!-- ✅ Table -->
<div class="table-responsive">
    <table id="dataTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Si Mati</th>
                <th>No KP</th>
                <th>Kampung</th>
                <th>Umur</th>
                <th>Jantina</th>
                <th>Nama Bapa</th>
                <th>Nama Emak</th>
                <th>Tarikh Hijrah</th>
                <th>Tarikh Masihi</th>
                <th>Masa Pengebumian</th>
                <th>Sebab Kematian</th>
                <th>Nama Waris</th>
                <th>No Tel Waris</th>
                <th>Hubungan Waris</th>
                <th>No Plot</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item['NamaSiMati'] ?? '-' }}</td>
                <td>{{ $item['NoKP'] ?? '-' }}</td>
                <td>{{ $item['Kampung'] ?? '-' }}</td>
                <td>{{ $item['Umur'] ?? '-' }}</td>
                <td>{{ $item['Jantina'] ?? '-' }}</td>
                <td>{{ $item['NamaBapa'] ?? '-' }}</td>
                <td>{{ $item['NamaEmak'] ?? '-' }}</td>
                <td>{{ $item['TarikhHijrah'] ?? '-' }}</td>
                <td>{{ $item['TarikhMasihi'] ?? '-' }}</td>
                <td>{{ $item['MasaPengebumian'] ?? '-' }}</td>
                <td>{{ $item['SebabKematian'] ?? '-' }}</td>
                <td>{{ $item['NamaWaris'] ?? '-' }}</td>
                <td>{{ $item['NoTelWaris'] ?? '-' }}</td>
                <td>{{ $item['HubunganWaris'] ?? '-' }}</td>
                <td>{{ $item['NoPlot'] ?? '-' }}</td>
                <td>
                    <a href="{{ route('dashboard.edit', $index) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('dashboard.delete', $index) }}" class="btn btn-sm btn-danger"
                       onclick="return confirm('Adakah anda pasti ingin memadam?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        const table = $('#dataTable').DataTable({
            paging: true,
            ordering: false,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100],
            language: {
                search: "Carian:",
                lengthMenu: "Papar _MENU_ rekod setiap halaman",
                zeroRecords: "Tiada rekod dijumpai",
                info: "Papar halaman _PAGE_ dari _PAGES_",
                infoEmpty: "Tiada rekod tersedia",
                infoFiltered: "(ditapis dari _MAX_ jumlah rekod)"
            }
        });

        // ✅ Highlight search terms
        $('#dataTable_filter input').on('keyup', function() {
            let searchTerm = $(this).val().toLowerCase();

            $('#dataTable tbody tr').each(function() {
                let row = $(this);
                row.find('td').each(function() {
                    let cell = $(this);
                    let originalText = cell.text();
                    let regex = new RegExp(`(${searchTerm})`, 'gi');

                    if (searchTerm) {
                        let newText = originalText.replace(regex, `<span class="highlight">$1</span>`);
                        cell.html(newText);
                    } else {
                        cell.html(originalText);
                    }
                });
            });
        });
    });

    function exportTableToExcel(tableID, filename = ''){
        let downloadLink;
        const dataType = 'application/vnd.ms-excel';
        const tableSelect = document.getElementById(tableID);
        const tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        filename = filename ? filename + '.xls' : 'excel_data.xls';

        downloadLink = document.createElement("a");
        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
            const blob = new Blob(['\ufeff', tableHTML], { type: dataType });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            downloadLink.download = filename;
            downloadLink.click();
        }
    }
</script>
@endsection
