<?php 

use App\Question; 

?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <button onclick="printFireReport()" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Print Fire Report </button> &nbsp;&nbsp;
                <a href="/ereceptionhub/public/firereports" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-arrow-left"> </i> Go Back </a>
                <div class="panel-header"><h2><?php echo e(__('messages.View_F_Report')); ?></h2></div>

                <div class="panel-body" id="fire_report">
                    <style>
                        #formatted {
                            /*background-color: rgb(212, 243, 233);*/
                            font-family: tahoma, sans-serif;
                            color: #333;
                        }
                    </style>
                    <script>
                        function printFireReport(){
                            var printContents = document.getElementById('fire_report').innerHTML;
                            w = window.open();
                            w.document.write(printContents);
                            w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');
                            w.document.querySelector("body:last-child").id = "formatted";
                            w.document.close(); // necessary for IE >= 10
                            w.focus(); // necessary for IE >= 10
                            return true;
                        }                                      
                    </script>


                        <?php if(count($firetest) > 0): ?>
                        <?php $__currentLoopData = $firetest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="padding: 5px; border: dashed 1px #eee; margin-top: 3px;">
                        <?php $fdate = substr($f->cdt, 0, 10); ?>
                        <?php $name = $f->first_name . ' ' . $f->last_name; ?>
                        <?php $rtype = $f->report_type; ?>
                        <?php if($rtype != 'FRA'): ?>
                        <?php $quest = Question::where('ref', $f->area_checked)->take(1)->get();?>
                        <?php if(count($quest) > 0): ?>
                        <?php $__currentLoopData = $quest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h4><?php echo substr($f->area_checked, 1, 10 ). '.';?> <?php echo e($q->question); ?></h4>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="row">
                            <div style="margin-top: 5px;">
                                <span class="col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                    <span class="badge">Response:</span>
                                    <?php echo e($f->response); ?>

                                </span>
                                <span class="col-xs-12 col-sm-6 col-md-10 col-lg-10 col-xl-10">
                                    <span class="badge">Report:</span>
                                    <?php echo e($f->report); ?>

                                </span>
                            </div>
                        </div>
                        <?php else: ?> 
                        <h4>Record of Significant Findings</h4>
                        <div class="row">
                            <div style="margin-top: 5px;">
                                <span class="col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                    <span class="badge">Area Checked:</span><br>
                                    <?php echo e($f->area_checked); ?>

                                </span>
                                <span class="col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                    <span class="badge">Identified Hazard:</span><br>
                                    <?php echo e($f->response); ?>

                                </span>
                                <?php $rep = explode("|", $f->report); ?>
                                <span class="col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                    <span class="badge">People at Risk:</span><br>
                                    <?php echo e($rep[0]); ?>

                                </span>
                                <span class="col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                    <span class="badge">Risk Evaluation:</span><br>
                                    <?php echo e($rep[1]); ?>

                                </span>
                                <span class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <span class="badge">Proposed Actions:</span><br>
                                    <?php echo e($rep[2]); ?>

                                </span>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <h3>Report Type: <?php echo ($rtype !== 'FRA')?$rtype . ' Checklist':'Fire Risk Assessment'; ?></h3>
                        <h3>Completed by: <?php echo $name; ?></h3>
                        <h3>Check Completed on: <?php echo date('jS F, Y', strtotime($fdate)); ?></h3>
                        <?php endif; ?>

               

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fire', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/firecheckreportdetails.blade.php ENDPATH**/ ?>