<?php $__env->startSection('content'); ?>
<div class="container py-4">
  <h1 class="mb-3">Verifikasi Akun Siswa</h1>
  <p class="text-muted">Hanya siswa berstatus verified yang bisa login. Setujui atau tolak pendaftaran di sini.</p>

  <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
  <?php endif; ?>

  <?php if($students->isEmpty()): ?>
    <div class="alert alert-info">Tidak ada pendaftaran menunggu.</div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Gender</th>
            <th>Jurusan</th>
            <th>Daftar</th>
            <th class="text-end">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($student->name); ?></td>
              <td><?php echo e($student->email); ?></td>
              <td><?php echo e($student->nis ?? '-'); ?></td>
              <td><?php echo e($student->kelas ?? '-'); ?></td>
              <td><?php echo e($student->gender ?? '-'); ?></td>
              <td><?php echo e($student->jurusan ?? '-'); ?></td>
              <td><?php echo e($student->created_at?->format('d M Y')); ?></td>
              <td class="text-end">
                <form class="d-inline" method="POST" action="<?php echo e(route('admin.students.approve', $student)); ?>">
                  <?php echo csrf_field(); ?>
                  <button class="btn btn-sm btn-success">Setujui</button>
                </form>
                <form class="d-inline" method="POST" action="<?php echo e(route('admin.students.reject', $student)); ?>">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Tolak dan hapus pendaftaran ini?')">Tolak</button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SOLIT\OneDrive\Siperdi Project\SiPerdi project\siperdi-laravel-full\resources\views/admin/students/pending.blade.php ENDPATH**/ ?>