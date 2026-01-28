@extends('be.master')

@section('content')
<div class="container">
    <h3>Data Barang</h3>

    <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">+ Tambah Barang</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Kondisi</th>
            <th>Aksi</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->kategori }}</td>
            <td>{{ $item->lokasi }}</td>
            <td>{{ $item->kondisi }}</td>
            <td>
                <a href="{{ route('items.show',$item->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('items.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('items.destroy',$item->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
