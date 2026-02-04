

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-semibold mb-0">📜 Riwayat Maintenance</h4>
                <a href="<?php echo e(route('maintenance.histories.create')); ?>" class="btn btn-primary rounded-pill px-4">
                    + Tambah Riwayat
                </a>
            </div>

            <?php if(session('success')): ?>
                <div class="alert alert-success rounded-3">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Jenis</th>
                            <th>Tanggal Service</th>
                            <th>Teknisi</th>
                            <th>Biaya</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td class="fw-semibold"><?php echo e($h->maintenanceSchedule->item->nama_barang); ?></td>
                            <td>
                                <span class="badge bg-secondary">
                                    <?php echo e($h->maintenanceSchedule->jenis_maintenance); ?>

                                </span>
                            </td>
                            <td><?php echo e($h->tanggal_service); ?></td>
                            <td><?php echo e($h->technician->name ?? '-'); ?></td>
                            <td>Rp <?php echo e(number_format($h->biaya,0,',','.')); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('maintenance.histories.show',$h->id)); ?>"
                                   class="btn btn-outline-info btn-sm rounded-pill">Detail</a>

                                <a href="<?php echo e(route('maintenance.histories.edit',$h->id)); ?>"
                                   class="btn btn-outline-warning btn-sm rounded-pill">Edit</a>

                                <form action="<?php echo e(route('maintenance.histories.destroy',$h->id)); ?>"
                                      method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button onclick="return confirm('Yakin hapus?')"
                                        class="btn btn-outline-danger btn-sm rounded-pill">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada riwayat maintenance
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt-pikram-branch\resources\views/maintenance_histories/index.blade.php ENDPATH**/ ?>