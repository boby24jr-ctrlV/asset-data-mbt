@extends('be.master')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <h4 class="fw-semibold mb-3">🔔 Riwayat Notifikasi</h4>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pesan</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Waktu</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notifikasis as $n)
                        <tr class="{{ !$n->is_read ? 'table-warning' : '' }}">
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $n->title }}</td>
                            <td>{{ $n->message }}</td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ ucfirst($n->type) }}
                                </span>
                            </td>
                            <td>
                                @if($n->is_read)
                                    <span class="badge bg-success">Dibaca</span>
                                @else
                                    <span class="badge bg-warning text-dark">Belum Dibaca</span>
                                @endif
                            </td>
                            <td>{{ $n->created_at->format('d M Y H:i') }}</td>
                            <td class="text-center">
                                @if(!$n->is_read)
                                <form action="{{ route('notifikasi.read', $n->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-success rounded-pill">
                                        Tandai Dibaca
                                    </button>
                                </form>
                                @endif

                                <form action="{{ route('notifikasi.destroy', $n->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus notifikasi ini?')"
                                        class="btn btn-sm btn-outline-danger rounded-pill">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada notifikasi
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
