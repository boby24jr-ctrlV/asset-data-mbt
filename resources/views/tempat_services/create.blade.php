<form action="{{ route('tempat-services.store') }}" method="POST">
@csrf

<input name="nama_tempat" placeholder="Nama Tempat" class="form-control mb-2">
<input name="alamat" placeholder="Alamat" class="form-control mb-2">
<input name="no_telepon" placeholder="No Telepon" class="form-control mb-2">

<button class="btn btn-success">Simpan</button>
</form>
