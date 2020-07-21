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
<div class="users">

    <!-- add user -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">
                        Add New User
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="inputs" action="{{ action('UsersController@store') }}" method="POST">
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
                                placeholder="User Name"
                                value=""
                            >
                            @error('name')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                                class="@error('email') is invalid @enderror form-control mb-2"
                                type="email"
                                id="email"
                                name="email"
                                placeholder="User Email"
                                value=""
                            >
                            @error('email')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                                class="@error('email') is invalid @enderror form-control mb-2"
                                type="password"
                                id="password"
                                name="password"
                                placeholder="User Password"
                                value=""
                            >
                            @error('password')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                                class="@error('phone') is invalid @enderror form-control mb-2"
                                type="number"
                                id="phone"
                                name="phone"
                                placeholder="User Phone"
                                value=""
                            >
                            @error('phone')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        @php $input = "role_id"; @endphp
                        <div class="form-group">
                            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                                <option value="">Select user type</option>
                                <option value="1" {{ isset($user) && $user->{$input} == '1'? 'selected'  :'' }}>Admin</option>
                                <option value="2" {{ isset($user) && $user->{$input} == '2'? 'selected'  :'' }}>Professor</option>
                            </select>
                            @error('userID')
                                <div class="alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="text-center text-uppercase">Manage Users</h3>
          <form action="{{ url("/delete-users") }}" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-12 mb-3">
                    <button type="button" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#deleteUserModal">
                        Delete Selected
                    </button>
                    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
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

                    <!-- add user pop-up here -->
                    <button type="button" class="btn btn-primary ml-2 add-btn btn-sm mb-3" data-toggle="modal" data-target="#addUserModal">
                        Add User
                    </button>
                </div>
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">User Phone</th>
                                <th scope="col">User Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input selectbox"
                                                type="checkbox"
                                                value="{{$user->id}}"
                                                name="delid[]"
                                            />
                                        <div>
                                    </td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role->role_name }}</td>
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
