@extends('layouts.app')

@section('content')
   <h1>Edit Post</h1>
   {!! Form::open(['action' => ['PostsController@update', $post->id] , 'method' => 'POST']) !!}
      <div class="form-group">
         {{Form::label('title','title')}}
         {{Form::text('title', $post->title,['class' => 'form-control' , 'placeholder' => 'title'])}}
      </div>

      <div class="form-group">
         {{Form::label('body','body')}}
         {{Form::textarea('body', $post->body,['id' => 'editor', 'class' => 'form-control' , 'placeholder' => 'body'])}}
      </div>

      <div class="form-group">
         {{Form::checkbox('name','value',true)}}
         {{Form::radio('body', $post->body,['id' => 'editor', 'class' => 'form-control' , 'placeholder' => 'body'])}}
      </div>
      {{Form::hidden('_method','PUT')}}
      {{Form::Submit('Submit',['class' => 'btn btn-primary'])}}
    
   {!! Form::close() !!}
@endsection