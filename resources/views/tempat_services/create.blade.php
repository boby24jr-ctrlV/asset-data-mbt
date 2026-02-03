@extends('be.master')

@section('content')
<div class="card">

    {{-- HEADER --}}
    <div class="card-header">
        <h4 class="card-title mb-0">🏢 Tambah Tempat Service</h4>
    </div>

    {{-- BODY --}}
    <div class="card-body">

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tempat_services.store') }}" method="POST">
            @csrf

            {{-- NAMA TEMPAT --}}
            <div class="form-group">
                <label>Nama Tempat Service</label>
                <input
                    type="text"
                    name="nama_tempat"
                    class="form-control"
                    placeholder="Contoh: Service Laptop Jaya"
                    value="{{ old('nama_tempat') }}"
                    required
                >
            </div>

            {{-- ALAMAT --}}
            <div class="form-group">
                <label>Alamat</label>
                <textarea
                    name="alamat"
                    class="form-control"
                    rows="3"
                    placeholder="Alamat lengkap tempat service"
                    required
                >{{ old('alamat') }}</textarea>
            </div>

            {{-- NO TELEPON --}}
            <div class="form-group">
                <label>No Telepon</label>
                <input
                    type="text"
                    name="no_telepon"
                    class="form-control"
                    placeholder="08xxxxxxxxxx"
                    value="{{ old('no_telepon') }}"
                    required
                >
            </div>

            {{-- BUTTON --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('tempat_services.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
