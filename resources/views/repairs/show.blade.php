@extends('be.master')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">🔍 Detail Repair</h4>
            <span class="badge bg-light text-dark">{{ $repair->status }}</span>
        </div>

        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="30%">Barang</th>
                    <td>:{{ $repair->schedule?->item?->nama_barang ?? 'Item tidak ditemukan' }}</td>
                </tr>
                <tr>
                    <th>Pelapor</th>
                    <td>: {{ $repair->user->name }}</td>
                </tr>
                <tr>
                    <th>Tanggal Rusak</th>
                    <td>: {{ $repair->tanggal_rusak }}</td>
                </tr>
                <tr>
                    <th>Biaya</th>
                    <td>: {{ $repair->biaya ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Selesai</th>
                    <td>: {{ $repair->tanggal_selesai ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Catatan</th>
                    <td>: {{ $repair->catatan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Deskripsi Kerusakan</th>
                    <td>: {{ $repair->deskripsi_kerusakan }}</td>
                </tr>
            </table>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('repairs.index') }}" class="btn btn-secondary">
                ⬅ Kembali
            </a>
        </div>
    </div>
</div>
@endsection
