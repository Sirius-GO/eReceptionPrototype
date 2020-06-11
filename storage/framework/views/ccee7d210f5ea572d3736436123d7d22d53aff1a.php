<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="logo">
                <?php if(count($company ?? '') > 0): ?>
                    <?php $__currentLoopData = $company ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $cpy = $comp->company_name; ?>
                        <?php if($comp->company_logo == ''): ?>
                            <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/default_logo.png" style="max-width: 25vw; max-height: 25vh;">
                        <?php else: ?> 
                            <img src="http://localhost:8080/ereceptionhub/storage/app/public<?php echo e($comp->company_logo); ?>" style="max-width: 25vw; max-height: 25vh;">
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
                <center><h1 class="welcome"><?php echo e(__('messages.welcome')); ?><br>
                    <span style="font-size: 3vw;"><?php echo e($cpy); ?></span></h1>
                </center>
                <br><br><br>

        </div>
        <div class="row">
            <div id="signin_out1">
                <?php if(app()->isLocale('en')): ?>
                <center>
                    <a href="/ereceptionhub/public/sign_in_options" alt="sign in choices" title="sign in optins">
                        <img src="../../ereceptionhub/storage/app/public/images/in.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                        &nbsp;&nbsp;&nbsp;
                    <a href="/ereceptionhub/public/scan" alt="Scan In" title="Scan In">
                        <img src="../../ereceptionhub/storage/app/public/images/scan_in.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    <br>
                    <a data-toggle="modal" data-target="#sname"> 
                        <img src="../../ereceptionhub/storage/app/public/images/out.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="/ereceptionhub/public/scanout" alt="Scan Out" title="Scan In">
                        <img src="../../ereceptionhub/storage/app/public/images/scan_out.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    <br>
                </center>
                <?php else: ?>
                <center>
                    <a href="/ereceptionhub/public/sign_in_options" alt="sign in choices" title="sign in optins">
                        <img src="../../ereceptionhub/storage/app/public/images/in_w.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="/ereceptionhub/public/scan" alt="Scan In" title="Scan In">
                        <img src="../../ereceptionhub/storage/app/public/images/scan_in_w.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    <br>
                    <a data-toggle="modal" data-target="#sname"> 
                        <img src="../../ereceptionhub/storage/app/public/images/out_w.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="/ereceptionhub/public/scanout" alt="Scan Out" title="Scan Out">
                        <img src="../../ereceptionhub/storage/app/public/images/scan_out_w.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    <br> 
                </center>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="sname">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success" style="color: #333;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Search By Name</h4>
            </div>
            <div class="modal-body">
                <br><b style="color: #333;">Search by Name</b><br><br>
                <form action="<?php echo e(route('ereception.nameout')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label  style="color: #333;">Name - (Hint! Only part of a first or last name required)</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success" style="min-width:250px;">
                        <i class="fa fa-search fa-lg"></i> Search Name
                    </button>
                </form>                
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.hub', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/hub.blade.php ENDPATH**/ ?>