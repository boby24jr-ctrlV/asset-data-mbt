<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Edit Barang</h3>

    <form action="<?php echo e(route('items.update',$item->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <input type="text" name="nama_barang" value="<?php echo e($item->nama_barang); ?>" class="form-control mb-2">
        <input type="text" name="kategori" value="<?php echo e($item->kategori); ?>" class="form-control mb-2">
        <input type="text" name="lokasi" value="<?php echo e($item->lokasi); ?>" class="form-control mb-2">

        <select name="kondisi" class="form-control mb-2">
            <option value="baik" <?php echo e($item->kondisi=='baik'?'selected':''); ?>>Baik</option>
            <option value="rusak" <?php echo e($item->kondisi=='rusak'?'selected':''); ?>>Rusak</option>
            <option value="maintenance" <?php echo e($item->kondisi=='maintenance'?'selected':''); ?>>Maintenance</option>
        </select>

        <textarea name="catatan" class="form-control mb-2"><?php echo e($item->catatan); ?></textarea>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt-pikram-branch\resources\views/items/edit.blade.php ENDPATH**/ ?>