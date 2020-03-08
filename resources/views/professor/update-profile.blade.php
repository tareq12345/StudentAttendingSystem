@extends('layouts.app')

@section('name')
       <!-- Update professor profile -->
       <div class="update-profile">
        <div class="container">
            <div class="heading">
                <h4 class="text-uppercase text-left">Update Profile</h4>
            </div>
            <div class="profile-fields">
                <form class="inputs" action="test.php" method="post">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 form-group">
                            <input class="form-control" type="text" placeholder="Full Name">
                        </div>
                        <div class="col-md-3 col-sm-6 form-group">
                            <input class="form-control" type="text" placeholder="Date of birth">
                        </div>
                        <div class="col-md-3 col-sm-6 form-group">
                            <input class="form-control" type="email" placeholder="Email">
                        </div>
                        <div class="col-md-3 col-sm-6 form-group">
                            <input class="form-control" type="number" placeholder="Phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 form-group">
                            <input class="form-control" type="text" placeholder="Qualifications">
                        </div>
                        <div class="col-md-3 col-sm-6 form-group">
                            <input class="form-control" type="file" placeholder="Upload image">
                        </div>
                    </div>
                    <button class="text-uppercase">Update</button>
                </form>
            </div>

            <h4 class="text-uppercase text-left">Change password</h4>
            <div class="profile-password">
                <form class="inputs" action="test.php" method="post">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 form-group">
                            <input class="form-control" type="password" placeholder="Old password">
                        </div>
                        <div class="col-md-3 col-sm-6 form-group">
                            <input class="form-control" type="password" placeholder="New password">
                        </div>
                        <div class="col-md-3 col-sm-6 form-group">
                            <input class="form-control" type="password" placeholder="Confirm new password">
                        </div>
                    </div>
                    <button class="text-uppercase">Change</button>
                </form>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
@endsection