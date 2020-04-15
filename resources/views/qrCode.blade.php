@extends('layouts.app')

@section('content')   
<div class="visible-print text-center">
	<h1>Laravel 5.7 - QR Code Generator Example</h1>
     
    {!! QrCode::size(250)->generate($course->course_name); !!}
     
    <p>example by ItSolutionStuf.com.</p>
</div>
@endsection