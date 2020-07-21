@extends('layouts.app')

@section('content')
<div class="level">
    <div class="container">
        <h3 class="text-center text-uppercase">
            {{ isset($level) ? 'Update Level' : 'Add New Level' }}
        </h3>
        <form class="inputs" action="{{ isset($level) ? route('levels.update', $level->id) : route('levels.store') }}" method="POST">
            @csrf
            @if (isset($level))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="level">Level Name:</label>
                <input
                    class="@error('level') is invalid @enderror form-control"
                    type="number"
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
            <div class="">
                <button class="btn btn-success text-uppercase btn-sm">{{ isset($level) ? 'Update Level' : 'Add Level' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
