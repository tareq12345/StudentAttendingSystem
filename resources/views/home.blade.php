@extends('layouts.app')

@section('content')
    <!-- Professor's Home -->
    <div class="professor-home">
        <div class="container">
            <div class="heading">
                <h4 class="text-uppercase text-center">Professor Dashboard</h4>
            </div>
            <div class="home-content text-center">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a class="" href="{{ route('User.edit', \Auth::user()->id) }}">Manage Profile</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="/doctor">Manage Student</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="/doctor/create">Manage Courses</a>
                    </div>
                    <!-- <div class="col-md-3 col-sm-6">
                        <a href="qr-code.html">Manage QR code</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
@endsection
