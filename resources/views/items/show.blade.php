@extends('be.master')

@section('content')
<div class="container">
    <h3>Detail Barang</h3>

    <ul class="list-group">
        <li class="list-group-item">Nama: {{ $item->nama_barang }}</li>
        <li class="list-group-item">Kategori: {{ $item->kategori }}</li>
        <li class="list-group-item">Lokasi: {{ $item->lokasi }}</li>
        <li class="list-group-item">Kondisi: {{ $item->kondisi }}</li>
        <li class="list-group-item">Catatan: {{ $item->catatan }}</li>
    </ul>

    <a href="{{ route('items.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
