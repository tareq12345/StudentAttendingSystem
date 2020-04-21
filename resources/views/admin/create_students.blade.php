@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Student') }}</div>

                <div class="card-body">
                    <form action='UserController@store' method="POST" enctype="multipart/form-data">
                        {{ method_field('POST') }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="cover_image">Select Image:</label>
                            <div class="col-md-6">
                            <input type="file" id="cover_image" name="cover_image">
                            </div>                           
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="gender">Male:</label>
                            <div class="col-md-6">
                            <input type="radio" id="gender" name="gender" value="male">
                            </div>                           
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="gender">Female:</label>
                            <div class="col-md-6">
                                <input type="radio" id="gender" name="gender" value="female">
                            </div>                           
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="date_of_birth">Select Date:</label>
                            
                            <div class="col-md-6">
                                <input type="date" id="date_of_birth" name="date_of_birth"> 
                            </div>                            
                        </div>

                        <div class="form-group row">
                            <!-- {{Form::label('adress','Address')}} -->
                            <label  class="col-md-4 col-form-label text-md-right" for="adress">Address</label>
                            <div class="col-md-6">
                                <!-- {{Form::textarea('adress','',[ 'placeholder' => 'adress'])}} -->
                                <textarea class="form-control" id="adress" rows="3"></textarea>
                            </div>    
                         </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
