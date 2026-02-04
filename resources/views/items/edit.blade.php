@extends('be.master')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white fw-bold">Edit Barang</div>
    <div class="card-body">
        <form action="{{ route('items.update',$item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" value="{{ $item->kode_barang }}" required>
            </div>

            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $item->nama_barang }}" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ $item->kategori }}" required>
            </div>

            <div class="mb-3">
                <label>Merk</label>
                <input type="text" name="merk" class="form-control" value="{{ $item->merk }}">
            </div>

            <div class="mb-3">
                <label>Tahun Pengadaan</label>
                <input type="number" name="tahun_pengadaan" class="form-control" value="{{ $item->tahun_pengadaan }}">
            </div>

            <div class="mb-3">
                <label>Harga Barang</label>
                <input type="number" name="harga_barang" class="form-control" value="{{ $item->harga_barang }}">
            </div>

            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $item->lokasi }}" required>
            </div>

            <div class="mb-3">
                <label>Kondisi</label>
                <select name="kondisi" class="form-control">
                    <option value="baik" {{ $item->kondisi=='baik'?'selected':'' }}>Baik</option>
                    <option value="rusak" {{ $item->kondisi=='rusak'?'selected':'' }}>Rusak</option>
                    <option value="maintenance" {{ $item->kondisi=='maintenance'?'selected':'' }}>Maintenance</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Status Pemakaian</label>
                <select name="status_pemakaian" class="form-control">
                    <option value="aktif" {{ $item->status_pemakaian=='aktif'?'selected':'' }}>Aktif</option>
                    <option value="nonaktif" {{ $item->status_pemakaian=='nonaktif'?'selected':'' }}>Nonaktif</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Catatan</label>
                <textarea name="catatan" class="form-control">{{ $item->catatan }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
