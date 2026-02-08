<?php $__env->startSection('content'); ?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
        <h4 class="card-title mb-0 fw-bold">📦 Data Barang</h4>
        <a href="<?php echo e(route('items.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Barang
        </a>
    </div>

    <div class="card-body">

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Lokasi</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                        <td class="fw-semibold"><?php echo e($item->kode_barang); ?></td>
                        <td><?php echo e($item->nama_barang); ?></td>
                        <td><span class="badge bg-secondary"><?php echo e($item->kategori); ?></span></td>
                        <td><?php echo e($item->merk ?? '-'); ?></td>
                        <td><?php echo e($item->lokasi); ?></td>
                        <td>
                            <?php if($item->kondisi == 'baik'): ?>
                                <span class="badge bg-success">Baik</span>
                            <?php elseif($item->kondisi == 'rusak'): ?>
                                <span class="badge bg-danger">Rusak</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark">Maintenance</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($item->status_pemakaian == 'aktif'): ?>
                                <span class="badge bg-primary">Aktif</span>
                            <?php else: ?>
                                <span class="badge bg-dark">Nonaktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="<?php echo e(route('items.show',$item->id)); ?>" class="btn btn-sm btn-info">Detail</a>
                                <a href="<?php echo e(route('items.edit',$item->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <button onclick="confirmDelete(<?php echo e($item->id); ?>)" class="btn btn-sm btn-danger">Hapus</button>
                            </div>

                            <form id="delete-form-<?php echo e($item->id); ?>" action="<?php echo e(route('items.destroy',$item->id)); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted py-5">Data barang belum tersedia</td>
                    </tr>
                <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>

<script>
function confirmDelete(id){
    if(confirm('Yakin ingin menghapus data barang ini?')){
        document.getElementById('delete-form-'+id).submit();
    }
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt\resources\views/items/index.blade.php ENDPATH**/ ?>