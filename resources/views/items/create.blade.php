@extends('be.master')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white fw-bold">Tambah Barang</div>
    <div class="card-body">
        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Merk</label>
                <input type="text" name="merk" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tahun Pengadaan</label>
                <input type="number" name="tahun_pengadaan" class="form-control">
            </div>

            <div class="mb-3">
                <label>Harga Barang</label>
                <input type="number" name="harga_barang" class="form-control">
            </div>

            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kondisi</label>
                <select name="kondisi" class="form-control">
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Status Pemakaian</label>
                <select name="status_pemakaian" class="form-control">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Catatan</label>
                <textarea name="catatan" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
