<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="slidecontainer" style="width: 50vw; margin: auto; background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px;">
            <form action="<?php echo e(route('environment.colourstorepass')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <p class="txt text-center"><?php echo e(__('messages.pass_col')); ?></p>
                <?php if(count($layout) > 0): ?>
                    <?php $__currentLoopData = $layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span><b>Current Settings:</b> &nbsp;&nbsp;&nbsp; Hue: <?php echo e($l->hue_pass); ?> &nbsp;&nbsp;&nbsp; Sat: <?php echo e($l->sat_pass); ?></span>
                    <b style="margin-left: 200px;">Preview: </b>
                    <span style="display: inline-block">
                        <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/Access_Pass_v2.png" style="margin-top: 10px; height: 60px; -webkit-filter: hue-rotate(<?php echo $l->hue_pass."deg"; ?>) saturate(<?php echo $l->sat_pass; ?>);">
                    </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                        <label><?php echo e(__('messages.hue')); ?></label><input type="range" min="0" max="330" step="1" value="1" class="slider" name="myRange" id="myRange"><br>
                        <br>
                        <label><?php echo e(__('messages.saturation')); ?></label><input type="range" min="0" max="8" step="0.01" value="1" class="slider" name="myRangeB" id="myRangeB">
                        <br>
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
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <img src="../../ereceptionhub/storage/app/public/images/Access_Pass_v2.png" style="max-width: 20vw;">
                            </div>
                        </div> 
                    <?php else: ?>
                        <div style="position: relative; top: 5vh;">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <img src="../../ereceptionhub/storage/app/public/images/Access_Pass_v2.png" style="max-width: 20vw;">
                            </div>
                        </div> 
                    <?php endif; ?>
                </div>
            </center>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/hue_sat_pass.blade.php ENDPATH**/ ?>