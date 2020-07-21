<?php $__env->startSection('content'); ?>
    <!-- view attendance -->
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
                                <th scope="col">Course Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Department</th>
                                <th scope="col">Assign to a student</th>
                                <th scope="col">Assign to a professor</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($course->course_name ?? '---'); ?></td>
                                    <td> <?php echo e($course->course_name ?? '---'); ?></td>
                                    
                                    <td><?php echo e($course->level->level_name ?? '---'); ?></td>
                                    <td><?php echo e($course->department->dept_name ?? '---'); ?></td>
                                    
                                    
                                    
                                    <td><?php echo e($professor->courses[0]->course_name ?? '---'); ?></td>
                                    <td><?php echo e($professor->qualification ?? '---'); ?></td>
                                    <td>
                                        <div class="col-md-6 col-sm-6">
                                            <img src="/storage/cover_image/<?php echo e($professor->user->cover_image); ?>" alt="" wisth="20" height="20">
                                        </div>
                                    </td>
                                    <td>
                                    <?php echo Form::open(['action' => ['AdminController@assignCourse', $course->id], 'method' => 'POST', 'class' => 'pull-right']); ?>

                                        <?php echo Form::text('student_email', 'kareemhbendary86@gmail.com', ['class' => 'form-control']); ?>

                                        <span class="help-block text-danger">
                                            <?php echo e($errors -> first('email')); ?>

                                        </span>   
                                        <?php echo Form::text('professor_email', 'kareemhbendary86@gmail.com', ['class' => 'form-control']); ?>

                                        <span class="help-block text-danger">
                                            <?php echo e($errors -> first('email')); ?>

                                        </span>                                     
                                        <?php echo e(Form::submit('Assign', ['class' => 'btn btn-primary'])); ?>

                                    <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <p>there is no courses</p>                  
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/admin/courses.blade.php ENDPATH**/ ?>