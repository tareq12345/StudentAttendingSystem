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
                
                @if(count($admins) > 0)
                <div class="students-table">
                    <table class="table table-striped">
                        <thead class=""> 
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Phone</th> --}}
                                <th scope="col">Phone</th>
                                <th scope="col">Pic</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                                <tr>
                                    <td> <a href="/User/{{$admin->user->id}}/edit">{{$admin->user->name ?? '---'}}</a></td>
                                    <td>{{$admin->user->name ?? '---'}}</td>
                                    <td>{{$admin->user->email ?? '---'}}</td>
                                    {{-- <td>{{data_get($course, 'students.user.email', '---') }}</td> --}}
                                    {{-- <td>{{$item->user->phone ?? '---'}}</td> --}}
                                    {{-- <td>{{$item->pivot->course_id}}</td> --}}
                                    <td>{{$admin->phone ?? '---'}}</td>
                                    <td>
                                        <div class="col-md-6 col-sm-6">
                                            <img src="/storage/cover_image/{{$admin->user->cover_image}}" alt="" wisth="40" height="40">
                                        </div>
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