@extends('be.master')

@section('content')
<div class="container">
    <h3>✏️ Update Repair</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('repairs.update', $repair->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
    <label class="form-label">Item</label>
    <select name="maintenance_schedule_id" class="form-control" required>
        <option value="">-- Pilih Item --</option>
        @foreach($maintenanceSchedules as $ms)
            <option value="{{ $ms->id }}"
                {{ old('maintenance_schedule_id', $repair->maintenance_schedule_id) == $ms->id ? 'selected' : '' }}>
                {{ $ms->item->nama_barang ?? 'Item tidak ada' }}
            </option>
        @endforeach
    </select>
</div>


        <div class="mb-3">
            <label class="form-label">User</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" 
                        {{ old('user_id', $repair->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
    <label class="form-label">Tempat Service</label>
    <select name="tempat_services_id" class="form-select">
        <option value="">-- Pilih Tempat Service --</option>
        @foreach($services as $service)
            <option value="{{ $service->id }}"
                {{ old('tempat_services_id', $repair->tempat_services_id) == $service->id ? 'selected' : '' }}>
                {{ $service->nama_tempat }}
            </option>
        @endforeach
    </select>
</div>


        <div class="mb-3">
            <label class="form-label">Tanggal Rusak</label>
            <input type="date" name="tanggal_rusak" 
                   value="{{ old('tanggal_rusak', $repair->tanggal_rusak) }}" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" class="form-control" rows="4" required>{{ old('deskripsi_kerusakan', $repair->deskripsi_kerusakan) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="dilaporkan" {{ old('status', $repair->status) == 'dilaporkan' ? 'selected' : '' }}>
                    Dilaporkan
                </option>
                <option value="proses" {{ old('status', $repair->status) == 'proses' ? 'selected' : '' }}>
                    Proses
                </option>
                <option value="selesai" {{ old('status', $repair->status) == 'selesai' ? 'selected' : '' }}>
                    Selesai
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Biaya</label>
            <input type="number" name="biaya" value="{{ old('biaya', $repair->biaya) }}" 
                   class="form-control" step="0.01" min="0">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" 
                   value="{{ old('tanggal_selesai', $repair->tanggal_selesai) }}" 
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control" rows="4">{{ old('catatan', $repair->catatan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update
        </button>
        <a href="{{ route('repairs.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection