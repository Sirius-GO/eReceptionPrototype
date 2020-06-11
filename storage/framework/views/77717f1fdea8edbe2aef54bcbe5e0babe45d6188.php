<?php $__env->startSection('content'); ?>
<div >
    <br><br>
    <center><h2>Please make sure your head and shoulders are in the frame</h2></center>

    <form action="<?php echo e(route('mugshot.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div >
            <div id="cam_wrap">
                <div id="my_camera"></div>
                <br/>
            <div>
                <input type=button  class="btn btn-primary" id="take_snap" value="Take Photo" onClick="take_snapshot()">
                <input type="hidden" name="image1" id="image1">
            </div>
            </div>
            <div id="results_wrap">
                <div id="results">Captured Image</div>
                    <input type="submit" id="sub_snap" class="btn btn-success" value="Submit">
            </div>
        </div>
    </form>
</div>




</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.capture', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/capture_cam.blade.php ENDPATH**/ ?>