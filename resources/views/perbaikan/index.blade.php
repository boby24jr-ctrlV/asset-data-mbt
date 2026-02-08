@extends('fe.dashboard')

@section('sidebar')
    @include('fe.navbar')
@endsection

@section('home')
    @include('fe.home')
@endsection

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">🛠️ Laporan Perbaikan</h3>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- FORM INPUT PERBAIKAN --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📝 Form Laporan Perbaikan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('perbaikan.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Item (dari Maintenance Schedule) <span class="text-danger">*</span></label>
                        <select name="maintenance_schedule_id" class="form-select" required>
                            <option value="">-- Pilih Item --</option>
                            @foreach($maintenanceItems as $ms)
                                <option value="{{ $ms->id }}">
                                    {{ $ms->item->nama_barang ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tempat Service <span class="text-danger">*</span></label>
                        <select name="tempat_services_id" class="form-select" required>
                            <option value="">-- Pilih Tempat Service --</option>
                            @foreach($tempatServices as $ts)
                                <option value="{{ $ts->id }}">{{ $ts->nama_tempat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tanggal Rusak <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_rusak" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Deskripsi Kerusakan <span class="text-danger">*</span></label>
                        <textarea name="deskripsi_kerusakan" class="form-control" rows="3" placeholder="Jelaskan kondisi kerusakan secara detail..." required></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Catatan (opsional)</label>
                        <textarea name="catatan" class="form-control" rows="2" placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-send"></i> 📤 Kirim Laporan
                </button>
            </form>
        </div>
    </div>

    {{-- TABLE DATA PERBAIKAN --}}
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">📋 Riwayat Laporan Perbaikan Saya</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th width="50">#</th>
                            <th>Item</th>
                            <th>Tempat Service</th>
                            <th>Tanggal Rusak</th>
                            <th>Deskripsi</th>
                            <th width="120">Status</th>
                            <th>Biaya</th>
                            <th>Tanggal Selesai</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($repairs as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->maintenanceSchedule->item->nama_barang ?? '-' }}</td>
                            <td>{{ $r->tempatService->nama_tempat ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($r->tanggal_rusak)->format('d M Y') }}</td>
                            <td>{{ Str::limit($r->deskripsi_kerusakan, 50) }}</td>
                            <td>
                                @if($r->status == 'dilaporkan')
                                    <span class="badge bg-warning text-dark">📤 Dilaporkan</span>
                                @elseif($r->status == 'proses')
                                    <span class="badge bg-info">⚙️ Proses</span>
                                @elseif($r->status == 'selesai')
                                    <span class="badge bg-success">✅ Selesai</span>
                                @else
                                    <span class="badge bg-secondary">{{ $r->status }}</span>
                                @endif
                            </td>
                            <td>{{ $r->biaya ? 'Rp ' . number_format($r->biaya, 0, ',', '.') : '-' }}</td>
                            <td>{{ $r->tanggal_selesai ? \Carbon\Carbon::parse($r->tanggal_selesai)->format('d M Y') : '-' }}</td>
                            <td>{{ $r->catatan ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">
                                <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                                <p class="mt-2">Belum ada laporan perbaikan</p>
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