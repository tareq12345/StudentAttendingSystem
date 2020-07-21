@extends('layouts.app')

@section('content')
<div class="course">
    <div class="container">
        <h3 class="text-center text-uppercase">
            {{ isset($course) ? 'Update Course' : 'Add New Course' }}
        </h3>
        <form class="inputs" action="{{ isset($course) ? route('course.update', $course->id) : route('course.store') }}" method="POST">
            @csrf
            @if (isset($course))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-6">
                    <input
                        class="@error('course_name') is invalid @enderror form-control mb-2"
                        type="text"
                        id="course_name"
                        name="course_name"
                        placeholder="Course Name"
                        value="{{ isset($course) ? $course->course_name : '' }}"
                    >
                    @error('course_name')
                        <div class="alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                @php $input = "level_id"; @endphp
                <div class="col-md-6">
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
                <div class="col-md-6">
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
                {{-- <div class="col-md-6">
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
                <div class="col-md-6">
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
            </div> --}}
            <div class="">
                <button class="btn btn-success text-uppercase btn-sm mt-2">{{ isset($course) ? 'Update Course' : 'Add Course' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
