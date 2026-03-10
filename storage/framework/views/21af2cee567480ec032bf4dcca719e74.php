<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Admin | SiPerdi'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('admin.dashboard')); ?>">SiPerdi Admin</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.books.index')); ?>">Kelola Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.students.pending')); ?>">Verifikasi Siswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.profile.edit')); ?>">Profil</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <span class="text-white"><?php echo e(auth()->user()->name ?? 'Admin'); ?></span>
                    <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mb-5">
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html>
<?php /**PATH C:\Users\SOLIT\OneDrive\Siperdi Project\SiPerdi project\siperdi-laravel-full\resources\views/layouts/admin.blade.php ENDPATH**/ ?>