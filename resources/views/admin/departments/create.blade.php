@extends('layouts.app')

@section('content')
<div class="department">
    <div class="container">
        <h3 class="text-center text-uppercase">
            {{ isset($department) ? 'Update Department' : 'Add New Department' }}
        </h3>
        <form class="inputs" action="{{ isset($department) ? route('departments.update', $department->id) : route('departments.store') }}" method="POST">
            @csrf
            @if (isset($department))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="department">Department Name:</label>
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
            <div class="">
                <button class="btn btn-success text-uppercase btn-sm">{{ isset($department) ? 'Update Department' : 'Add Department' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
