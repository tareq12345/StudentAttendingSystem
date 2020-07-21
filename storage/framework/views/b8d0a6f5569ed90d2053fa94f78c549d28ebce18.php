<?php $__env->startSection('content'); ?>   
<div class="visible-print text-center">
	<h1>Laravel 5.7 - QR Code Generator Example</h1>
     
    <?php echo QrCode::size(250)->generate($course->course_name);; ?>

     
    <p>example by ItSolutionStuf.com.</p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/qrCode.blade.php ENDPATH**/ ?>