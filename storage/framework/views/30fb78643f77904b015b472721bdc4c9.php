<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">🏢 Data Tempat Service</h4>
        <a href="<?php echo e(route('tempat_services.create')); ?>" class="btn btn-primary btn-sm">
            + Tambah Tempat Service
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
                        <th>Nama Tempat</th>
                        <th>Alamat</th>
                        <th style="width:160px">No Telepon</th>
                        <th style="width:180px" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $tempatServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                        <td class="fw-semibold"><?php echo e($item->nama_tempat); ?></td>
                        <td><?php echo e($item->alamat); ?></td>
                        <td><?php echo e($item->no_telepon); ?></td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="<?php echo e(route('tempat_services.edit', $item->id)); ?>"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="<?php echo e(route('tempat_services.destroy', $item->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button onclick="return confirm('Hapus data?')"
                                            class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Data tempat service belum tersedia
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt\resources\views/tempat_services/index.blade.php ENDPATH**/ ?>