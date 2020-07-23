<?php $__env->startSection('content'); ?>
<div class="level">
    <div class="container">
        <h3 class="text-center text-uppercase">
            <?php echo e(isset($level) ? 'Update Level' : 'Add New Level'); ?>

        </h3>
        <form class="inputs" action="<?php echo e(isset($level) ? route('levels.update', $level->id) : route('levels.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(isset($level)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="form-group">
                <label for="level">Level Name:</label>
                <input
                    class="<?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control"
                    type="text"
                    id="level"
                    name="level"
                    placeholder="Add a new Level"
                    value="<?php echo e(isset($level) ? $level->level : ''); ?>"
                >
                <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert-danger">
                        <p><?php echo e($message); ?></p>
                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="">
                <button class="btn btn-success text-uppercase btn-sm"><?php echo e(isset($level) ? 'Update Level' : 'Add Level'); ?></button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/admin/levels/create.blade.php ENDPATH**/ ?>