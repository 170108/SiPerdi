<?php $__env->startSection('title', 'Dashboard Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="row gy-3">
  <div class="col-md-3">
    <div class="card shadow-sm border-warning border-2">
      <div class="card-body text-center">
        <p class="text-muted mb-1">Menunggu Verifikasi</p>
        <h3 class="fw-bold text-warning"><?php echo e($pendingStudents); ?></h3>
        <div class="mt-2">
          <a class="btn btn-sm btn-outline-warning" href="<?php echo e(route('admin.students.pending')); ?>">Review sekarang</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <p class="text-muted mb-1">Siswa Terdaftar</p>
        <h3 class="fw-bold"><?php echo e($totalStudents); ?></h3>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <p class="text-muted mb-1">Judul Buku</p>
        <h3 class="fw-bold"><?php echo e($totalBooks); ?></h3>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <p class="text-muted mb-1">Total Stok</p>
        <h3 class="fw-bold"><?php echo e($totalStock); ?></h3>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <p class="text-muted mb-1">Pinjaman Aktif</p>
        <h3 class="fw-bold"><?php echo e($activeLoans); ?></h3>
      </div>
    </div>
  </div>
</div>

<div class="card shadow-sm mt-4">
  <div class="card-body d-flex justify-content-between align-items-center">
    <div>
      <h5 class="card-title mb-1">Kelola Buku</h5>
      <p class="text-muted mb-0">Tambah, edit, hapus, dan update stok buku.</p>
    </div>
    <a class="btn btn-primary" href="<?php echo e(route('admin.books.index')); ?>">Masuk Kelola Buku</a>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SOLIT\OneDrive\Siperdi Project\SiPerdi project\siperdi-laravel-full\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>