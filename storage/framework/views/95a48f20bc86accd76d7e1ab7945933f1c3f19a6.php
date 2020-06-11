<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="slidecontainer" style="width: 50vw; margin: auto; background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px;">
            <form action="<?php echo e(route('environment.colourstore')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <p class="txt text-center"><?php echo e(__('messages.change')); ?><br><?php echo e(__('messages.colours')); ?></p>
                <?php if(count($layout) > 0): ?>
                    <?php $__currentLoopData = $layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span><b>Current Settings:</b> &nbsp;&nbsp;&nbsp; Hue: <?php echo e($l->hue); ?> &nbsp;&nbsp;&nbsp; Sat: <?php echo e($l->sat); ?></span>
                    <b style="margin-left: 200px;">Preview: </b>
                    <span style="display: inline-block">
                        <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/staff.png" style="margin-top: 10px; height: 60px; -webkit-filter: hue-rotate(<?php echo $l->hue."deg"; ?>) saturate(<?php echo $l->sat; ?>);">
                    </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                        <br>
                        <label><?php echo e(__('messages.hue')); ?></label><input type="range" min="0" max="330" step="1" value="1" class="slider" name="myRange" id="myRange"><br>
                        <br><br>
                        <label><?php echo e(__('messages.saturation')); ?></label><input type="range" min="0" max="8" step="0.01" value="1" class="slider" name="myRangeB" id="myRangeB">
                        <br><br>
                <center>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Save Colours
                    </button>
                </center>
            </form>
        </div>
        <div class="row">
            <center>
                <div id="main">
                    <?php if(app()->isLocale('en')): ?>
                        <div style="position: relative; top: 5vh;">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <img src="../../ereceptionhub/storage/app/public/images/staff.png" style="max-height: 14vh; max-width: 35vw;">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <img src="../../ereceptionhub/storage/app/public/images/visitor.png" style="max-height: 14vh; max-width: 35vw;">
                            </div>
                        </div> 
                    <?php else: ?>
                        <div style="position: relative; top: 5vh;">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <img src="../../ereceptionhub/storage/app/public/images/staff.png" style="max-height: 14vh; max-width: 35vw;">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <img src="../../ereceptionhub/storage/app/public/images/visitor_w.png" style="max-height: 14vh; max-width: 35vw;">
                            </div>
                        </div> 
                    <?php endif; ?>
                </div>
            </center>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/hue_sat.blade.php ENDPATH**/ ?>