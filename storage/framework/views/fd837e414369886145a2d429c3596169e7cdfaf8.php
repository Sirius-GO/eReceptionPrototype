<?php
if(count($staff_details) > 0){
    foreach($staff_details as $sdet){
        $staff = $sdet->reg_type;
    }
}elseif(count($staff_details) === 0 && count($details) > 0){
    foreach($details as $det){
        $staff = $det->reg_type;
    }
}

$tm = now();
$ut = time();
$tm_days = substr($tm, 8, 2);
?>


<?php echo $__env->make('inc.calc_date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2><?php echo e(__('messages.more_details')); ?></h2></div>

                <div class="panel-body">
                        <?php if($staff === 'Staff'): ?>

                            <?php $__currentLoopData = $staff_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-12 col-md-12 col-lg-12" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 10px 10px 0 0;">
                                    <h1 class="text-center"><?php echo strtoupper($sdet->reg_type); ?> <a href="../fire" class="btn btn-primary btn-lg pull-right" style="margin-top: -10px; margin-right: 15px;"> <i class="fa fa-arrow-left"> </i> Go Back </a></h1>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <img src="http://localhost:8080/ereceptionhub/storage/app/public/mug_shots/<?php echo e($sdet->img); ?>" style="position: relative; height: 100px; border-radius: 50%;  border: solid 1px #eee; left: 50%; margin-left: -50px;">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Name: </span> <?php echo e($sdet->name); ?> <br>
                                        <span class="badge">Company: </span> <?php echo e($sdet->from_company); ?>

                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- Department / Job Title or Visiting Who / Car Reg -->
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Department: </span> <?php echo e($sdet->department_name); ?>

                                        <br>
                                        <span class="badge">Job Title: </span> <?php echo e($sdet->job_title); ?>

                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- How Long Onsite -->
                                    <p style="color: #333; text-align: center;"><span class="badge">Length of Time On-Site: </span> </p>
                                    <?php 
                                        $one = $tm;
                                        $two = $sdet->crestat;
                                        $first_date = new DateTime($one);
                                        $second_date = new DateTime($two);
                                        $difference = $first_date->diff($second_date);
                                        $time_result = format_interval($difference);
                                    ?>

                                    <p style="text-align: center; width: 90%; margin-left: 5%; background-color: rgba(0, 0, 0, 0.5); padding: 5px; font-size: 15px;">
                                        <?php echo e($time_result); ?>

                                    </p>
                               </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- Sign In Location and Sign In Address -->
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Sign In Location: </span> <?php echo e($sdet->location_name); ?>

                                        <br>
                                        <span class="badge">Sign In Address: </span> <?php echo e($sdet->location_address); ?>

                                    </p>    
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- Current Status and Sign In Time -->
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Current Status: </span> <?php echo e($sdet->current_status); ?>

                                        <br>
                                        <span class="badge">Sign In Time: </span> <?php echo e(date('d/m/Y H:i:s', strtotime($sdet->crestat))); ?>

                                    </p>    
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 0 0 10px 10px;">
                                    Footer
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?> 
                            <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-12 col-md-12 col-lg-12" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 10px 10px 0 0;">
                                    <h1 class="text-center"><?php echo strtoupper($det->reg_type); ?> <a href="../fire" class="btn btn-primary btn-lg pull-right" style="margin-top: -10px; margin-right: 15px;"> <i class="fa fa-arrow-left"> </i> Go Back </a></h1>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <img src="http://localhost:8080/ereceptionhub/storage/app/public/mug_shots/<?php echo e($det->img); ?>" style="position: relative; height: 100px; border-radius: 50%;  border: solid 1px #eee; left: 50%; margin-left: -50px;">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Name: </span> <?php echo e($det->name); ?> <br>
                                        <span class="badge">Company: </span> <?php echo e($det->from_company); ?>

                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                <!-- Department / Job Title or Visiting Who / Car Reg -->
                                <p style="color: #333; font-size: 16px;">
                                    <span class="badge">Visiting Who: </span> <?php echo e($det->first_name); ?> <?php echo e($det->last_name); ?>

                                    <br>
                                    <span class="badge">Car Reg: </span> <?php echo e($det->car_reg); ?>

                                </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- How Long Onsite -->
                                    <p style="color: #333; text-align: center;"><span class="badge">Length of Time On-Site: </span> </p>
                                    <?php 
                                        $one = $tm;
                                        $two = $det->crestat;
                                        $first_date = new DateTime($one);
                                        $second_date = new DateTime($two);
                                        $difference = $first_date->diff($second_date);
                                        $time_result = format_interval($difference);
                                    ?>

                                    <p style="text-align: center; width: 90%; margin-left: 5%; background-color: rgba(0, 0, 0, 0.5); padding: 5px; font-size: 15px;">
                                        <?php echo e($time_result); ?>

                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- Sign In Location and Sign In Address -->
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Sign In Location: </span> <?php echo e($det->location_name); ?>

                                        <br>
                                        <span class="badge">Sign In Address: </span> <?php echo e($det->location_address); ?>

                                    </p>    
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- Current Status and Sign In Time -->
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Current Status: </span> <?php echo e($det->current_status); ?>

                                        <br>
                                        <span class="badge">Sign In Time: </span> <?php echo e(date('d/m/Y H:i:s', strtotime($det->crestat))); ?>

                                    </p>    
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 0 0 10px 10px;">
                                    Footer
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fire', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/fire_details.blade.php ENDPATH**/ ?>