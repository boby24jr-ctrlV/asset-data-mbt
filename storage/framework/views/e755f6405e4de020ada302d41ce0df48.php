<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-semibold mb-0">🔧 Data Repair</h4>
                <a href="<?php echo e(route('repairs.create')); ?>" class="btn btn-primary rounded-pill px-4">
                    + Tambah Repair
                </a>
            </div>

            
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Tanggal Rusak</th>
                            <th>Status</th>
                            <th>Biaya</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $repairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>

                            <td class="fw-semibold">
                                <?php echo e($repair->item->nama_barang); ?>

                            </td>

                            <td><?php echo e($repair->tanggal_rusak); ?></td>

                            <td>
                                <?php if($repair->status == 'selesai'): ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php elseif($repair->status == 'proses'): ?>
                                    <span class="badge bg-warning text-dark">Proses</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Dilaporkan</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php echo e($repair->biaya ? 'Rp '.number_format($repair->biaya,0,',','.') : '-'); ?>

                            </td>

                            <td class="text-center">
                                <a href="<?php echo e(route('repairs.show', $repair->id)); ?>"
                                   class="btn btn-outline-info btn-sm rounded-pill">
                                    Detail
                                </a>

                                <a href="<?php echo e(route('repairs.edit', $repair->id)); ?>"
                                   class="btn btn-outline-warning btn-sm rounded-pill">
                                    Edit
                                </a>

                                <form action="<?php echo e(route('repairs.destroy', $repair->id)); ?>"
                                      method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button onclick="return confirm('Yakin hapus data repair ini?')"
                                            class="btn btn-outline-danger btn-sm rounded-pill">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada data repair
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

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt-pikram-branch\resources\views/repairs/index.blade.php ENDPATH**/ ?>