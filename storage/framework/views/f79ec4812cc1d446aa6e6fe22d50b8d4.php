<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <!-- Header Card -->
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body py-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h3 class="mb-1 fw-bold" style="font-size:1.25rem"><?php echo e($item->nama_barang); ?></h3>
                            <p class="text-muted mb-0" style="font-size:0.85rem">
                                <i class="fas fa-box me-1"></i>Detail Informasi Barang
                            </p>
                        </div>
                        <div>
                            <?php if($item->kondisi == 'Baik'): ?>
                                <span class="badge bg-success" style="font-size:0.75rem">
                                    <i class="fas fa-check-circle me-1"></i>Baik
                                </span>
                            <?php elseif($item->kondisi == 'Rusak'): ?>
                                <span class="badge bg-danger" style="font-size:0.75rem">
                                    <i class="fas fa-times-circle me-1"></i>Rusak
                                </span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark" style="font-size:0.75rem">
                                    <i class="fas fa-exclamation-circle me-1"></i>Cek
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Information Card -->
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-header bg-white border-0 py-2">
                    <h5 class="mb-0 fw-semibold" style="font-size:1rem">
                        <i class="fas fa-info-circle text-primary me-2"></i>Informasi Detail
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-tag text-primary me-2"></i>
                                    <span>Nama Barang</span>
                                </div>
                                <div class="detail-value"><?php echo e($item->nama_barang); ?></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-folder text-primary me-2"></i>
                                    <span>Kategori</span>
                                </div>
                                <div class="detail-value">
                                    <span class="badge bg-secondary" style="font-size:0.75rem">
                                        <?php echo e($item->kategori); ?>

                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <span>Lokasi</span>
                                </div>
                                <div class="detail-value"><?php echo e($item->lokasi); ?></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-clipboard-check text-primary me-2"></i>
                                    <span>Kondisi</span>
                                </div>
                                <div class="detail-value"><?php echo e($item->kondisi); ?></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="fas fa-sticky-note text-primary me-2"></i>
                                    <span>Catatan</span>
                                </div>
                                <div class="detail-value">
                                    <div class="p-2 bg-light rounded" style="font-size:0.85rem">
                                        <?php echo e($item->catatan ?? '-'); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card shadow-sm border-0">
                <div class="card-body py-2">
                    <div class="d-flex justify-content-between flex-wrap gap-2">
                        <a href="<?php echo e(route('items.index')); ?>" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                        <div class="d-flex gap-2">
                            <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">
                                <i class="fas fa-trash me-1"></i>Hapus
                            </button>
                        </div>
                    </div>

                    <form id="delete-form" 
                          action="<?php echo e(route('items.destroy', $item->id)); ?>" 
                          method="POST" 
                          class="d-none">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
.detail-item {
    padding-bottom: 0.25rem;
}

.detail-label {
    font-size: 0.75rem;
    color: #6c757d;
    margin-bottom: 0.15rem;
    display: flex;
    align-items: center;
}

.detail-value {
    font-size: 0.9rem;
    color: #333;
    padding-left: 1.4rem;
}

@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
    }
}
</style>

<script>
function confirmDelete() {
    if (confirm('Yakin ingin menghapus barang "<?php echo e($item->nama_barang); ?>"?\n\nData yang dihapus tidak dapat dikembalikan!')) {
        document.getElementById('delete-form').submit();
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt-pikram-branch\resources\views/items/show.blade.php ENDPATH**/ ?>