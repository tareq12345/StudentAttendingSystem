<?php $__env->startSection('content'); ?>
    <h1>Create Post</h1>
    <?php echo Form::open(['action' => 'ToDosController@store' , 'method' => 'POST']); ?>

        <div class="form-group">
            <?php echo e(Form::label('title','title')); ?>

            <?php echo e(Form::text('title','',['class' => 'form-control' , 'placeholder' => 'title'])); ?>

        </div>

        <?php echo e(Form::Submit('Submit',['class' => 'btn btn-primary'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/todos/create.blade.php ENDPATH**/ ?>