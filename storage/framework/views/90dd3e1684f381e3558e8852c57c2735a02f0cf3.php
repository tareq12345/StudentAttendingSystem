<?php $__env->startSection('content'); ?>
    <h1>Edit Post</h1>
    <?php echo Form::open(['action' => ['ToDosController@update', $post->id] , 'method' => 'POST']); ?>

        <div class="form-group">
            <?php echo e(Form::label('title','title')); ?>

            <?php echo e(Form::text('title',$post->name,['class' => 'form-control' , 'placeholder' => 'title'])); ?>

        </div>

        <div class="form-group">
            <?php echo e(Form::label('status','complete')); ?>

            <?php echo e(Form::radio('status',1)); ?>

            <?php echo e(Form::label('status','pending')); ?>

            <?php echo e(Form::radio('status', 2)); ?>

         </div>

         <?php echo e(Form::hidden('_method','PUT')); ?>

         <?php echo e(Form::Submit('Submit',['class' => 'btn btn-primary'])); ?>   
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/todos/edit.blade.php ENDPATH**/ ?>