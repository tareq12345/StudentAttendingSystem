<?php $__env->startSection('content'); ?>
   <h1>Create Course</h1>
   <?php echo Form::open(['action' => 'AdminController@store' , 'method' => 'POST']); ?>

      <div class="form-group row col-sm-3">
         <?php echo e(Form::label('course_name','Course mame')); ?>

         <?php echo e(Form::text('course_name','',['class' => 'form-control' , 'placeholder' => 'name'])); ?>

      </div>

      <div class="form-group row col-sm-3">
         <?php echo e(Form::label('course_level','Course level')); ?>

         <?php echo e(Form::select('course_level', ['1' => 'Level 1', '2' => 'Level 2', '3' => 'Level 3'], 'S',['class' => 'form-control'])); ?>

      </div>

      <div class="form-group row col-sm-3">
        <?php echo e(Form::label('course_dept','Course department')); ?>

        <?php echo e(Form::select('course_dept', ['1' => 'Information system', '2' => 'Computer science', '3' => 'Information technology'], 'S',['class' => 'form-control'])); ?>

     </div>

     
      <div>
      <?php echo e(Form::Submit('Submit',['class' => 'btn btn-primary'])); ?>

      </div>
   <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/admin/create_courses.blade.php ENDPATH**/ ?>