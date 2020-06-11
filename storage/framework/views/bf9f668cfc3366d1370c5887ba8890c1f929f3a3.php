<?php if(count($errors) > 0): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-danger alert-dismissable message_bar">
            <?php echo e($error); ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissable message_bar">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissable message_bar">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<?php if(session('info')): ?>
    <div class="alert alert-info alert-dismissable message_bar">
        <?php echo e(session('info')); ?>

    </div>
<?php endif; ?>

<?php if(session('warning')): ?>
    <div class="alert alert-warning alert-dismissable message_bar">
        <?php echo e(session('warning')); ?>

    </div>
<?php endif; ?>

<?php if(session('csrf')): ?>
    <div class="text-xs">
        <?php echo e(session('csrf')); ?>

    </div>
<?php endif; ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/inc/messages.blade.php ENDPATH**/ ?>