@extends('be.master')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-semibold mb-0">🛠 Tambah Jadwal Maintenance</h4>
                <a href="{{ route('maintenance.index') }}" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('maintenance.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- Barang --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Barang</label>
                        <select name="item_id" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Barang --</option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Jenis Maintenance --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Jenis Maintenance</label>
                        <input type="text" name="jenis_maintenance"
                               class="form-control"
                               placeholder="Service, Cuci, Pengecekan" required>
                    </div>
                </div>

                <div class="row">
                    {{-- Interval --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Interval (hari)</label>
                        <input type="number" name="interval_hari"
                               class="form-control"
                               placeholder="Contoh: 30" required>
                    </div>

                    {{-- Last Maintenance --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Tanggal Terakhir</label>
                        <input type="date" name="last_maintenance"
                               class="form-control">
                    </div>
                </div>

                {{-- Catatan --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Catatan</label>
                    <textarea name="catatan" rows="3" class="form-control"
                              placeholder="Catatan tambahan..."></textarea>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        💾 Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
