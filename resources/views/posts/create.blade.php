@extends('layouts.app')

@section('content')
   <h1>Create Post</h1>
   {!! Form::open(['action' => 'PostsController@store' , 'method' => 'POST']) !!}
      <div class="form-group">
         {{Form::label('title','title')}}
         {{Form::text('title','',['class' => 'form-control' , 'placeholder' => 'title'])}}
      </div>

      <div class="form-group">
         {{Form::label('body','body')}}
         {{Form::textarea('body','',[ 'class' => 'form-control' , 'placeholder' => 'body'])}}
      </div>

      {{Form::Submit('Submit',['class' => 'btn btn-primary'])}}
    
   {!! Form::close() !!}
@endsection