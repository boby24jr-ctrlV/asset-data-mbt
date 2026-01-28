@extends('be.master')

@section('content')
<div class="container">
    <h3>🔍 Detail Repair</h3>

    <ul class="list-group">
        <li class="list-group-item"><b>Barang:</b> {{ $repair->item->nama_barang }}</li>
        <li class="list-group-item"><b>Pelapor:</b> {{ $repair->user->name }}</li>
        <li class="list-group-item"><b>Tanggal Rusak:</b> {{ $repair->tanggal_rusak }}</li>
        <li class="list-group-item"><b>Status:</b> {{ $repair->status }}</li>
        <li class="list-group-item"><b>Biaya:</b> {{ $repair->biaya ?? '-' }}</li>
        <li class="list-group-item"><b>Tanggal Selesai:</b> {{ $repair->tanggal_selesai ?? '-' }}</li>
        <li class="list-group-item"><b>Catatan:</b> {{ $repair->catatan ?? '-' }}</li>
        <li class="list-group-item"><b>Deskripsi:</b> {{ $repair->deskripsi_kerusakan }}</li>
    </ul>

    <a href="{{ route('repairs.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
