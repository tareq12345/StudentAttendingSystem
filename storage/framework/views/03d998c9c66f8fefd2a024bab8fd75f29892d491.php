<!-- Name Field -->
<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']); ?>

    <div class="col-sm-6">
        <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

        <span class="help-block text-danger">
            <?php echo e($errors -> first('name')); ?>

        </span>
    </div>
</div>

<!-- Email Field -->
<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
    <?php echo Form::label('email', 'Email Address', ['class' => 'col-sm-3 control-label']); ?>

    <div class="col-sm-6">
        <?php echo Form::text('email', null, ['class' => 'form-control']); ?>

        <span class="help-block text-danger">
            <?php echo e($errors -> first('email')); ?>

        </span>
    </div>
</div>

<div class="form-group row">
    <label class="" for="cover_image">Select a file:</label>
    <input type="file" id="cover_image" name="cover_image">                           
</div>

<div class="form-group row">
    <label class="" for="gender">male:</label>
    <input type="radio" id="gender" name="gender" value="male">                           
</div>

<div class="form-group row">
    <label class="" for="gender">female:</label>
    <input type="radio" id="gender" name="gender" value="female">                           
</div><?php /**PATH C:\laragon\www\gapp\resources\views/users/_form.blade.php ENDPATH**/ ?>