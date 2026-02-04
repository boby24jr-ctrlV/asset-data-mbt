@extends('be.master')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white fw-bold">Detail Barang</div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th>Kode Barang</th><td>{{ $item->kode_barang }}</td></tr>
            <tr><th>Nama Barang</th><td>{{ $item->nama_barang }}</td></tr>
            <tr><th>Kategori</th><td>{{ $item->kategori }}</td></tr>
            <tr><th>Merk</th><td>{{ $item->merk }}</td></tr>
            <tr><th>Tahun Pengadaan</th><td>{{ $item->tahun_pengadaan }}</td></tr>
            <tr><th>Harga</th><td>Rp {{ number_format($item->harga_barang) }}</td></tr>
            <tr><th>Lokasi</th><td>{{ $item->lokasi }}</td></tr>
            <tr><th>Kondisi</th><td>{{ $item->kondisi }}</td></tr>
            <tr><th>Status</th><td>{{ $item->status_pemakaian }}</td></tr>
            <tr><th>Catatan</th><td>{{ $item->catatan }}</td></tr>
        </table>

        <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('items.edit',$item->id) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection
