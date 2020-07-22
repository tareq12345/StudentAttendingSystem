<?php $__env->startSection('content'); ?>
<?php if(session()->has('success')): ?>
    <div class="container">
        <div class="alert alert-success">
            <?php echo e(session()->get('success')); ?>

        </div>
    </div>
<?php endif; ?>
<?php if(session()->has('danger')): ?>
    <div class="container">
        <div class="alert alert-danger">
            <?php echo e(session()->get('danger')); ?>

        </div>
    </div>
<?php endif; ?>
<div class="levels">
    <!-- add level -->
    <div class="modal fade" id="addLevelModal" tabindex="-1" role="dialog" aria-labelledby="addLevelModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLevelModalLabel">
                        Add New Level
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="inputs" action="<?php echo e(action('LevelsController@store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <!-- <?php if(isset($level)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?> -->
                    <div class="modal-body">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Level</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit level -->
    <!-- <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="updateLevelModal" tabindex="-1" role="dialog" aria-labelledby="updateLevelModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="inputs" action="<?php echo e(action('LevelsController@update', $level->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($level)): ?>
                            <?php echo method_field('PUT'); ?>
                        <?php endif; ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="level">Update Level</label>
                                <input
                                    class="<?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control"
                                    type="number"
                                    id="level"
                                    name="level"
                                    placeholder="Update Level"
                                    value="<?php echo e($level->level); ?>"
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->

    <div class="container">
        <h3 class="text-center text-uppercase">Manage Levels</h3>
          <form action="<?php echo e(url("/delete-levels")); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row">
                <div class="col-md-12">
                    <!-- <button type="submit" class="btn btn-danger btn-sm mb-3" onclick="return confirm('Are you sure you want to delete?')">Delete Selected</button> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#deleteLevelModal">
                        Delete Selected
                    </button>
                    <div class="modal fade" id="deleteLevelModal" tabindex="-1" role="dialog" aria-labelledby="deleteLevelModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Are you sure you want to delete?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Sure!</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- add level pop-up here -->
                    <!-- <a href="<?php echo e(route('levels.create')); ?>" class="btn btn-primary ml-2 add-btn btn-sm mb-3">Add Level</a> -->
                    <button type="button" class="btn btn-primary ml-2 add-btn btn-sm mb-3" data-toggle="modal" data-target="#addLevelModal">
                        Add Level
                    </button>

                </div>
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Level Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input selectbox"
                                                type="checkbox"
                                                value="<?php echo e($level->id); ?>"
                                                name="delid[]"
                                            />
                                        <div>
                                    </td>
                                    <td><span><?php echo e($level->id); ?></span></td>
                                    <td><a type="button" href="<?php echo e(route('levels.edit', $level->id)); ?>" class="btn btn-primary add-btn btn-sm"><?php echo e($level->level); ?></a></td>
                                    <!-- <td>
                                        <button type="button" class="btn btn-primary add-btn btn-sm" data-toggle="modal" data-target="#updateLevelModal">
                                            <?php echo e($level->level); ?>

                                        </button>
                                    </td> -->
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/admin/levels/index.blade.php ENDPATH**/ ?>