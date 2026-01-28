@extends('be.master')

@section('content')
<div class="container">
    <h3>➕ Tambah Repair</h3>

    <form method="POST" action="{{ route('repairs.store') }}">
        @csrf

        <div class="mb-2">
            <label>Barang</label>
            <select name="item_id" class="form-control">
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Tempat Service</label>
            <select name="tempat_services_id" class="form-control">
                <option value="">-</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Tanggal Rusak</label>
            <input type="date" name="tanggal_rusak" class="form-control">
        </div>

        <div class="mb-2">
            <label>Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
