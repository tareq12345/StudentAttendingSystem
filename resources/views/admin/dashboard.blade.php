@extends('layouts.app')

@section('content')
<div class="admin-dashboard">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-6">
                <img src="/img/admin.jpg" class="rounded" width="100" height="100" alt="Admin-pic" draggable="false" />
                <span class="ml-2">Hello, adminName</span>
            </div> --}}
            {{-- <div class="col-md-6 text-right">
                <p>Last login at 2:00 PM Yesterday</p>
            </div> --}}
        </div>

        <div class="admin-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="admin-list">
                        <div class="list-group">
                            <a href="/admin" class="list-group-item list-group-item-action text-uppercase">Manage Students</a>
                            <a href="/professors" class="list-group-item list-group-item-action text-uppercase">Manage Professors</a>
                            <a href="/courses" class="list-group-item list-group-item-action text-uppercase">Assign Courses</a>
                            <a href="{{ route('User.edit', \Auth::user()->id) }}" class="list-group-item list-group-item-action text-uppercase">Edit profile</a>
                            <a href="/admin/create" class="list-group-item list-group-item-action text-uppercase">Create Course</a>
                            <a href="/admins" class="list-group-item list-group-item-action text-uppercase">Manage Admins</a>
                            <a href="/student/create" class="list-group-item list-group-item-action text-uppercase">Create Students</a>
                            <a href="#" class="list-group-item list-group-item-action text-uppercase">Manage Levels</a>
                            <a href="qr-code-g" class="list-group-item list-group-item-action text-uppercase">Manage Qr Code</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="statistics">
                        <div class="row">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Admins</h5>
                                        <p class="card-text">{{count($admins)}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Students</h5>
                                        <p class="card-text">{{count($students)}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Professors</h5>
                                        <p class="card-text">{{count($professors)}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Courses</h5>
                                        <p class="card-text">{{count($courses)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
