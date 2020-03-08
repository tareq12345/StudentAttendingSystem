<?php $__env->startSection('content'); ?>
    <!-- Professor's Home -->
    <div class="professor-home">
        <div class="container">
            <div class="heading">
                <h4 class="text-uppercase text-center">Professor Dashboard</h4>
            </div>
            <div class="home-content text-center">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href="/update-profile.html">Update profile</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="/view-attendance.html">View Attendance</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="/courses.html">Courses</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="/qr-code.html">QR code</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/professor/professor.blade.php ENDPATH**/ ?>