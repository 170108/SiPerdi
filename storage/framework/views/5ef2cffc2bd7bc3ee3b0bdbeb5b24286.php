<?php $__env->startSection('title', 'Login Siswa'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
  <div class="col-md-5">
    <h3 class="mb-3">Login Siswa</h3>
    <form method="POST" action="<?php echo e(route('siswa.login.submit')); ?>" class="card card-body shadow-sm">
      <?php echo csrf_field(); ?>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Kata sandi</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="d-grid">
        <button class="btn btn-primary" type="submit">Masuk</button>
      </div>
    </form>
    <p class="mt-3">Belum punya akun? <a href="<?php echo e(route('siswa.register')); ?>">Daftar</a></p>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.siswa', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SOLIT\OneDrive\Siperdi Project\SiPerdi project\siperdi-laravel-full\resources\views/siswa/auth/login.blade.php ENDPATH**/ ?>