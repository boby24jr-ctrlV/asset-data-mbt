@extends('be.master')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">📦 Data Barang</h4>
        <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm">
            + Tambah Barang
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="thead-light">
                    <tr>
                        <th style="width:60px" class="text-center">No</th>
                        <th>Nama Barang</th>
                        <th style="width:140px">Kategori</th>
                        <th style="width:160px">Lokasi</th>
                        <th style="width:120px">Kondisi</th>
                        <th class="text-center" style="width:180px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($items as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $item->nama_barang }}</td>
                        <td>
                            <span class="badge badge-secondary">
                                {{ $item->kategori }}
                            </span>
                        </td>
                        <td>{{ $item->lokasi }}</td>
                        <td>
                            @if($item->kondisi == 'Baik')
                                <span class="badge badge-success">Baik</span>
                            @elseif($item->kondisi == 'Rusak')
                                <span class="badge badge-danger">Rusak</span>
                            @else
                                <span class="badge badge-warning">Perlu Cek</span>
                            @endif
                        </td>
                        <td class="text-center">
    <div class="d-flex justify-content-center gap-2 flex-wrap">
        <a href="{{ route('items.show',$item->id) }}"
           class="btn btn-info btn-sm">
            Detail
        </a>

        <a href="{{ route('items.edit',$item->id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('items.destroy',$item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Yakin hapus?')"
                    class="btn btn-danger btn-sm">
                Hapus
            </button>
        </form>
    </div>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Data barang belum tersedia
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
