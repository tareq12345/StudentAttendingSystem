<?php $__env->startSection('content'); ?>
    <!-- view attendance -->
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Students</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                <?php if(is_array($courses) || is_object($courses)): ?>
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($item->students) > 0): ?>
                            <h1>this shit works</h1>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if(count($courses) > 0): ?>
                <div class="students-table">
                    <table class="table table-striped">
                        <thead class="">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                
                                <th scope="col">Course name</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $course->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->user->name ?? '---'); ?></td>
                                    <td><?php echo e($item->user->name ?? '---'); ?></td>
                                    <td><?php echo e($item->user->email ?? '---'); ?></td>
                                    
                                    
                                    
                                    <td><?php echo e($course->course_name ?? '---'); ?></td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                    <p>You Have no students</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\GP\GP_K\StudentAttendingSystem\resources\views/professor/view-attendance.blade.php ENDPATH**/ ?>