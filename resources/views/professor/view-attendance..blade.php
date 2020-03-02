@extends('layouts.app')

@section('content')
    <!-- view attendance -->
    <div class="view-attendance">
        <div class="container">
            <div class="heading">
                <h4 class="text-uppercase text-left">Attendance</h4>
            </div>
            <div class="attendance-info">
                <h4>Student Information</h4>
                <div class="students-table">
                    <table class="table">
                        <thead class="thead-dark"> 
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Course name</th>
                                <th scope="col">Pic</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>K!M</td>
                                <td>K!m@gmail.com</td>
                                <td>123456677</td>
                                <td>DSS</td>
                                <td>pic here</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="attendance-history">
                <h4>Attendance History</h4>
                <div class="attendance-table">
                    <table class="table">
                        <thead class="thead-dark"> 
                            <tr>
                                <th scope="col">Student Name</th>
                                <th scope="col">Course name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Level</th>
                                <th scope="col">Dept</th>
                                <th scope="col">Student status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>K!M</th>
                                <td>IA</td>
                                <td>Monday 10</td>
                                <td>3</td>
                                <td>IS</td>
                                <td>
                                    <form>
                                        <div class="form-group">
                                            <select class="form-control" id="status">
                                                <option>Present</option>
                                                <option>Absent</option>
                                            </select>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
@endsection