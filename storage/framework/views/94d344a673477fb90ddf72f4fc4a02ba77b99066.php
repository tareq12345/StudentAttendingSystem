<?php $__env->startSection('content'); ?>
<div class="admin-dashboard">
    <div class="container">
        <div class="row">
            
            
        </div>

        <div class="admin-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="admin-list">
                        <div class="list-group">
                            <a href="/admin" class="list-group-item list-group-item-action text-uppercase">Manage Students</a>
                            <a href="/professors" class="list-group-item list-group-item-action text-uppercase">Manage Professors</a>
                            <a href="/courses" class="list-group-item list-group-item-action text-uppercase">Manage Courses</a>
                            <a href="<?php echo e(route('User.edit', \Auth::user()->id)); ?>" class="list-group-item list-group-item-action text-uppercase">Edit profile</a>
                            <a href="/admin/create" class="list-group-item list-group-item-action text-uppercase">Manage Attendance</a>
                            <a href="/admins" class="list-group-item list-group-item-action text-uppercase">Manage Admins</a>
                            <a href="/User/create" class="list-group-item list-group-item-action text-uppercase">Manage Departments</a>
                            <a href="#" class="list-group-item list-group-item-action text-uppercase">Manage Levels</a>
                            <a href="qr-code-g" class="list-group-item list-group-item-action text-uppercase">Manage Qr Code</a>
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