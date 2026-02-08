@extends('fe.dashboard')
@section('sidebar')
    @include('fe.navbar')
@endsection
@section('home')
    @include('fe.home')
@endsection
@section('content')
<div class="container mt-4">

    <h3 class="mb-3">🛠️ Laporan Pemeliharaan</h3>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORM INPUT MAINTENANCE --}}
    <div class="card mb-4">
        <div class="card-header">
            Form Laporan Maintenance
        </div>
        <div class="card-body">
            <form action="{{ route('pemeliharaan.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Item</label>
                        <select name="item_id" class="form-control" required>
                            <option value="">-- Pilih Item --</option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Jenis Maintenance</label>
                        <input type="text" name="jenis_maintenance" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <button class="btn btn-primary">
                    📤 Kirim Laporan
                </button>
            </form>
        </div>
    </div>

    {{-- TABLE DATA MAINTENANCE --}}
    <div class="card">
        <div class="card-header">
            Data Maintenance
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Jenis</th>
                        <th>Interval</th>
                        <th>Last</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($maintenances as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->item->nama_barang ?? '-' }}</td>
                        <td>{{ $m->jenis_maintenance }}</td>
                        <td>{{ $m->interval_hari }} hari</td>
                        <td>{{ $m->last_maintenance }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ $m->status }}
                            </span>
                        </td>
                        <td>{{ $m->catatan }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Belum ada data maintenance
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
