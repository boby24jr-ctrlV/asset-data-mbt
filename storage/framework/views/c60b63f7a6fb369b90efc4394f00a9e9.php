<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-semibold mb-0">🛠 Jadwal Maintenance</h4>
                <a href="<?php echo e(route('maintenance.create')); ?>" class="btn btn-primary rounded-pill px-4">
                    + Tambah Jadwal
                </a>
            </div>

            
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="alert alert-warning rounded-3">
                        <b>Mendekati Jadwal:</b> <?php echo e($mendekati->count()); ?> data
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-danger rounded-3">
                        <b>Terlambat:</b> <?php echo e($terlambat->count()); ?> data
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Jenis</th>
                            <th>Interval</th>
                            <th>Last</th>
                            <th>Next</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $maintenances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td class="fw-semibold"><?php echo e($m->item->nama_barang); ?></td>
                            <td>
                                <span class="badge bg-secondary"><?php echo e($m->jenis_maintenance); ?></span>
                            </td>
                            <td><?php echo e($m->interval_hari); ?> hari</td>
                            <td><?php echo e($m->last_maintenance); ?></td>
                            <td><?php echo e($m->next_maintenance); ?></td>
                            <td>
                                <?php if($m->status == 'selesai'): ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php elseif($m->status == 'proses'): ?>
                                    <span class="badge bg-warning text-dark">Proses</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Dijadwalkan</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo e(route('maintenance.edit',$m->id)); ?>" class="btn btn-outline-warning btn-sm rounded-pill">
                                    Edit
                                </a>

                                <form action="<?php echo e(route('maintenance.destroy',$m->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-outline-danger btn-sm rounded-pill">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                Belum ada data maintenance
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

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt-pikram-branch\resources\views/maintenance/index.blade.php ENDPATH**/ ?>