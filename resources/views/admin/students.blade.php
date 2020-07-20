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
                
                @if(count($students) > 0)
                <div class="students-table">
                    <table class="table table-striped">
                        <thead class=""> 
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Phone</th> --}}
                                <th scope="col">Course name</th>
                                <th scope="col">Pic</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                                <tr>
                                    <td> <a href="/User/{{$student->user->id}}/edit">{{$student->user->name ?? '---'}}</a></td>
                                    <td>{{$student->user->name ?? '---'}}</td>
                                    <td>{{$student->user->email ?? '---'}}</td>
                                    {{-- <td>{{data_get($course, 'students.user.email', '---') }}</td> --}}
                                    {{-- <td>{{$item->user->phone ?? '---'}}</td> --}}
                                    {{-- <td>{{$item->pivot->course_id}}</td> --}}
                                    <td>{{$student->courses[0]->course_name ?? '---'}}</td>
                                    <td>
                                        <div class="col-md-6 col-sm-6">
                                            <img src="/storage/cover_image/{{$student->user->cover_image}}" alt="" wisth="20" height="20">
                                        </div>
                                    </td>
                                   <td>
                                   {!!Form::open(['action' => ['AdminController@destroy', $student->id], 'method' => 'DELETE', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                   {!!Form::close()!!}
                                   </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>there is no students</p>                  
                @endif
            </div>
        </div>
    </div>
</div>
@endsection