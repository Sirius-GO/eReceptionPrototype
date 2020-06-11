<?php $__env->startSection('content'); ?>
<div class="jumbotron" style="padding: 0px;">
    <img style="width: 100%;" src="../../ereceptionhub/storage/app/public/images/contact_banner.jpg">
</div>
<br>
<center>
<h1>Contact Us</h1>
</ceneter>
<br>
<div style="text-align: left;">
<?php echo $__env->make('inc.contactform', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
    
<script>
    $(document).ready(function () {
        $(".nav-item").removeClass("active");
        $('#contact').addClass('active');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/website/contact.blade.php ENDPATH**/ ?>