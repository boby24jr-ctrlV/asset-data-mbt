@extends('be.master')

@section('content')
<div class="container">
    <h3>🏢 Tempat Service</h3>

    <a href="{{ route('tempat-services.create') }}" class="btn btn-primary mb-3">
        + Tambah Tempat Service
    </a>

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>

        @foreach ($tempatServices as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_tempat }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->no_telepon }}</td>
            <td>
                <a href="{{ route('tempat-services.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('tempat-services.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
