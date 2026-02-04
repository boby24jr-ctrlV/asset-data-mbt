<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-warning text-white rounded-top-4">
                    <h5 class="mb-0">✏ Edit Jadwal Maintenance</h5>
                </div>

                <div class="card-body">

                    <form action="<?php echo e(route('maintenance.update',$maintenance->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Barang</label>
                            <select name="item_id" class="form-select" required>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"
                                        <?php echo e($maintenance->item_id == $item->id ? 'selected' : ''); ?>>
                                        <?php echo e($item->nama_barang); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jenis Maintenance</label>
                            <input type="text" name="jenis_maintenance"
                                   class="form-control"
                                   value="<?php echo e($maintenance->jenis_maintenance); ?>"
                                   placeholder="Service, Cuci, Pengecekan" required>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Interval (hari)</label>
                                <input type="number" name="interval_hari"
                                       class="form-control"
                                       value="<?php echo e($maintenance->interval_hari); ?>" required>
                            </div>

                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Tanggal Terakhir</label>
                                <input type="date" name="last_maintenance"
                                       class="form-control"
                                       value="<?php echo e($maintenance->last_maintenance); ?>">
                            </div>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" class="form-select">
                                <option value="dijadwalkan" <?php echo e($maintenance->status=='dijadwalkan'?'selected':''); ?>>
                                    Dijadwalkan
                                </option>
                                <option value="proses" <?php echo e($maintenance->status=='proses'?'selected':''); ?>>
                                    Proses
                                </option>
                                <option value="selesai" <?php echo e($maintenance->status=='selesai'?'selected':''); ?>>
                                    Selesai
                                </option>
                            </select>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Catatan</label>
                            <textarea name="catatan" rows="3" class="form-control"
                                      placeholder="Catatan tambahan..."><?php echo e($maintenance->catatan); ?></textarea>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="<?php echo e(route('maintenance.index')); ?>"
                               class="btn btn-secondary rounded-pill px-4">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-warning rounded-pill px-4 text-white">
                                💾 Update Data
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt-pikram-branch\resources\views/maintenance/edit.blade.php ENDPATH**/ ?>