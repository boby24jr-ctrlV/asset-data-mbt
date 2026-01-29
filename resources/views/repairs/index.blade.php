@extends('be.master')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">🔧 Data Repair</h4>
        <a href="{{ route('repairs.create') }}" class="btn btn-primary btn-sm">
            + Tambah Repair
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="thead-light">
                    <tr>
                        <th style="width:60px" class="text-center">No</th>
                        <th>Nama Barang</th>
                        <th style="width:160px">Tanggal Rusak</th>
                        <th style="width:120px">Status</th>
                        <th style="width:120px">Biaya</th>
                        <th class="text-center" style="width:200px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($repairs as $repair)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>

                        <td class="fw-semibold">
                            {{ $repair->item->nama_barang }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($repair->tanggal_rusak)->format('d M Y') }}
                        </td>

                        <td>
                            @if($repair->status == 'proses')
                                <span class="badge badge-warning">Proses</span>
                            @elseif($repair->status == 'selesai')
                                <span class="badge badge-success">Selesai</span>
                            @else
                                <span class="badge badge-secondary">{{ $repair->status }}</span>
                            @endif
                        </td>

                        <td>
                            {{ $repair->biaya ? 'Rp '.number_format($repair->biaya,0,',','.') : '-' }}
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="{{ route('repairs.show', $repair->id) }}"
                                   class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <a href="{{ route('repairs.edit', $repair->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('repairs.destroy', $repair->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')"
                                            class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Data repair belum tersedia
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
