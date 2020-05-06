@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 col-sm-2">
            <img src="/storage/cover_image/{{$user->cover_image}}" alt="" width="200" height="200">
        </div>
        <div class="col-md-4 col-sm-2 ml-3">
            <h1>{{ $user->name ?? '---' }}</h1>
        </div>
    </div>
    
    <hr/>

    {!! Form::model($user, ['method' => 'POST', 'route' => ['User.update', Auth::user()->id], 'class' => 'form-horizontal', 'role' => 'form' , 'enctype' => "multipart/form-data"]) !!}
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
