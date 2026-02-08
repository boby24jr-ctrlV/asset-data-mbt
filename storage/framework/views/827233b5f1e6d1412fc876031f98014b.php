<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>🔍 Detail Repair</h3>

    <ul class="list-group">
        <li class="list-group-item"><b>Barang:</b>  <?php echo e($repair->item?->nama_barang ?? 'Item tidak ditemukan'); ?></li>
        <li class="list-group-item"><b>Pelapor:</b> <?php echo e($repair->user->name); ?></li>
        <li class="list-group-item"><b>Tanggal Rusak:</b> <?php echo e($repair->tanggal_rusak); ?></li>
        <li class="list-group-item"><b>Status:</b> <?php echo e($repair->status); ?></li>
        <li class="list-group-item"><b>Biaya:</b> <?php echo e($repair->biaya ?? '-'); ?></li>
        <li class="list-group-item"><b>Tanggal Selesai:</b> <?php echo e($repair->tanggal_selesai ?? '-'); ?></li>
        <li class="list-group-item"><b>Catatan:</b> <?php echo e($repair->catatan ?? '-'); ?></li>
        <li class="list-group-item"><b>Deskripsi:</b> <?php echo e($repair->deskripsi_kerusakan); ?></li>
    </ul>

    <a href="<?php echo e(route('repairs.index')); ?>" class="btn btn-secondary mt-3">Kembali</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt\resources\views/repairs/show.blade.php ENDPATH**/ ?>