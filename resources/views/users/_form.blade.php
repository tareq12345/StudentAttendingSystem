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

@if (Auth::user()->role_id == 2 || $user->role_id == 2)
    <div class="form-group{{ $errors->has('qualification') ? ' has-error' : '' }}">
        {!! Form::label('qualification', 'Qualification', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('qualification', $user->userable->qualification, ['class' => 'form-control']) !!}
            <span class="help-block text-danger">
                {{ $errors -> first('qualification') }}
            </span>
        </div>
    </div>
@endif

@if (Auth::user()->role_id == 1 && $user->role->id == 1)
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        {!! Form::label('phone', 'Phone', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('phone', Auth::user()->userable->phone, ['class' => 'form-control']) !!}
            <span class="help-block text-danger">
                {{ $errors -> first('phone') }}
            </span>
        </div>
    </div>
@endif

<div class="form-group row col-sm-6">
    <label class="" for="cover_image">Select a file:</label>
    <input type="file" id="cover_image" name="cover_image">                           
</div>

<div class="mb-2">Select gender:</div>
<div class="form-group row col-sm-6">
    <label class="" for="gender">male:</label>
    <input type="radio" id="gender" name="gender" value="male">                           
</div>

<div class="form-group row col-sm-6">
    <label class="" for="gender">female:</label>
    <input type="radio" id="gender" name="gender" value="female">                           
</div>