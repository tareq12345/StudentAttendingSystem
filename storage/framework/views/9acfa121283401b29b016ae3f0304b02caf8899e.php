<?php $__env->startSection('content'); ?>
<div class="department">
    <div class="container">
        <h3 class="text-center text-uppercase">
            <?php echo e(isset($department) ? 'Update Department' : 'Add New Department'); ?>

        </h3>
        <form class="inputs" action="<?php echo e(isset($department) ? route('departments.update', $department->id) : route('departments.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(isset($department)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="form-group">
                <label for="department">Department Name:</label>
                <input
                    class="<?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control"
                    type="text"
                    id="department"
                    name="department"
                    placeholder="Add a new department"
                    value="<?php echo e(isset($department) ? $department->dept_name : ''); ?>"
                >
                <?php $__errorArgs = ['department'];
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
                <button class="btn btn-success text-uppercase btn-sm"><?php echo e(isset($department) ? 'Update Department' : 'Add Department'); ?></button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/admin/departments/create.blade.php ENDPATH**/ ?>