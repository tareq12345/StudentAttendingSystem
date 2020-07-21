<?php $__env->startSection('content'); ?>
<?php if(session()->has('success')): ?>
    <div class="container">
        <div class="alert alert-success">
            <?php echo e(session()->get('success')); ?>

        </div>
    </div>
<?php endif; ?>
<?php if(session()->has('danger')): ?>
    <div class="container">
        <div class="alert alert-danger">
            <?php echo e(session()->get('danger')); ?>

        </div>
    </div>
<?php endif; ?>
<div class="courses">

    <!-- add course -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">
                        Add New Course
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="inputs" action="<?php echo e(action('CoursesController@store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <!-- <?php if(isset($level)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?> -->
                    <div class="modal-body">
                        <div class="form-group">
                            <input
                                class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2"
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Course Name"
                                value="<?php echo e(isset($course) ? $course->name : ''); ?>"
                            >
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert-danger">
                                    <p><?php echo e($message); ?></p>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php $input = "level_id"; ?>
                        <div class="form-group">
                            <select name="levelID" class="<?php $__errorArgs = ['level_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2">
                                <option value="">Select level</option>
                                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($level->id); ?>"><?php echo e($level->level); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['levelID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert-danger">
                                    <p><?php echo e($message); ?></p>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php $input = "department_id"; ?>
                        <div class="form-group">
                            <select name="departmentID" class="<?php $__errorArgs = ['department_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2">
                                <option value="">Select department</option>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($department->id); ?>"><?php echo e($department->department); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['departmentID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert-danger">
                                    <p><?php echo e($message); ?></p>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <input
                                class="<?php $__errorArgs = ['qr-code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2"
                                type="text"
                                id="qrcode"
                                name="qrcode"
                                placeholder="Generate QR code"
                                value="<?php echo e(isset($course) ? $course->qrcode : ''); ?>"
                            >
                            <?php $__errorArgs = ['qrcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert-danger">
                                    <p><?php echo e($message); ?></p>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <input
                                class="<?php $__errorArgs = ['course-date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2"
                                type="date"
                                id="coursedate"
                                name="coursedate"
                                placeholder="Course date"
                                value="<?php echo e(isset($course) ? $course->coursedate : ''); ?>"
                            >
                            <?php $__errorArgs = ['coursedate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert-danger">
                                    <p><?php echo e($message); ?></p>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit course -->
    <!-- <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="updateCourseModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="inputs" action="<?php echo e(action('CoursesController@update', $course->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($course)): ?>
                            <?php echo method_field('PUT'); ?>
                        <?php endif; ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <input
                                    class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2"
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Course Name"
                                    value="<?php echo e(isset($course) ? $course->name : ''); ?>"
                                >
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert-danger">
                                        <p><?php echo e($message); ?></p>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <?php $input = "level_id"; ?>
                            <div class="form-group">
                                <select name="levelID" class="<?php $__errorArgs = ['level_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2">
                                    <option value="">Select level</option>
                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($level->id); ?>" <?php echo e(isset($course) && $course->{$input} == $level->id ? 'selected' : ''); ?>><?php echo e($level->level); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['levelID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert-danger">
                                        <p><?php echo e($message); ?></p>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <?php $input = "department_id"; ?>
                            <div class="form-group">
                                <select name="departmentID" class="<?php $__errorArgs = ['department_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2">
                                    <option value="">Select department</option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->id); ?>" <?php echo e(isset($course) && $course->{$input} == $department->id ? 'selected' : ''); ?>><?php echo e($department->department); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['departmentID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert-danger">
                                        <p><?php echo e($message); ?></p>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <input
                                    class="<?php $__errorArgs = ['qr-code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2"
                                    type="text"
                                    id="qrcode"
                                    name="qrcode"
                                    placeholder="Generate QR code"
                                    value="<?php echo e(isset($course) ? $course->qrcode : ''); ?>"
                                >
                                <?php $__errorArgs = ['qrcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert-danger">
                                        <p><?php echo e($message); ?></p>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <input
                                    class="<?php $__errorArgs = ['course-date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2"
                                    type="date"
                                    id="coursedate"
                                    name="coursedate"
                                    placeholder="Course date"
                                    value="<?php echo e(isset($course) ? $course->coursedate : ''); ?>"
                                >
                                <?php $__errorArgs = ['coursedate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert-danger">
                                        <p><?php echo e($message); ?></p>
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->

    <div class="container">
        <h3 class="text-center text-uppercase">Manage Courses</h3>
          <form action="<?php echo e(url("/delete-courses")); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row">
                <div class="mb-4 col-md-12">
                    <button type="button" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#deleteCourseModal">
                        Delete Selected
                    </button>
                    <div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="deleteCourseModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Are you sure you want to delete?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Sure!</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- add level pop-up here -->
                    <!-- <a href="<?php echo e(route('levels.create')); ?>" class="btn btn-primary ml-2 add-btn btn-sm mb-3">Add Level</a> -->
                    <button type="button" class="btn btn-primary ml-2 add-btn btn-sm mb-3" data-toggle="modal" data-target="#addCourseModal">
                        Add Course
                    </button>
                </div>
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Department</th>
                                <th scope="col">Assign a student</th>
                                <th scope="col">Assign a professor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input selectbox"
                                                type="checkbox"
                                                value="<?php echo e($course->id); ?>"
                                                name="delid[]"
                                            />
                                        <div>
                                    </td>
                                    <td><?php echo e($course->id); ?></td>
                                    <td>
                                        <a type="button" href="<?php echo e(route('course.edit', $course->id)); ?>" class="btn btn-primary add-btn btn-sm"><?php echo e($course->course_name); ?></a>
                                    </td>
                                    <!-- <td>
                                        <button type="button" class="btn btn-primary add-btn btn-sm" data-toggle="modal" data-target="#updateCourseModal">
                                            <?php echo e($course->course_name); ?>

                                        </button>
                                    </td> -->
                                    <td>
                                        <?php $input = "level_id"; ?>
                                        <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($course) && $course->{$input}== $level->id): ?>
                                                <span><?php echo e($level->level); ?></span>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php $input = "department_id"; ?>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($course) && $course->{$input}== $department->id): ?>
                                                <span><?php echo e($department->department); ?></span>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <form>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter student email">
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <form>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter professor email">
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gapp\resources\views/admin/courses/index.blade.php ENDPATH**/ ?>