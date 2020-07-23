<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'QR Code')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main>
            <?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(auth()->guard()->check()): ?>
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="professor-list">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action text-uppercase" href="<?php echo e(route('User.edit', \Auth::user()->id)); ?>">Manage Profile</a>
                                    <a class="list-group-item list-group-item-action text-uppercase" href="/doctor">Manage Student</a>
                                    <a class="list-group-item list-group-item-action text-uppercase" href="/doctor/create">Manage Courses</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    <div>
                </div>
            <?php else: ?>
                <div class="col-md-12">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH E:\GP\GP_K\StudentAttendingSystem\resources\views/layouts/app.blade.php ENDPATH**/ ?>