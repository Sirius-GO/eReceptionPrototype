<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2><?php echo e(__('messages.create')); ?></h2></div>

                <div class="panel-body">


                    <br>
<div class="row">
	<div class="col-12">
<br>
	    <button class="btn btn-primary text-white btn-sm" onclick="goBack()"> <i class="fa fa-chevron-left"> </i> Go Back</button>
	
	    <script>
	    function goBack() {
	    window.history.go(-1);
	    }
	    </script>
  	</div>
</div>
<?php echo Form::open(['action' => 'RegistrationsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

    <div class="row">
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <?php echo e(Form::label('first_name', 'First Name')); ?>

            <?php echo e(Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First Name (Max 50 Chars)', 'maxlength' => '50', 'required'])); ?>

        </div>
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <?php echo e(Form::label('last_name', 'Last Name')); ?>

            <?php echo e(Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last Name (Max 50 Chars)', 'maxlength' => '50', 'required'])); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-12 col-6-sm col-md-4 col-lg-4 col-xl-4">
            <?php echo e(Form::label('user_level', 'User Level')); ?>

            <?php echo e(Form::select('user_level', array('' => ' -- Select User Level -- ', '10' => 'Super User', '5' => 'Admin User', '1' => 'Staff User'), '0', ['class' => 'form-control', 'required'])); ?>

        </div>
        <div class="col-12 col-6-sm col-md-4 col-lg-4 col-xl-4">
            <?php echo e(Form::label('dob', 'Date of Birth')); ?>

            <?php echo e(Form::date('dob', '', ['class' => 'form-control', 'placeholder' => 'Date of Birth', 'maxlength' => '50', 'required'])); ?>

        </div>
        <div class="col-12 col-6-sm col-md-4 col-lg-4 col-xl-4">
            <?php echo e(Form::label('gender', 'Gender')); ?>

            <?php echo e(Form::select('gender', array('' => ' -- Select Gender -- ', 'Male' => 'Male', 'Female' => 'Female', 'Gender Diverse' => 'Gender Diverse', 'Non Binary' => 'Non Binary'), '0', ['class' => 'form-control', 'required'])); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <?php echo e(Form::label('email', 'Email Address')); ?>

            <?php echo e(Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address (Max 50 Chars)', 'maxlength' => '50', 'required'])); ?>

        </div>
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <?php echo e(Form::label('mobile_no', 'Modile Number')); ?>

            <?php echo e(Form::text('mobile_no', '', ['class' => 'form-control', 'placeholder' => 'Modile Number (Max 15 Chars)', 'maxlength' => '15', 'required'])); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <?php echo e(Form::label('job_title', 'Job Title')); ?>

            <?php echo e(Form::text('job_title', '', ['class' => 'form-control', 'placeholder' => 'Job Title (Max 50 Chars)', 'maxlength' => '50', 'required'])); ?>

        </div>
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <?php echo e(Form::label('department_id', 'Department')); ?>

            <select id='department_id' name='department_id' class="form-control" required>
                    <option value='' disabled selected> -- Select Department -- </option>
                    <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->department_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </select>
        </div>        
    </div>      
    <div class="row">
        <div class="col-12">
            <br>
            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<br><br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/admin/create.blade.php ENDPATH**/ ?>