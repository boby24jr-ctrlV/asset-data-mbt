<?php $__env->startSection('content'); ?>
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
                        <?php $__empty_1 = true; $__currentLoopData = $notifikasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="<?php echo e(!$n->is_read ? 'table-warning' : ''); ?>">
                            <td><?php echo e($loop->iteration); ?></td>
                            <td class="fw-semibold"><?php echo e($n->title); ?></td>
                            <td><?php echo e($n->message); ?></td>
                            <td>
                                <span class="badge bg-secondary">
                                    <?php echo e(ucfirst($n->type)); ?>

                                </span>
                            </td>
                            <td>
                                <?php if($n->is_read): ?>
                                    <span class="badge bg-success">Dibaca</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">Belum Dibaca</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($n->created_at->format('d M Y H:i')); ?></td>
                            <td class="text-center">
                                <?php if(!$n->is_read): ?>
                                <form action="<?php echo e(route('notifikasi.read', $n->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-sm btn-outline-success rounded-pill">
                                        Tandai Dibaca
                                    </button>
                                </form>
                                <?php endif; ?>

                                <form action="<?php echo e(route('notifikasi.destroy', $n->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button onclick="return confirm('Hapus notifikasi ini?')"
                                        class="btn btn-sm btn-outline-danger rounded-pill">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada notifikasi
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

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt-pikram-branch\resources\views/notifikasi/index.blade.php ENDPATH**/ ?>