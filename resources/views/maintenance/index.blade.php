@extends('be.master')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-semibold mb-0">🛠 Jadwal Maintenance</h4>
                <a href="{{ route('maintenance.create') }}" class="btn btn-primary rounded-pill px-4">
                    + Tambah Jadwal
                </a>
            </div>

            {{-- Notifikasi --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="alert alert-warning rounded-3">
                        <b>Mendekati Jadwal:</b> {{ $mendekati->count() }} data
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-danger rounded-3">
                        <b>Terlambat:</b> {{ $terlambat->count() }} data
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Jenis</th>
                            <th>Interval</th>
                            <th>Last</th>
                            <th>Next</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($maintenances as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $m->item->nama_barang }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $m->jenis_maintenance }}</span>
                            </td>
                            <td>{{ $m->interval_hari }} hari</td>
                            <td>{{ $m->last_maintenance }}</td>
                            <td>{{ $m->next_maintenance }}</td>
                            <td>
                                @if($m->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @elseif($m->status == 'proses')
                                    <span class="badge bg-warning text-dark">Proses</span>
                                @else
                                    <span class="badge bg-secondary">Dijadwalkan</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('maintenance.edit',$m->id) }}" class="btn btn-outline-warning btn-sm rounded-pill">
                                    Edit
                                </a>

                                <form action="{{ route('maintenance.destroy',$m->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-outline-danger btn-sm rounded-pill">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                Belum ada data maintenance
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
