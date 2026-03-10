<?php $__env->startSection('title', 'Kelola Buku'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h4 class="mb-0">Kelola Buku</h4>
    <p class="text-muted mb-0">Tambah, ubah, hapus, dan perbarui stok buku.</p>
  </div>
  <a class="btn btn-primary" href="<?php echo e(route('admin.books.create')); ?>">Tambah Buku</a>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th>Kode</th>
            <th>Kelas</th>
            <th>Judul</th>
            <th>Penerbit</th>
            <th>Thn Datang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Status</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td><?php echo e($book->code ?? '-'); ?></td>
              <td><?php echo e($book->class ?? '-'); ?></td>
              <td><?php echo e($book->title); ?></td>
              <td><?php echo e($book->publisher ?? '-'); ?></td>
              <td><?php echo e($book->arrival_year ?? '-'); ?></td>
              <td><?php echo e($book->category ?? '-'); ?></td>
              <td><?php echo e($book->stock); ?></td>
              <td>
                <span class="badge <?php echo e($book->is_available ? 'bg-success' : 'bg-secondary'); ?>">
                  <?php echo e($book->is_available ? 'Tersedia' : 'Habis'); ?>

                </span>
              </td>
              <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="<?php echo e(route('admin.books.edit', $book)); ?>">Edit</a>
                <form method="POST" action="<?php echo e(route('admin.books.destroy', $book)); ?>" class="d-inline"
                      onsubmit="return confirm('Hapus buku ini?')">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" class="text-center">Belum ada data buku.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SOLIT\OneDrive\Siperdi Project\SiPerdi project\siperdi-laravel-full\resources\views/admin/books/index.blade.php ENDPATH**/ ?>