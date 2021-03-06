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
                
                <?php if(count($admins) > 0): ?>
                <div class="students-table">
                    <table class="table table-striped">
                        <thead class=""> 
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                
                                <th scope="col">Phone</th>
                                <th scope="col">Pic</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <a href="/User/<?php echo e($admin->user->id); ?>/edit"><?php echo e($admin->user->name ?? '---'); ?></a></td>
                                    <td><?php echo e($admin->user->name ?? '---'); ?></td>
                                    <td><?php echo e($admin->user->email ?? '---'); ?></td>
                                    
                                    
                                    
                                    <td><?php echo e($admin->phone ?? '---'); ?></td>
                                    <td>
                                        <div class="col-md-6 col-sm-6">
                                            <img src="/storage/cover_image/<?php echo e($admin->user->cover_image); ?>" alt="" wisth="40" height="40">
                                        </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/admin/admins.blade.php ENDPATH**/ ?>