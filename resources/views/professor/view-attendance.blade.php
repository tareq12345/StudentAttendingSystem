@extends('layouts.app')

@section('content')
    <!-- view attendance -->
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Students</div>

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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Phone</th> --}}
                                <th scope="col">Course name</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            @foreach ($course->students as $item)
                                <tr>
                                    <td>{{$item->user->name ?? '---'}}</td>
                                    <td>{{$item->user->name ?? '---'}}</td>
                                    <td>{{$item->user->email ?? '---'}}</td>
                                    {{-- <td>{{data_get($course, 'students.user.email', '---') }}</td> --}}
                                    {{-- <td>{{$item->user->phone ?? '---'}}</td> --}}
                                    {{-- <td>{{$item->pivot->course_id}}</td> --}}
                                    <td>{{$course->course_name ?? '---'}}</td>

                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p>You Have no students</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
