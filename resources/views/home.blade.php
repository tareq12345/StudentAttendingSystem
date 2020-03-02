@extends('layouts.app')

@section('content')
<div class="container">
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
                    <a href="/toDos/create" class="btn = btn-primary">Create ToDo</a>
                    <h3 class="mt-2">Your ToDos</h3>
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>title</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->name}}</td>
                                <td>{{$post->status->type}}</td>
                                <td><a href="/toDos/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['ToDosController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}                                  
                                </td>
                            </tr>
                        @endforeach
                    </table> 
                    @else
                    <p>You Have no ToDos</p>                  
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
