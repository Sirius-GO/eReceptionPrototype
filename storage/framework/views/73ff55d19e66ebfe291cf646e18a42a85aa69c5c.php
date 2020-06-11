<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <a href="/ereceptionhub/public/firesafety" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-arrow-left"> </i> Go Back </a>
                <div class="panel-header"><h2><?php echo e(__('messages.fra')); ?></h2></div>

                <div class="panel-body">


                    <form action="<?php echo e(route('pagescontroller.fire_risk_assessment')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <h3 style="color: #ffdd00;">Record of Significant Findings</h3>
                        <!-- ============== DQ1 ========================= -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <p>1.</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label style="font-size:18px;">Location: </label>
                                <input type="text" class="form-control" name="location1" maxlength="150"> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                <label style="font-size:18px;">Identify Hazards: </label>
                                <input type="text" class="form-control" name="hazard1" maxlength="150"> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label style="font-size:18px;">Identify People at Risk: </label>
                                <input type="text" class="form-control" name="people1" maxlength="150"> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                <label style="font-size:18px;">Evaluate Risk: </label>
                                <input type="text" class="form-control" name="evaluate1" maxlength="150"> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label style="font-size:18px;">Proposed Action(s): </label>
                                <input type="text" class="form-control" name="action1" maxlength="150"> 
                                <br>
                                <hr>
                            </div>
                        </div>
                        <!-- ============== DQ2 ========================= -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <p>2.</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label style="font-size:18px;">Location: </label>
                                <input type="text" class="form-control" name="location2" maxlength="150"> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                <label style="font-size:18px;">Identify Hazards: </label>
                                <input type="text" class="form-control" name="hazard2" maxlength="150"> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label style="font-size:18px;">Identify People at Risk: </label>
                                <input type="text" class="form-control" name="people2" maxlength="150"> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                <label style="font-size:18px;">Evaluate Risk: </label>
                                <input type="text" class="form-control" name="evaluate2" maxlength="150"> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label style="font-size:18px;">Proposed Action(s): </label>
                                <input type="text" class="form-control" name="action2" maxlength="150"> 
                                <br>
                                <hr>
                            </div>
                        </div>
                    <!-- ============== DQ3 ========================= -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>3.</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Location: </label>
                            <input type="text" class="form-control" name="location3" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Identify Hazards: </label>
                            <input type="text" class="form-control" name="hazard3" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Identify People at Risk: </label>
                            <input type="text" class="form-control" name="people3" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Evaluate Risk: </label>
                            <input type="text" class="form-control" name="evaluate3" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Proposed Action(s): </label>
                            <input type="text" class="form-control" name="action3" maxlength="150"> 
                            <br>
                            <hr>
                        </div>
                    </div>
                    <!-- ============== DQ4 ========================= -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>4.</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Location: </label>
                            <input type="text" class="form-control" name="location4" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Identify Hazards: </label>
                            <input type="text" class="form-control" name="hazard4" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Identify People at Risk: </label>
                            <input type="text" class="form-control" name="people4" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Evaluate Risk: </label>
                            <input type="text" class="form-control" name="evaluate4" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Proposed Action(s): </label>
                            <input type="text" class="form-control" name="action4" maxlength="150"> 
                            <br>
                            <hr>
                        </div>
                    </div>
                    <!-- ============== DQ5 ========================= -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>5.</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Location: </label>
                            <input type="text" class="form-control" name="location5" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Identify Hazards: </label>
                            <input type="text" class="form-control" name="hazard5" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Identify People at Risk: </label>
                            <input type="text" class="form-control" name="people5" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Evaluate Risk: </label>
                            <input type="text" class="form-control" name="evaluate5" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Proposed Action(s): </label>
                            <input type="text" class="form-control" name="action5" maxlength="150"> 
                            <br>
                            <hr>
                        </div>
                    </div>
                    <!-- ============== DQ6 ========================= -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>6.</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Location: </label>
                            <input type="text" class="form-control" name="location6" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Identify Hazards: </label>
                            <input type="text" class="form-control" name="hazard6" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Identify People at Risk: </label>
                            <input type="text" class="form-control" name="people6" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Evaluate Risk: </label>
                            <input type="text" class="form-control" name="evaluate6" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Proposed Action(s): </label>
                            <input type="text" class="form-control" name="action6" maxlength="150"> 
                            <br>
                            <hr>
                        </div>
                    </div>
                    <!-- ============== DQ7 ========================= -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>7.</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Location: </label>
                            <input type="text" class="form-control" name="location7" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Identify Hazards: </label>
                            <input type="text" class="form-control" name="hazard7" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Identify People at Risk: </label>
                            <input type="text" class="form-control" name="people7" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Evaluate Risk: </label>
                            <input type="text" class="form-control" name="evaluate7" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Proposed Action(s): </label>
                            <input type="text" class="form-control" name="action7" maxlength="150"> 
                            <br>
                            <hr>
                        </div>
                    </div>
                    <!-- ============== DQ8 ========================= -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>8.</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Location: </label>
                            <input type="text" class="form-control" name="location8" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Identify Hazards: </label>
                            <input type="text" class="form-control" name="hazard8" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Identify People at Risk: </label>
                            <input type="text" class="form-control" name="people8" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Evaluate Risk: </label>
                            <input type="text" class="form-control" name="evaluate8" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Proposed Action(s): </label>
                            <input type="text" class="form-control" name="action8" maxlength="150"> 
                            <br>
                            <hr>
                        </div>
                    </div>
                    <!-- ============== DQ9 ========================= -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>9.</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Location: </label>
                            <input type="text" class="form-control" name="location9" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Identify Hazards: </label>
                            <input type="text" class="form-control" name="hazard9" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Identify People at Risk: </label>
                            <input type="text" class="form-control" name="people9" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Evaluate Risk: </label>
                            <input type="text" class="form-control" name="evaluate9" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Proposed Action(s): </label>
                            <input type="text" class="form-control" name="action9" maxlength="150"> 
                            <br>
                            <hr>
                        </div>
                    </div>
                    <!-- ============== DQ10 ========================= -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>10.</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Location: </label>
                            <input type="text" class="form-control" name="location10" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Identify Hazards: </label>
                            <input type="text" class="form-control" name="hazard10" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label style="font-size:18px;">Identify People at Risk: </label>
                            <input type="text" class="form-control" name="people10" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label style="font-size:18px;">Evaluate Risk: </label>
                            <input type="text" class="form-control" name="evaluate10" maxlength="150"> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Proposed Action(s): </label>
                            <input type="text" class="form-control" name="action10" maxlength="150"> 
                            <br>
                            <hr>
                        </div>
                    </div>

                        <button class="btn btn-primary" type="submit"> Submit </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var delay = 0;
    var offset = 150;
    
    document.addEventListener('invalid', function(e){
       $(e.target).addClass("invalid");
       $('html, body').animate({scrollTop: $($(".invalid")[0]).offset().top - offset }, delay);
    }, true);
    document.addEventListener('change', function(e){
       $(e.target).removeClass("invalid")
    }, true);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fire', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/fire_risk_assessment.blade.php ENDPATH**/ ?>