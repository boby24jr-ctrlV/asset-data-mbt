@extends('be.master')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-semibold mb-0">📜 Riwayat Maintenance</h4>
                <a href="{{ route('maintenance.histories.create') }}" class="btn btn-primary rounded-pill px-4">
                    + Tambah Riwayat
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success rounded-3">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Jenis</th>
                            <th>Tanggal Service</th>
                            <th>Teknisi</th>
                            <th>Biaya</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($histories as $h)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td class="fw-semibold">
                                {{ $h->item->nama_barang }}
                            </td>

                            <td>
                                <span class="badge bg-secondary">
                                    {{ $h->jenis_maintenance }}
                                </span>
                            </td>

                            <td>{{ $h->tanggal_service }}</td>
                            <td>{{ $h->technician->name ?? '-' }}</td>
                            <td>Rp {{ number_format($h->biaya ?? 0,0,',','.') }}</td>

                            <td class="text-center">
                                <a href="{{ route('maintenance.histories.show',$h->id) }}"
                                   class="btn btn-outline-info btn-sm rounded-pill">Detail</a>

                                <a href="{{ route('maintenance.histories.edit',$h->id) }}"
                                   class="btn btn-outline-warning btn-sm rounded-pill">Edit</a>

                                <form action="{{ route('maintenance.histories.destroy',$h->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')"
                                        class="btn btn-outline-danger btn-sm rounded-pill">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada riwayat maintenance
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
