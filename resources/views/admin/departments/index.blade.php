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
<div class="departments">

    <!-- add dept -->
    <div class="modal fade" id="addDeptModal" tabindex="-1" role="dialog" aria-labelledby="addDeptModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDeptModalLabel">
                        Add New Department
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="inputs" action="{{ action('DepartmentsController@store') }}" method="POST">
                    @csrf
                    <!-- @if (isset($level))
                        @method('PUT')
                    @endif -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="level">Department Name:</label>
                            <input
                                class="@error('department') is invalid @enderror form-control"
                                type="text"
                                id="department"
                                name="department"
                                placeholder="Add a new department"
                                value="{{ isset($department) ? $department->department : '' }}"
                            >
                            @error('department')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit level -->
    <!-- @foreach ($departments as $department)
        <div class="modal fade" id="updateDeptModal" tabindex="-1" role="dialog" aria-labelledby="updateDeptModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="inputs" action="{{ action('DepartmentsController@update', $department->id) }}" method="POST">
                        @csrf
                        @if (isset($department))
                            @method('PUT')
                        @endif
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="level">Update department</label>
                                <input
                                    class="@error('department') is invalid @enderror form-control"
                                    type="text"
                                    id="department"
                                    name="department"
                                    placeholder="Update department"
                                    value="{{$department->department}}"
                                >
                                @error('department')
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
        <h3 class="text-center text-uppercase">Manage Departments</h3>
          <form action="{{ url("/delete-departments") }}" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-12 mb-3">
                    <button type="button" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#deleteDeptModal">
                        Delete Selected
                    </button>
                    <div class="modal fade" id="deleteDeptModal" tabindex="-1" role="dialog" aria-labelledby="deleteDeptModalLabel" aria-hidden="true">
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

                    <!-- add dept pop-up here -->
                    <button type="button" class="btn btn-primary ml-2 add-btn btn-sm mb-3" data-toggle="modal" data-target="#addDeptModal">
                        Add Department
                    </button>
                </div>
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Department Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <td scope="row">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input selectbox"
                                                type="checkbox"
                                                value="{{$department->id}}"
                                                name="delid[]"
                                            />
                                        <div>
                                    </td>
                                    <td><span>{{ $department->id }}</span></td>
                                    <td><a type="button" href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary add-btn btn-sm">{{ $department->department }}</a></td>
                                    <!-- <td>
                                        <button type="button" class="btn btn-primary add-btn btn-sm" data-toggle="modal" data-target="#updateDeptModal">
                                            {{ $department->department }}
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
