<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <h3 class="mt-2">Your Courses</h3>
                    <?php if(count($courses) >  0): ?>
                    <table class="table table-striped">
                        <tr>
                            <th>title</th>
                            <th>level</th>
                            <th>department</th>
                            <th>QR Code</th>
                            <th>date</th>
                        </tr>
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($course->course_name); ?></td>
                                <td><?php echo e($course->level->level_name); ?></td>
                                <td><?php echo e($course->department->dept_name ?? '---'); ?></td>
                                <td><a href="qr-code-g/<?php echo e($course->course_name); ?>" class="">Generate QR Code</a></td>
                                
                                <td><?php echo e($course->lectures[0]->lec_time ?? '---'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table> 
                    <?php else: ?>
                    <p>You Have no courses</p>                  
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/professor/courses.blade.php ENDPATH**/ ?>