@extends('layouts.app')

@section('content')
    <!-- view attendance -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
               
                
                @if(count($courses) > 0)
                <div class="students-table">
                    <table class="table table-striped">
                        <thead class=""> 
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Department</th>
                                <th scope="col">Assign to a student</th>
                                <th scope="col">Assign to a professor</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                                <tr>
                                    <td> {{$course->course_name ?? '---'}}</td>
                                    <td> {{$course->course_name ?? '---'}}</td>
                                    {{-- <td> <a href="/User/{{$professor->user->id}}/edit">{{$course->course_name ?? '---'}}</a></td> --}}
                                    <td>{{$course->level->level_name ?? '---'}}</td>
                                    <td>{{$course->department->dept_name ?? '---'}}</td>

                                    <td>{{$professor->courses[0]->course_name ?? '---'}}</td>
                                    <td>{{$professor->qualification ?? '---'}}</td>
                                    <td>
                                        <div class="col-md-6 col-sm-6">
                                            <img src="/storage/cover_image/{{$professor->user->cover_image}}" alt="" wisth="20" height="20">
                                        </div>
                                    </td>
                                    <td>
                                    {!!Form::open(['action' => ['AdminController@assignCourse', $course->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        <div>
                                        <input id="student_email" type="email" class="form-control @error('email') is-invalid @enderror" name="student_email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                        @error('student_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <input id="professor_email" type="email" class="form-control @error('email') is-invalid @enderror" name="professor_email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                        @error('professor_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                              
                                        {{Form::submit('Assign', ['class' => 'btn btn-primary'])}}
                                    {!!Form::close()!!}
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>there is no courses</p>                  
                @endif
            </div>
        </div>
    </div>
</div>
@endsection