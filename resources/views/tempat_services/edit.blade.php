<form action="{{ route('tempat-services.update', $tempatService->id) }}" method="POST">
@csrf
@method('PUT')

<input name="nama_tempat" value="{{ $tempatService->nama_tempat }}" class="form-control mb-2">
<input name="alamat" value="{{ $tempatService->alamat }}" class="form-control mb-2">
<input name="no_telepon" value="{{ $tempatService->no_telepon }}" class="form-control mb-2">

<button class="btn btn-primary">Update</button>
</form>
