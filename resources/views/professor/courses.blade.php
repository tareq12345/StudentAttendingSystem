@extends('layouts.app')

@section('name')
     <!-- courses -->
     <div class="courses">
        <div class="container">
            <div class="heading">
                <h4 class="text-uppercase text-left">Courses</h4>
            </div>
            <div class="courses-table">
                <table class="table">
                    <thead class="thead-dark"> 
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Level</th>
                            <th scope="col">Department</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>K!M</th>
                            <td>IA</td>
                            <td>Monday 10</td>
                            <td>3</td>
                            <td>
                                <a href="qr-code.html">Generate QR code</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    


    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
@endsection