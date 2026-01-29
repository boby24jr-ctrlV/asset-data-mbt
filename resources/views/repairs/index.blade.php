@extends('be.master')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-semibold mb-0">🔧 Data Repair</h4>
                <a href="{{ route('repairs.create') }}" class="btn btn-primary rounded-pill px-4">
                    + Tambah Repair
                </a>
            </div>

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Tanggal Rusak</th>
                            <th>Status</th>
                            <th>Biaya</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($repairs as $repair)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td class="fw-semibold">
                                {{ $repair->item->nama_barang }}
                            </td>

                            <td>{{ $repair->tanggal_rusak }}</td>

                            <td>
                                @if($repair->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @elseif($repair->status == 'proses')
                                    <span class="badge bg-warning text-dark">Proses</span>
                                @else
                                    <span class="badge bg-secondary">Dilaporkan</span>
                                @endif
                            </td>

                            <td>
                                {{ $repair->biaya ? 'Rp '.number_format($repair->biaya,0,',','.') : '-' }}
                            </td>

                            <td class="text-center">
                                <a href="{{ route('repairs.show', $repair->id) }}"
                                   class="btn btn-outline-info btn-sm rounded-pill">
                                    Detail
                                </a>

                                <a href="{{ route('repairs.edit', $repair->id) }}"
                                   class="btn btn-outline-warning btn-sm rounded-pill">
                                    Edit
                                </a>

                                <form action="{{ route('repairs.destroy', $repair->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus data repair ini?')"
                                            class="btn btn-outline-danger btn-sm rounded-pill">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada data repair
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
