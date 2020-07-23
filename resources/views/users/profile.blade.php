@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-md-6 text-left">
            <img src="/storage/cover_image/{{$user->cover_image}}" class="rounded" width="100" height="100" alt="Admin-pic" draggable="false">
            <span class="ml-2">Hello, {{ Auth::user()->name }}</span>
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
