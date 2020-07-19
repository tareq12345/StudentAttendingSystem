@extends('layouts.app')

@section('content')
   <h1>Create Course</h1>
   {!! Form::open(['action' => 'AdminController@store' , 'method' => 'POST']) !!}
      <div class="form-group row col-sm-3">
         {{Form::label('course_name','Course mame')}}
         {{Form::text('course_name','',['class' => 'form-control' , 'placeholder' => 'name'])}}
      </div>

      <div class="form-group row col-sm-3">
         {{Form::label('course_level','Course level')}}
         {{Form::select('course_level', ['1' => 'Level 1', '2' => 'Level 2', '3' => 'Level 3'], 'S',['class' => 'form-control'])}}
      </div>

      <div class="form-group row col-sm-3">
        {{Form::label('course_dept','Course department')}}
        {{Form::select('course_dept', ['1' => 'Information system', '2' => 'Computer science', '3' => 'Information technology'], 'S',['class' => 'form-control'])}}
     </div>

     {{-- <div class="form-group">
        {{Form::label('course_dat','Course dat')}}
        {{Form::select('course_dat', ['1' => 'Large', 'S' => 'Small'], 'S')}}
     </div>

     <div class="form-group row col-sm-6">
        <label class="" for="course_date">Select a date:</label>
        <input type="date" id="course_date" name="course_date">                           
    </div> --}}

      {{Form::Submit('Submit',['class' => 'btn btn-primary'])}}
    
   {!! Form::close() !!}
@endsection