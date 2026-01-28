@extends('be.master')

@section('content')
<div class="container">
    <h3>Edit Barang</h3>

    <form action="{{ route('items.update',$item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nama_barang" value="{{ $item->nama_barang }}" class="form-control mb-2">
        <input type="text" name="kategori" value="{{ $item->kategori }}" class="form-control mb-2">
        <input type="text" name="lokasi" value="{{ $item->lokasi }}" class="form-control mb-2">

        <select name="kondisi" class="form-control mb-2">
            <option value="baik" {{ $item->kondisi=='baik'?'selected':'' }}>Baik</option>
            <option value="rusak" {{ $item->kondisi=='rusak'?'selected':'' }}>Rusak</option>
            <option value="maintenance" {{ $item->kondisi=='maintenance'?'selected':'' }}>Maintenance</option>
        </select>

        <textarea name="catatan" class="form-control mb-2">{{ $item->catatan }}</textarea>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
