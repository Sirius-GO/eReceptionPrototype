<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2><?php echo e(__('messages.view')); ?></h2></div>
                <div class="panel-body">
                    <br>
                    <?php if(count($registration) > 0): ?>
                        <div class="row">
                            <?php $__currentLoopData = $registration; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: rgba(0,0,0,0.1); padding-top: 12px; display: inline-block; border: solid 1px #aaa; margin-top: 3px; min-height: 250px; min-width: 300px;">
                                        <img src="http://localhost:8080/ereceptionhub/storage/app/public/mug_shots/<?php echo e($reg->avatar); ?>" style="position: absolute; width: 200px; left: 10px; top: 10px; border-radius: 50%; border: solid 1px #eee;">
                                        <img style="position: absolute; width: 100px; right: 10px; top: 10px;" src="../qr-code?text=<?php echo e($reg->rfid); ?>&size=100" alt="QR Code">

                                        <?php if(count($company ?? '') > 0): ?>
                                            <?php $__currentLoopData = $company ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($comp->company_logo == ''): ?>
                                                    <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/default_logo.png" style="position: absolute; width: 100px; right: 10px; bottom: 10px;">
                                                <?php else: ?> 
                                                    <img src="http://localhost:8080/ereceptionhub/storage/app/public<?php echo e($comp->company_logo); ?>" style="position: absolute; width: 100px; right: 10px; bottom: 10px;">
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: rgba(0,0,0,0.1); padding-top: 12px; display: inline-block; border: solid 1px #aaa; margin-top: 3px; min-height: 250px; min-width: 300px;">
                                        <h5><u>User Credentials</u></h5><br>
                                        <h6><span class="badge" style="background-color: #1e7553;">Name: </span> <?php echo e($reg->first_name); ?> <?php echo e($reg->last_name); ?> </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Email: </span> <?php echo e($reg->email); ?> </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Mobile No: </span> <?php echo e($reg->mobile_no ?? 'Not Set'); ?> </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Gender: </span> <?php echo e($reg->gender ?? 'Not Set'); ?> </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">DOB: </span> <?php if(!EMPTY($reg->dob)){ echo date('jS F, Y', strtotime($reg->dob)); }else { echo 'Not Set'; } ?> </h6>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: rgba(0,0,0,0.1); padding-top: 12px; display: inline-block; border: solid 1px #aaa; margin-top: 3px; min-height: 250px; min-width: 300px;">
                                        <h5><u>Company Credentials</u></h5><br>
                                        <h6><span class="badge" style="background-color: #1e7553;">Company: </span> 
                                            <?php $__currentLoopData = $company ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($comp->company_name ?? 'Not Set'); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Job Title: </span> <?php echo e($reg->job_title ?? 'Not Set'); ?> </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Department: </span> 
                                            <?php $__currentLoopData = $department ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($dep->department_name ?? 'Not Set'); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Company No: </span>
                                            <?php $__currentLoopData = $company ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($comp->company_number ?? 'Not Set'); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">VAT No: </span>
                                            <?php $__currentLoopData = $company ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($comp->vat_number ?? 'Not Set'); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">QR Code: </span>
                                            <?php echo e($reg->rfid); ?>

                                        </h6> 
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: rgba(0,0,0,0.1); padding-top: 12px; display: inline-block; border: solid 1px #aaa; margin-top: 3px; min-height: 250px; min-width: 300px;">
                                        <h5><u>Status Credentials</u></h5><br>
                                        <h6><span class="badge" style="background-color: #489b85;">Current Status: </span>
                                            <?php echo e($reg->current_status); ?>

                                        </h6>
                                        <h6><span class="badge" style="background-color: #489b85;">Last Time In / Out: </span> 
                                            <?php echo e(date('jS F, Y H:i:s',$reg->last_time)); ?>

                                        </h6> 
                                        <h6><span class="badge" style="background-color: #1e7553;">User Level: </span>
                                            <?php
                                                if($reg->user_level === 10){ echo 'Super User';}
                                                if($reg->user_level === 5){ echo 'Admin User';}
                                                if($reg->user_level === 1){ echo 'Staff User';}
                                            ?>
                                        </h6>

                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <br><hr><br>
                        <div class="row">
                            <div class="col-12">
                                <p align="center"><a href="/ereceptionhub/public/administration" class="btn btn-primary"><i class="fa fa-arrow-left fa-lg"></i> &nbsp;Go Back </a></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>No Registration Found</p>
                    <?php endif; ?>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/admin/show.blade.php ENDPATH**/ ?>