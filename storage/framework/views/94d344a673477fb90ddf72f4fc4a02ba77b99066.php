<?php $__env->startSection('content'); ?>
<div class="admin-dashboard">
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6 text-left">
                <img src="/storage/cover_image/<?php echo e(auth()->user()->cover_image); ?>" class="rounded" width="100" height="100" alt="Admin-pic" draggable="false" />
                <span class="ml-2">Hello, <?php echo e(Auth::user()->name); ?></span>
            </div>
            <div class="col-md-6 text-right">
                <p>Last login at 2:00 PM Yesterday</p>
            </div>
        </div>       

        <div class="admin-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="admin-list">
                        <div class="list-group">
                            <a href="/admin" class="list-group-item list-group-item-action text-uppercase">Manage Students</a>
                            <a href="/users" class="list-group-item list-group-item-action text-uppercase">Manage Users</a>
                            <a href="/professors" class="list-group-item list-group-item-action text-uppercase">Manage Professors</a>
                            <a href="/courses" class="list-group-item list-group-item-action text-uppercase">Assign Courses</a>
                            <a href="<?php echo e(route('User.edit', \Auth::user()->id)); ?>" class="list-group-item list-group-item-action text-uppercase">Edit profile</a>
                            <a href="/course" class="list-group-item list-group-item-action text-uppercase">Create Course</a>
                            <a href="/admins" class="list-group-item list-group-item-action text-uppercase">Manage Admins</a>
                            <a href="/student/create" class="list-group-item list-group-item-action text-uppercase">Create Students</a>
                            <a href="<?php echo e(route('departments.index')); ?>" class="list-group-item list-group-item-action text-uppercase">Departments</a>
                            <a href="<?php echo e(route('levels.index')); ?>" class="list-group-item list-group-item-action text-uppercase">Levels</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="statistics">
                        <div class="row">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Admins</h5>
                                        <p class="card-text"><?php echo e(count($admins)); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Students</h5>
                                        <p class="card-text"><?php echo e(count($students)); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Professors</h5>
                                        <p class="card-text"><?php echo e(count($professors)); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Courses</h5>
                                        <p class="card-text"><?php echo e(count($courses)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>