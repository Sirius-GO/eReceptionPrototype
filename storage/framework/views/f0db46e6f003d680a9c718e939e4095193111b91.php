<?php if(count($location) > 0): ?>                  
<form action="<?php echo e(route('ereception.account_cred')); ?>" method="post">
    <?php echo e(csrf_field()); ?>


    <div class="form-group">
        <!--<input type="hidden" name="company_id" value="<?php echo e(auth()->user()->company_id); ?>">   -->
            <?php $__currentLoopData = $locationSingle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label  style="color: #333;">Location Name</label>
                <input type="text" class="form-control" name="location_name" value="<?php echo e($loc->location_name); ?>">  
                <label  style="color: #333;">Location KeyCode</label>
                <input type="text" class="form-control" name="location_code" value="<?php echo e($loc->location_code); ?>">  
                <label  style="color: #333;">Location Address</label>
                <input type="text" class="form-control" name="location_address" value="<?php echo e($loc->location_address); ?>">  
    </div>                            
                <button type="submit" name="submit" class="btn btn-success">
                    <i class="fa fa-pencil fa-lg"></i> Update
                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</form>
<br>           
<?php else: ?> 
    <br>
    <p style="color: #333;">None Set</p>
    <br>
<?php endif; ?>
<?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/loc_form.blade.php ENDPATH**/ ?>