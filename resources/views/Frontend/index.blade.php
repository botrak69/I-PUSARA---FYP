<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Deceased</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h2>Manage Deceased Records</h2>
    <a href="{{ route('admin.create') }}" class="btn btn-success mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Lot</th>
                <th>TPI</th>
                <th>X</th>
                <th>Y</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deceaseds as $d)
                <tr>
                    <td>{{ $d->full_name }}</td>
                    <td>{{ $d->lot_number }}</td>
                    <td>{{ $d->tpi }}</td>
                    <td>{{ $d->x_coordinate }}</td>
                    <td>{{ $d->y_coordinate }}</td>
                    <td>{{ $d->date_of_death }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $d->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.destroy', $d->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this record?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
