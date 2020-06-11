<?php $__env->startSection('content'); ?>
<br><br>
<div class="jumbotron" style="padding: 0px;">
    <img style="width: 100%;" src="../../ereceptionhub/storage/app/public/images/about_banner.jpg">
</div>
<br>
<center>
<h1>About Us</h1>
</ceneter>
<br>


<script>
    $(document).ready(function () {
        $(".nav-item").removeClass("active");
        $('#about').addClass('active');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/website/about.blade.php ENDPATH**/ ?>