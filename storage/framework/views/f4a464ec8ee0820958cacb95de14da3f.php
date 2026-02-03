<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">📦 Data Barang</h4>
        <a href="<?php echo e(route('items.create')); ?>" class="btn btn-primary btn-sm">
            + Tambah Barang
        </a>
    </div>

    <div class="card-body">

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="thead-light">
                    <tr>
                        <th style="width:60px" class="text-center">No</th>
                        <th>Nama Barang</th>
                        <th style="width:140px">Kategori</th>
                        <th style="width:160px">Lokasi</th>
                        <th style="width:120px">Kondisi</th>
                        <th class="text-center" style="width:180px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                        <td class="fw-semibold"><?php echo e($item->nama_barang); ?></td>
                        <td>
                            <span class="badge badge-secondary">
                                <?php echo e($item->kategori); ?>

                            </span>
                        </td>
                        <td><?php echo e($item->lokasi); ?></td>
                        <td>
                            <?php if($item->kondisi == 'Baik'): ?>
                                <span class="badge badge-success">Baik</span>
                            <?php elseif($item->kondisi == 'Rusak'): ?>
                                <span class="badge badge-danger">Rusak</span>
                            <?php else: ?>
                                <span class="badge badge-warning">Perlu Cek</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <a href="<?php echo e(route('items.show', $item->id)); ?>"
                               class="btn btn-outline-info btn-sm rounded-pill">
                                Detail
                            </a>

                            <a href="<?php echo e(route('items.edit', $item->id)); ?>"
                               class="btn btn-outline-warning btn-sm rounded-pill">
                                Edit
                            </a>

                            <form action="<?php echo e(route('items.destroy', $item->id)); ?>"
                                  method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button onclick="return confirm('Yakin hapus data barang ini?')"
                                        class="btn btn-outline-danger btn-sm rounded-pill">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Data barang belum tersedia
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt-pikram-branch\resources\views/items/index.blade.php ENDPATH**/ ?>