<?php

use App\Register;
use App\User;

?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <a href="/ereceptionhub/public/firesafety" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-arrow-left"> </i> Go Back </a>
                <div class="panel-header"><h2><?php echo e(__('messages.Fire_Reports')); ?></h2></div>

                <div class="panel-body">
                    <h3>Fire Drills</h3>
                    <div class="firedrill_window">
                    <?php if(count($firedrill) > 0): ?>
                    <?php $__currentLoopData = $firedrill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row" id="firedrill_window_bar">
                            <!-- Fire Drills Here -->
                            <?php
                                $name = User::where('id', $f->user_id)->take(1)->get();
                            ?>
                            <div style="margin-top: 5px;">
                                <span class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <span class="badge">Completed By:</span>
                                    <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($n->first_name); ?> <?php echo e($n->last_name); ?> &nbsp;
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <span class="badge">People Reported:</span>
                                    <?php echo e($f->people); ?> &nbsp;
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <span class="badge">Fire Drill Date:</span>
                                    <?php echo date('jS F, Y', strtotime($f->part)); ?>  &nbsp;
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                    <a href="firereportsdetails/<?php echo e($f->id); ?>" class="pull-right btn btn-primary btn-sm">
                                        View Report
                                    </a>
                                </span>
                            </div>
                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <h3>Fire Maintenance Checks</h3>

                <div class="firedrill_window">
                    <?php if(count($firetest) > 0): ?>
                    <?php $__currentLoopData = $firetest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row" id="firedrill_window_bar">
                            <!-- Fire Tests Here -->
                            <?php
                                $name = User::where('id', $t->user_id)->take(1)->get();
                            ?>
                            <div style="margin-top: 5px;">
                                <span class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <span class="badge">Completed By:</span>
                                    <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($n->first_name); ?> <?php echo e($n->last_name); ?> &nbsp;
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <span class="badge">Report Type:</span>
                                    <?php if($t->report_type !== 'FRA'): ?>
                                        <?php echo e($t->report_type); ?> Checklist &nbsp;
                                    <?php else: ?> 
                                        Fire Risk Assessment &nbsp;
                                    <?php endif; ?>
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <span class="badge">Check Date:</span>
                                    <?php echo date('jS F, Y', strtotime($t->part)); ?>  &nbsp;
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                    <a href="firecheckreportsdetails/<?php echo e($t->id); ?>" class="pull-right btn btn-primary btn-sm">
                                        View Report
                                    </a>
                                </span>
                            </div>
                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>


                </div>





                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fire', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/firereports.blade.php ENDPATH**/ ?>