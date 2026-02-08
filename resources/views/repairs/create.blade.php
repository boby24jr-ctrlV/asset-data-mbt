@extends('be.master')

@section('content')
<div class="container">
    <h3>➕ Tambah Repair</h3>

    <form method="POST" action="{{ route('repairs.store') }}">
        @csrf

        {{-- Maintenance Schedule --}}
        <div class="mb-2">
            <label>Barang & Jadwal Maintenance</label>
            <select name="maintenance_schedule_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($maintenanceSchedules as $schedule)
                    <option value="{{ $schedule->id }}">
                        {{ $schedule->item->nama_barang }} 
                        ({{ $schedule->jenis_maintenance }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tempat Service --}}
        <div class="mb-2">
            <label>Tempat Service</label>
            <select name="tempat_services_id" class="form-control" required>
                <option value="">-- Pilih Tempat Service --</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->nama_tempat }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal Rusak --}}
        <div class="mb-2">
            <label>Tanggal Rusak</label>
            <input type="date" name="tanggal_rusak" class="form-control" required>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-2">
            <label>Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" class="form-control" rows="3"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
