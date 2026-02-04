@extends('be.master')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
        <h4 class="card-title mb-0 fw-bold">📦 Data Barang</h4>
        <a href="{{ route('items.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Barang
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Lokasi</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($items as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td><span class="badge bg-secondary">{{ $item->kategori }}</span></td>
                        <td>{{ $item->merk ?? '-' }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>
                            @if($item->kondisi == 'baik')
                                <span class="badge bg-success">Baik</span>
                            @elseif($item->kondisi == 'rusak')
                                <span class="badge bg-danger">Rusak</span>
                            @else
                                <span class="badge bg-warning text-dark">Maintenance</span>
                            @endif
                        </td>
                        <td>
                            @if($item->status_pemakaian == 'aktif')
                                <span class="badge bg-primary">Aktif</span>
                            @else
                                <span class="badge bg-dark">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('items.show',$item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('items.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button onclick="confirmDelete({{ $item->id }})" class="btn btn-sm btn-danger">Hapus</button>
                            </div>

                            <form id="delete-form-{{ $item->id }}" action="{{ route('items.destroy',$item->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-5">Data barang belum tersedia</td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

<script>
function confirmDelete(id){
    if(confirm('Yakin ingin menghapus data barang ini?')){
        document.getElementById('delete-form-'+id).submit();
    }
}
</script>

@endsection
