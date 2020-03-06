<!-- Name Field -->
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <span class="help-block text-danger">
            {{ $errors -> first('name') }}
        </span>
    </div>
</div>

<!-- Email Field -->
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email Address', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        <span class="help-block text-danger">
            {{ $errors -> first('email') }}
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
</div>
