@extends('be.master')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-semibold mb-0">📦 Data Barang</h4>
                <a href="{{ route('items.create') }}" class="btn btn-primary rounded-pill px-4">
                    + Tambah Barang
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Kondisi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $item->nama_barang }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $item->kategori }}</span>
                            </td>
                            <td>{{ $item->lokasi }}</td>
                            <td>
                                @if($item->kondisi == 'Baik')
                                    <span class="badge bg-success">{{ $item->kondisi }}</span>
                                @elseif($item->kondisi == 'Rusak')
                                    <span class="badge bg-danger">{{ $item->kondisi }}</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ $item->kondisi }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('items.show',$item->id) }}" class="btn btn-outline-info btn-sm rounded-pill">Detail</a>
                                <a href="{{ route('items.edit',$item->id) }}" class="btn btn-outline-warning btn-sm rounded-pill">Edit</a>

                                <form action="{{ route('items.destroy',$item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-outline-danger btn-sm rounded-pill">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
