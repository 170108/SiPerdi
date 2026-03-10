<?php $__env->startSection('title', 'Edit Buku'); ?>

<?php $__env->startSection('content'); ?>
<h4 class="mb-3">Edit Buku</h4>
<form method="POST" action="<?php echo e(route('admin.books.update', $book)); ?>" class="card card-body shadow-sm">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>
  <div class="mb-3">
    <label class="form-label">Kode Buku</label>
    <input type="text" name="code" class="form-control" value="<?php echo e(old('code', $book->code)); ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Kelas</label>
    <input type="text" name="class" class="form-control" value="<?php echo e(old('class', $book->class)); ?>" placeholder="10 / 11 / 12 / Umum">
  </div>
  <div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $book->title)); ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Penerbit</label>
    <input type="text" name="publisher" class="form-control" value="<?php echo e(old('publisher', $book->publisher)); ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Tahun Datang</label>
    <input type="number" name="arrival_year" class="form-control" min="1900" max="<?php echo e(date('Y') + 1); ?>" value="<?php echo e(old('arrival_year', $book->arrival_year)); ?>" placeholder="contoh: 2024">
  </div>
  <div class="mb-3">
    <label class="form-label">Kategori (opsional)</label>
    <select name="category" class="form-select">
      <option value="">-- Pilih kategori --</option>
      <option value="pelajaran umum" <?php if(old('category', $book->category) === 'pelajaran umum'): echo 'selected'; endif; ?>>Pelajaran Umum</option>
      <option value="pelajaran jurusan" <?php if(old('category', $book->category) === 'pelajaran jurusan'): echo 'selected'; endif; ?>>Pelajaran Jurusan</option>
      <option value="koleksi" <?php if(old('category', $book->category) === 'koleksi'): echo 'selected'; endif; ?>>Koleksi</option>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Stok</label>
    <input type="number" name="stock" class="form-control" min="0" value="<?php echo e(old('stock', $book->stock)); ?>" required>
  </div>
  <div class="d-flex gap-2">
    <button class="btn btn-primary" type="submit">Simpan</button>
    <a class="btn btn-secondary" href="<?php echo e(route('admin.books.index')); ?>">Batal</a>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SOLIT\OneDrive\Siperdi Project\SiPerdi project\siperdi-laravel-full\resources\views/admin/books/edit.blade.php ENDPATH**/ ?>