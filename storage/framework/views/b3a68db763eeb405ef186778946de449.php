<?php $__env->startSection('title', 'Sign Up Siswa'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-5">
    <h3 class="mb-3">Sign Up Siswa</h3>
    <form method="POST" action="<?php echo e(route('siswa.register.submit')); ?>" class="card card-body shadow-sm">
      <?php echo csrf_field(); ?>
      <div class="mb-3">
        <label class="form-label">Nama lengkap</label>
        <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">NIS</label>
        <input type="text" name="nis" class="form-control" value="<?php echo e(old('nis')); ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Kelas</label>
        <input type="text" name="kelas" class="form-control" value="<?php echo e(old('kelas')); ?>" placeholder="Contoh: XII RPL 1" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Jenis kelamin</label>
        <select name="gender" class="form-select" required>
          <option value="" disabled <?php echo e(old('gender') ? '' : 'selected'); ?>>Pilih jenis kelamin</option>
          <option value="Laki-laki" <?php if(old('gender') === 'Laki-laki'): echo 'selected'; endif; ?>>Laki-laki</option>
          <option value="Perempuan" <?php if(old('gender') === 'Perempuan'): echo 'selected'; endif; ?>>Perempuan</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Jurusan</label>
        <select name="jurusan" class="form-select" required>
          <option value="" disabled <?php echo e(old('jurusan') ? '' : 'selected'); ?>>Pilih jurusan</option>
          <option value="TJKT" <?php if(old('jurusan') === 'TJKT'): echo 'selected'; endif; ?>>TJKT</option>
          <option value="TEI" <?php if(old('jurusan') === 'TEI'): echo 'selected'; endif; ?>>TEI</option>
          <option value="TITL" <?php if(old('jurusan') === 'TITL'): echo 'selected'; endif; ?>>TITL</option>
          <option value="AKL" <?php if(old('jurusan') === 'AKL'): echo 'selected'; endif; ?>>AKL</option>
          <option value="TP" <?php if(old('jurusan') === 'TP'): echo 'selected'; endif; ?>>TP</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Kata sandi</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Konfirmasi kata sandi</label>
        <input type="password" name="password_confirmation" class="form-control" required>
      </div>
      <div class="d-grid">
        <button class="btn btn-primary" type="submit">Daftar</button>
      </div>
    </form>
    <p class="mt-3">Sudah punya akun? <a href="<?php echo e(route('siswa.login')); ?>">Login</a></p>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.siswa', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SOLIT\OneDrive\Siperdi Project\SiPerdi project\siperdi-laravel-full\resources\views/siswa/auth/register.blade.php ENDPATH**/ ?>