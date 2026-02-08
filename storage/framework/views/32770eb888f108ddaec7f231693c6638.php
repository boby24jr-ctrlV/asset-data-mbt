<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-semibold mb-0">🛠 Tambah Jadwal Maintenance</h4>
                <a href="<?php echo e(route('maintenance.index')); ?>" class="btn btn-secondary rounded-pill px-4">
                    Kembali
                </a>
            </div>

            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('maintenance.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Barang</label>
                        <select name="item_id" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Barang --</option>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama_barang); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Jenis Maintenance</label>
                        <input type="text" name="jenis_maintenance"
                               class="form-control"
                               placeholder="Service, Cuci, Pengecekan" required>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Interval (hari)</label>
                        <input type="number" name="interval_hari"
                               class="form-control"
                               placeholder="Contoh: 30" required>
                    </div>

                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Tanggal Terakhir</label>
                        <input type="date" name="last_maintenance"
                               class="form-control">
                    </div>
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Catatan</label>
                    <textarea name="catatan" rows="3" class="form-control"
                              placeholder="Catatan tambahan..."></textarea>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        💾 Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt\resources\views/maintenance/create.blade.php ENDPATH**/ ?>