<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2><?php echo e(__('messages.searchname')); ?></h2></div>

                <div class="panel-body" style="margin-left: 30px;">
                    <hr><p>Searched Name: <?php echo e($name); ?> </p><hr>
                    <?php if(count($people) > 0): ?>
                        <?php $__currentLoopData = $people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2" style="color: #333; margin-top: 10px;">
                                <div style="width: 98%; height: 275px; background-color: rgba(255, 255, 255, 0.5); padding: 10px; border-radius: 10px;">
                                    <center>
                                        <?php if($p->img): ?>
                                        <img src="../../ereceptionhub/storage/app/public/mug_shots/<?php echo e($p->img); ?>" style="width: 90%;  max-width: 120px; border-radius: 50%;  border: solid 1px #eee; margin-bottom: 5px;">
                                        <?php else: ?> 
                                        <img src="../../ereceptionhub/storage/app/public/mug_shots/avatar.png" style="width: 90%; max-width: 120px; border-radius: 50%;  border: solid 1px #eee; margin-bottom: 5px;">
                                        <?php endif; ?>
                                        <hr style="border-color: #333; margin: 0 0 0 0;">
                                            <span style="font-size: 10px; font-weight: 800;"><?php echo e($p->name); ?></span>
                                        <hr style="border-color: #333; margin: 0 0 0 0;">
                                        <span style="font-size: 10px; font-weight: 800;"><?php echo e($p->reg_type); ?></span> 
                                        <hr style="border-color: #333; margin: 0 0 0 0;">
                                        <span style="font-size: 10px; font-weight: 800;"><?php echo e($p->from_company); ?></span> 
                                        <hr style="border-color: #333; margin: 0 0 10px 0;">
                                    </center>
                                        <a href="signout/<?php echo e($p->id); ?>" class="btn btn-primary btn-sm" style="position: absolute; bottom: 5px; width: 60%; left: 50%; margin-left: -30%;"> <i class="fa fa-sign-out fa-lg"> </i> Sign Out</a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?> 
                        <p>No Results Found - (May already be signed out)</p>
                        <?php endif; ?>
                </div>
                <center>
                    <hr><br>
                    <a href="/ereceptionhub/public/hub" class="btn btn-primary btn-lg"> <i class="fa fa-arrow-left"> </i> Go Back </a>
                </center>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.hub', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/sign_out.blade.php ENDPATH**/ ?>