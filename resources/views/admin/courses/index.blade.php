@extends('layouts.app')

@section('content')
@if (session()->has('success'))
    <div class="container">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    </div>
@endif
@if (session()->has('danger'))
    <div class="container">
        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div>
    </div>
@endif
<div class="courses">

    <!-- add course -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">
                        Add New Course
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="inputs" action="{{ action('CoursesController@store') }}" method="POST">
                    @csrf
                    <!-- @if (isset($level))
                        @method('PUT')
                    @endif -->
                    <div class="modal-body">
                        <div class="form-group">
                            <input
                                class="@error('name') is invalid @enderror form-control mb-2"
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Course Name"
                                value="{{ isset($course) ? $course->name : '' }}"
                            >
                            @error('name')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        @php $input = "level_id"; @endphp
                        <div class="form-group">
                            <select name="levelID" class="@error('level_id') is invalid @enderror form-control mb-2">
                                <option value="">Select level</option>
                                @foreach($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach
                            </select>
                            @error('levelID')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        @php $input = "department_id"; @endphp
                        <div class="form-group">
                            <select name="departmentID" class="@error('department_id') is invalid @enderror form-control mb-2">
                                <option value="">Select department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{$department->department}}</option>
                                @endforeach
                            </select>
                            @error('departmentID')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                                class="@error('qr-code') is invalid @enderror form-control mb-2"
                                type="text"
                                id="qrcode"
                                name="qrcode"
                                placeholder="Generate QR code"
                                value="{{ isset($course) ? $course->qrcode : '' }}"
                            >
                            @error('qrcode')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                                class="@error('course-date') is invalid @enderror form-control mb-2"
                                type="date"
                                id="coursedate"
                                name="coursedate"
                                placeholder="Course date"
                                value="{{ isset($course) ? $course->coursedate : '' }}"
                            >
                            @error('coursedate')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit course -->
    <!-- @foreach ($courses as $course)
        <div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="updateCourseModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="inputs" action="{{ action('CoursesController@update', $course->id) }}" method="POST">
                        @csrf
                        @if (isset($course))
                            @method('PUT')
                        @endif
                        <div class="modal-body">
                            <div class="form-group">
                                <input
                                    class="@error('name') is invalid @enderror form-control mb-2"
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Course Name"
                                    value="{{ isset($course) ? $course->name : '' }}"
                                >
                                @error('name')
                                    <div class="alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            @php $input = "level_id"; @endphp
                            <div class="form-group">
                                <select name="levelID" class="@error('level_id') is invalid @enderror form-control mb-2">
                                    <option value="">Select level</option>
                                    @foreach($levels as $level)
                                        <option value="{{ $level->id }}" {{ isset($course) && $course->{$input} == $level->id ? 'selected' : '' }}>{{ $level->level }}</option>
                                    @endforeach
                                </select>
                                @error('levelID')
                                    <div class="alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            @php $input = "department_id"; @endphp
                            <div class="form-group">
                                <select name="departmentID" class="@error('department_id') is invalid @enderror form-control mb-2">
                                    <option value="">Select department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ isset($course) && $course->{$input} == $department->id ? 'selected' : '' }}>{{$department->department}}</option>
                                    @endforeach
                                </select>
                                @error('departmentID')
                                    <div class="alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input
                                    class="@error('qr-code') is invalid @enderror form-control mb-2"
                                    type="text"
                                    id="qrcode"
                                    name="qrcode"
                                    placeholder="Generate QR code"
                                    value="{{ isset($course) ? $course->qrcode : '' }}"
                                >
                                @error('qrcode')
                                    <div class="alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input
                                    class="@error('course-date') is invalid @enderror form-control mb-2"
                                    type="date"
                                    id="coursedate"
                                    name="coursedate"
                                    placeholder="Course date"
                                    value="{{ isset($course) ? $course->coursedate : '' }}"
                                >
                                @error('coursedate')
                                    <div class="alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach -->

    <div class="container">
        <h3 class="text-center text-uppercase">Manage Courses</h3>
          <form action="{{ url("/delete-courses") }}" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="mb-4 col-md-12">
                    <button type="button" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#deleteCourseModal">
                        Delete Selected
                    </button>
                    <div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="deleteCourseModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Are you sure you want to delete?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Sure!</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- add level pop-up here -->
                    <!-- <a href="{{ route('levels.create') }}" class="btn btn-primary ml-2 add-btn btn-sm mb-3">Add Level</a> -->
                    <button type="button" class="btn btn-primary ml-2 add-btn btn-sm mb-3" data-toggle="modal" data-target="#addCourseModal">
                        Add Course
                    </button>
                </div>
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Department</th>
                                <th scope="col">Assign a student</th>
                                <th scope="col">Assign a professor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input selectbox"
                                                type="checkbox"
                                                value="{{$course->id}}"
                                                name="delid[]"
                                            />
                                        <div>
                                    </td>
                                    <td>{{ $course->id }}</td>
                                    <td>
                                        <a type="button" href="{{ route('course.edit', $course->id) }}" class="btn btn-primary add-btn btn-sm">{{ $course->course_name }}</a>
                                    </td>
                                    <!-- <td>
                                        <button type="button" class="btn btn-primary add-btn btn-sm" data-toggle="modal" data-target="#updateCourseModal">
                                            {{ $course->course_name }}
                                        </button>
                                    </td> -->
                                    <td>
                                        @php $input = "level_id"; @endphp
                                        @foreach ($levels as $level)
                                            @if(isset($course) && $course->{$input}== $level->id)
                                                <span>{{ $level->level }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @php $input = "department_id"; @endphp
                                        @foreach ($departments as $department)
                                            @if(isset($course) && $course->{$input}== $department->id)
                                                <span>{{ $department->department }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route('assignCourse', $course->id) }}" method="POST">
                                            <div class="form-group">
                                                <input value="{{ old('email') }}" name="student_email" type="email" class="form-control" placeholder="Enter student email">
                                            </div>
                                            {{Form::submit('Assign', ['class' => 'btn btn-primary'])}}
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('assignCourse', $course->id) }}" method="POST">
                                            <div class="form-group">
                                                <input id="professor_email" type="email" class="form-control @error('email') is-invalid @enderror" name="professor_email" value="{{ old('email') }}" class="form-control" placeholder="Enter professor email">
                                            </div>
                                            {{Form::submit('Assign', ['class' => 'btn btn-primary'])}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div> 
@endsection
