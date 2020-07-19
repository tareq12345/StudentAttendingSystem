<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-2 col-sm-2">
            <img src="/storage/cover_image/<?php echo e($user->cover_image); ?>" alt="" width="200" height="200">
        </div>
        <div class="col-md-2 col-sm-2 ml-3">
            <h1><?php echo e($user->name ?? '---'); ?></h1>
        </div>
    </div>
    
    <hr/>

    <?php echo Form::model($user, ['method' => 'POST', 'route' => ['User.update', $user->id], 'class' => 'form-horizontal', 'role' => 'form' , 'enctype' => "multipart/form-data"]); ?>

        <?php echo $__env->make('users._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- submit button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <?php echo e(Form::hidden('_method','PUT')); ?>

                <?php echo Form::submit('Update', ['class' => 'btn btn-primary']); ?>

                <a href="<?php echo e(url('/home')); ?>" class="btn btn-default">Cancel</a>
            </div>
        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/users/profile.blade.php ENDPATH**/ ?>