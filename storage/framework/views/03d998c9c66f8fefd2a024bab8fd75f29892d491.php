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

<?php if(Auth::user()->role_id == 2 || $user->role_id == 2): ?>
    <div class="form-group<?php echo e($errors->has('qualification') ? ' has-error' : ''); ?>">
        <?php echo Form::label('qualification', 'Qualification', ['class' => 'col-sm-3 control-label']); ?>

        <div class="col-sm-3">
            <?php echo Form::text('qualification', $user->userable->qualification, ['class' => 'form-control']); ?>

            <span class="help-block text-danger">
                <?php echo e($errors -> first('qualification')); ?>

            </span>
        </div>
    </div>
<?php endif; ?>

<?php if(Auth::user()->role_id == 1 && $user->role->id == 1): ?>
    <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
        <?php echo Form::label('phone', 'Phone', ['class' => 'col-sm-3 control-label']); ?>

        <div class="col-sm-3">
            <?php echo Form::text('phone', Auth::user()->userable->phone, ['class' => 'form-control']); ?>

            <span class="help-block text-danger">
                <?php echo e($errors -> first('phone')); ?>

            </span>
        </div>
    </div>
<?php endif; ?>



<div class="form-group">
    <label class="col-sm-3 control-label " for="cover_image">Select a file:</label>
    <div class="col-sm-3">
        <input class="form-control " type="file" id="cover_image" name="cover_image"> 
    </div>                          
</div>

<div class="form-group">
    <label class="col-sm-3 control-label " for="gender">Select gender:</label>
    <div class="col-sm-1">
    <label class="" for="gender">male:</label>
        <input class="" type="radio" id="gender" name="gender" value="male"> 
    </div>                          
</div>


<div class="form-group">
    <div class="col-sm-3">
    <label class="" for="gender">female:</label>
        <input class="" type="radio" id="gender" name="gender" value="female"> 
    </div>                          
</div>

<!-- <div class="mb-2">Select gender:</div>
<div class="form-group row col-sm-6">
    <label class="" for="gender">male:</label>
    <input type="radio" id="gender" name="gender" value="male">                           
</div>

<div class="form-group row col-sm-6">
    <label class="" for="gender">female:</label>
    <input type="radio" id="gender" name="gender" value="female">                           
</div> -->
<?php /**PATH C:\laragon\www\gapp\resources\views/users/_form.blade.php ENDPATH**/ ?>
