@extends('be.master')

@section('content')
<div class="container">
    <h3>🔧 Data Repair</h3>

    <a href="{{ route('repairs.create') }}" class="btn btn-primary mb-3">
        + Tambah Repair
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Barang</th>
                <th>Tanggal Rusak</th>
                <th>Status</th>
                <th>Biaya</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repairs as $repair)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $repair->item->nama_barang }}</td>
                <td>{{ $repair->tanggal_rusak }}</td>
                <td>{{ $repair->status }}</td>
                <td>{{ $repair->biaya ?? '-' }}</td>
                <td>
                    <a href="{{ route('repairs.show', $repair->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('repairs.edit', $repair->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('repairs.destroy', $repair->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
