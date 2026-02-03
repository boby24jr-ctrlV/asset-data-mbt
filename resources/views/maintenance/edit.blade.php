@extends('be.master')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-warning text-white rounded-top-4">
                    <h5 class="mb-0">✏ Edit Jadwal Maintenance</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('maintenance.update',$maintenance->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Barang --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Barang</label>
                            <select name="item_id" class="form-select" required>
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $maintenance->item_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jenis Maintenance --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jenis Maintenance</label>
                            <input type="text" name="jenis_maintenance"
                                   class="form-control"
                                   value="{{ $maintenance->jenis_maintenance }}"
                                   placeholder="Service, Cuci, Pengecekan" required>
                        </div>

                        <div class="row">
                            {{-- Interval --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Interval (hari)</label>
                                <input type="number" name="interval_hari"
                                       class="form-control"
                                       value="{{ $maintenance->interval_hari }}" required>
                            </div>

                            {{-- Last Maintenance --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Tanggal Terakhir</label>
                                <input type="date" name="last_maintenance"
                                       class="form-control"
                                       value="{{ $maintenance->last_maintenance }}">
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" class="form-select">
                                <option value="dijadwalkan" {{ $maintenance->status=='dijadwalkan'?'selected':'' }}>
                                    Dijadwalkan
                                </option>
                                <option value="proses" {{ $maintenance->status=='proses'?'selected':'' }}>
                                    Proses
                                </option>
                                <option value="selesai" {{ $maintenance->status=='selesai'?'selected':'' }}>
                                    Selesai
                                </option>
                            </select>
                        </div>

                        {{-- Catatan --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Catatan</label>
                            <textarea name="catatan" rows="3" class="form-control"
                                      placeholder="Catatan tambahan...">{{ $maintenance->catatan }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('maintenance.index') }}"
                               class="btn btn-secondary rounded-pill px-4">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-warning rounded-pill px-4 text-white">
                                💾 Update Data
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
