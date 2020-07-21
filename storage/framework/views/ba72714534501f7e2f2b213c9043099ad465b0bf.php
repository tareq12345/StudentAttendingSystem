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
<div class="departments">

    <!-- add dept -->
    <div class="modal fade" id="addDeptModal" tabindex="-1" role="dialog" aria-labelledby="addDeptModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDeptModalLabel">
                        Add New Department
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="inputs" action="<?php echo e(action('DepartmentsController@store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <!-- <?php if(isset($level)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?> -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="level">Department Name:</label>
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
                                value="<?php echo e(isset($department) ? $department->department : ''); ?>"
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit level -->
    <!-- <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="updateDeptModal" tabindex="-1" role="dialog" aria-labelledby="updateDeptModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="inputs" action="<?php echo e(action('DepartmentsController@update', $department->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($department)): ?>
                            <?php echo method_field('PUT'); ?>
                        <?php endif; ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="level">Update department</label>
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
                                    placeholder="Update department"
                                    value="<?php echo e($department->department); ?>"
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
        <h3 class="text-center text-uppercase">Manage Departments</h3>
          <form action="<?php echo e(url("/delete-departments")); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <button type="button" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#deleteDeptModal">
                        Delete Selected
                    </button>
                    <div class="modal fade" id="deleteDeptModal" tabindex="-1" role="dialog" aria-labelledby="deleteDeptModalLabel" aria-hidden="true">
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

                    <!-- add dept pop-up here -->
                    <button type="button" class="btn btn-primary ml-2 add-btn btn-sm mb-3" data-toggle="modal" data-target="#addDeptModal">
                        Add Department
                    </button>
                </div>
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Department Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td scope="row">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input selectbox"
                                                type="checkbox"
                                                value="<?php echo e($department->id); ?>"
                                                name="delid[]"
                                            />
                                        <div>
                                    </td>
                                    <td><span><?php echo e($department->id); ?></span></td>
                                    <td><a type="button" href="<?php echo e(route('departments.edit', $department->id)); ?>" class="btn btn-primary add-btn btn-sm"><?php echo e($department->department); ?></a></td>
                                    <!-- <td>
                                        <button type="button" class="btn btn-primary add-btn btn-sm" data-toggle="modal" data-target="#updateDeptModal">
                                            <?php echo e($department->department); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/admin/departments/index.blade.php ENDPATH**/ ?>