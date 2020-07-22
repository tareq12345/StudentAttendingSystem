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
<div class="levels">
    <!-- add level -->
    <div class="modal fade" id="addLevelModal" tabindex="-1" role="dialog" aria-labelledby="addLevelModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLevelModalLabel">
                        Add New Level
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="inputs" action="{{ action('LevelsController@store') }}" method="POST">
                    @csrf
                    <!-- @if (isset($level))
                        @method('PUT')
                    @endif -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="level">Level Name:</label>
                            <input
                                class="@error('level') is invalid @enderror form-control"
                                type="text"
                                id="level"
                                name="level"
                                placeholder="Add a new Level"
                                value="{{ isset($level) ? $level->level : '' }}"
                            >
                            @error('level')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Level</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit level -->
    <!-- @foreach ($levels as $level)
        <div class="modal fade" id="updateLevelModal" tabindex="-1" role="dialog" aria-labelledby="updateLevelModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="inputs" action="{{ action('LevelsController@update', $level->id) }}" method="POST">
                        @csrf
                        @if (isset($level))
                            @method('PUT')
                        @endif
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="level">Update Level</label>
                                <input
                                    class="@error('level') is invalid @enderror form-control"
                                    type="number"
                                    id="level"
                                    name="level"
                                    placeholder="Update Level"
                                    value="{{$level->level}}"
                                >
                                @error('level')
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
        <h3 class="text-center text-uppercase">Manage Levels</h3>
          <form action="{{ url("/delete-levels") }}" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-12">
                    <!-- <button type="submit" class="btn btn-danger btn-sm mb-3" onclick="return confirm('Are you sure you want to delete?')">Delete Selected</button> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#deleteLevelModal">
                        Delete Selected
                    </button>
                    <div class="modal fade" id="deleteLevelModal" tabindex="-1" role="dialog" aria-labelledby="deleteLevelModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary ml-2 add-btn btn-sm mb-3" data-toggle="modal" data-target="#addLevelModal">
                        Add Level
                    </button>

                </div>
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Level Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($levels as $level)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input selectbox"
                                                type="checkbox"
                                                value="{{$level->id}}"
                                                name="delid[]"
                                            />
                                        <div>
                                    </td>
                                    <td><span>{{ $level->id }}</span></td>
                                    <td><a type="button" href="{{ route('levels.edit', $level->id) }}" class="btn btn-primary add-btn btn-sm">{{ $level->level }}</a></td>
                                    <!-- <td>
                                        <button type="button" class="btn btn-primary add-btn btn-sm" data-toggle="modal" data-target="#updateLevelModal">
                                            {{ $level->level }}
                                        </button>
                                    </td> -->
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

