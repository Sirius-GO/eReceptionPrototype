<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2><?php echo e(__('messages.signing_in')); ?></h2></div>

                <div class="panel-body">

                    <p>...please wait!</p>

                    <?php 
                        if(isset($_GET['id'])){
                            $scan_id = $_GET['id'];
                        }
                    ?>

                    <form action="<?php echo e(route('ereception.scan_in')); ?>" method="post" name="myForm">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="rfid" value="<?php echo e($scan_id ?? 'Not Found'); ?>" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Submit Form Automatically -->
<?php if(!empty($scan_id)): ?>
    <script>
        document.myForm.submit();
    </script>
<?php else: ?> 
 <p>Scan Code Not Found</p>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hub', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/sign_in.blade.php ENDPATH**/ ?>