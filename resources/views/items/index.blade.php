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
                        <th style="width:60px" class="text-center">No</th>
                        <th>Nama Barang</th>
                        <th style="width:140px">Kategori</th>
                        <th style="width:160px">Lokasi</th>
                        <th style="width:120px">Kondisi</th>
                        <th class="text-center" style="width:240px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($items as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $item->nama_barang }}</td>
                        <td>
                            <span class="badge bg-secondary">
                                {{ $item->kategori }}
                            </span>
                        </td>
                        <td>{{ $item->lokasi }}</td>
                        <td>
                            @if($item->kondisi == 'Baik')
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle me-1"></i>Baik
                                </span>
                            @elseif($item->kondisi == 'Rusak')
                                <span class="badge bg-danger">
                                    <i class="fas fa-times-circle me-1"></i>Rusak
                                </span>
                            @else
                                <span class="badge bg-warning text-dark">
                                    <i class="fas fa-exclamation-circle me-1"></i>Perlu Cek
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('items.show', $item->id) }}"
                                   class="btn btn-sm btn-info">
                                    <i class="fas fa-eye me-1"></i>Detail
                                </a>

                                <a href="{{ route('items.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>

                                <button type="button"
                                        class="btn btn-sm btn-danger"
                                        onclick="confirmDelete({{ $item->id }})">
                                    <i class="fas fa-trash me-1"></i>Hapus
                                </button>
                            </div>

                            <form id="delete-form-{{ $item->id }}"
                                  action="{{ route('items.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-5">
                            <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                            <p class="mb-0">Data barang belum tersedia</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

<style>
    .table tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease;
    }

    .badge {
        padding: 0.5em 0.75em;
        font-weight: 500;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
        border-radius: 0.25rem;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .btn-sm i {
        font-size: 0.75rem;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        color: white;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #000;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .btn-danger:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(220, 53, 69, 0.3);
    }

    .d-flex.gap-1 {
        gap: 0.25rem;
    }

    @media (max-width: 768px) {
        .d-flex.gap-1 {
            flex-direction: column;
            align-items: stretch;
        }
        
        .d-flex.gap-1 .btn {
            width: 100%;
        }
    }
</style>

<script>
function confirmDelete(id) {
    if (confirm('Yakin ingin menghapus data barang ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>

@endsection