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
                @if(is_array($courses) || is_object($courses))
                    @foreach ($courses as $item)
                        @if(count($item->students) > 0)
                            <h1>this shit works</h1>
                        @endif
                    @endforeach
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
                                    {{-- <td>{{data_get($course, 'students.user.email', '---') }}</td> --}}
                                    {{-- <td>{{$item->user->phone ?? '---'}}</td> --}}
                                    {{-- <td>{{$item->pivot->course_id}}</td> --}}
                                    <td>{{$professor->courses[0]->course_name ?? '---'}}</td>
                                    <td>{{$professor->qualification ?? '---'}}</td>
                                    <td>
                                        <div class="col-md-6 col-sm-6">
                                            <img src="/storage/cover_image/{{$professor->user->cover_image}}" alt="" wisth="20" height="20">
                                        </div>
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