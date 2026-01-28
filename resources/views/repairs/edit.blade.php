@extends('be.master')

@section('content')
<div class="container">
    <h3>✏️ Update Repair</h3>

    <form method="POST" action="{{ route('repairs.update', $repair->id) }}">
        @csrf @method('PUT')

        <div class="mb-2">
            <label>Tempat Service</label>
            <select name="tempat_services_id" class="form-control">
                <option value="">-</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $repair->tempat_services_id==$service->id?'selected':'' }}>
                        {{ $service->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="dilaporkan" {{ $repair->status=='dilaporkan'?'selected':'' }}>Dilaporkan</option>
                <option value="proses" {{ $repair->status=='proses'?'selected':'' }}>Proses</option>
                <option value="selesai" {{ $repair->status=='selesai'?'selected':'' }}>Selesai</option>
            </select>
        </div>

        <div class="mb-2">
            <label>Biaya</label>
            <input type="number" name="biaya" value="{{ $repair->biaya }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" value="{{ $repair->tanggal_selesai }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control">{{ $repair->catatan }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
