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
                
                <?php if(count($students) > 0): ?>
                <div class="students-table">
                    <table class="table table-striped">
                        <thead class=""> 
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                
                                <th scope="col">Course name</th>
                                <th scope="col">Pic</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <a href="/User/<?php echo e($student->user->id); ?>/edit"><?php echo e($student->user->name ?? '---'); ?></a></td>
                                    <td><?php echo e($student->user->name ?? '---'); ?></td>
                                    <td><?php echo e($student->user->email ?? '---'); ?></td>
                                    
                                    
                                    
                                    <td><?php echo e($student->courses[0]->course_name ?? '---'); ?></td>
                                    <td>
                                        <div class="col-md-6 col-sm-6">
                                            <img src="/storage/cover_image/<?php echo e($student->user->cover_image); ?>" alt="" wisth="20" height="20">
                                        </div>
                                    </td>
                                   <td>
                                   <?php echo Form::open(['action' => ['AdminController@destroy', $student->id], 'method' => 'DELETE', 'class' => 'pull-right']); ?>

                                        <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                        <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger'])); ?>

                                   <?php echo Form::close(); ?>

                                   </td>
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <p>there is no students</p>                  
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/admin/students.blade.php ENDPATH**/ ?>