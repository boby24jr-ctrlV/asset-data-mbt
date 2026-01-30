@extends('be.master')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">🏢 Data Tempat Service</h4>
        <a href="{{ route('tempat-services.create') }}" class="btn btn-primary btn-sm">
            + Tambah Tempat Service
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
                        <th>Nama Tempat</th>
                        <th>Alamat</th>
                        <th style="width:160px">No Telepon</th>
                        <th style="width:180px" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($tempatServices as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $item->nama_tempat }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_telepon }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="{{ route('tempat-services.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('tempat-services.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus data?')"
                                            class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Data tempat service belum tersedia
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection
    