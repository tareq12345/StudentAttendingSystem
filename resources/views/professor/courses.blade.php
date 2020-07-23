@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Courses</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="mt-2">Your Courses</h3>
                    @if(count($courses) >  0)
                    <table class="table table-striped">
                        <tr>
                            <th>title</th>
                            <th>level</th>
                            <th>department</th>
                            <th>QR Code</th>
                            <th>date</th>
                        </tr>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$course->course_name}}</td>
                                <td>{{$course->level->level_name}}</td>
                                <td>{{$course->department->dept_name ?? '---'}}</td>
                                <td><a href="qr-code-g/{{$course->course_name}}" class="">Generate QR Code</a></td>
                                {{-- <td>{{$post->status->type}}</td> --}}
                                <td>{{$course->lectures[0]->lec_time ?? '---'}}</td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <p>You Have no courses</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
