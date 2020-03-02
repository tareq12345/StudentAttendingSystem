@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <img src="/storage/cover_image/{{$user->cover_image}}" alt="">
        </div>
        <div class="col-md-6 col-sm-6">
            <h1>User Profile</h1>
        </div>
    </div>
    
    <hr/>

    {!! Form::model($user, ['method' => 'POST', 'route' => ['User.update', $user->id], 'class' => 'form-horizontal', 'role' => 'form' , 'enctype' => "multipart/form-data"]) !!}
        @include('users._form')

        <!-- submit button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                {{Form::hidden('_method','PUT')}}
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('/home') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    {!! Form::close() !!}
@endsection