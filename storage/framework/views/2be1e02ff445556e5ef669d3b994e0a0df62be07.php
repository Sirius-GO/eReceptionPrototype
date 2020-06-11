<?php
use App\User;
use App\Register;

/*<span class="badge">Visitng Who:  </span> 
    <?php
        $visit = User::WHERE('id', $rec->who)->get();
        foreach($visit as $vis){
            echo substr($vis->first_name . ' ' . $vis->last_name, 0, 22);
        }
    ?>*/


    $tm = now();
    $t = substr($tm, 0, 10);

?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2><?php echo e(__('messages.firedrill')); ?></h2></div>
                    <div class="col-sm-12 col-md-12" style="background-color: rgba(255, 255, 255, 0.2); padding: 10px; margin-bottom: 30px;">
                        <p>Key: </p>
                        <p>
                            <span style="background-color: rgba(0, 255, 0, 0.1); color: rgba(0, 255, 0, 0); border: solid 1px #fff;"> Signed In </span> &nbsp;&nbsp; : &nbsp; Signed In Today<br>
                            <span style="background-color: rgba(255, 0, 0, 0.1); color: rgba(255, 0, 0, 0); border: solid 1px #fff;"> Signed In </span> &nbsp;&nbsp; : &nbsp; Signed In Previously
                        </p>
                    </div>
                <div class="panel-body">
                    <?php if(count($entries) > 0): ?>
                        <?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <!-- =================================================   STAFF =========================== -->
                        <?php if($rec->reg_type === 'Staff'): ?>

                            <div class="row" style="margin-top: 5px;">
                                <span class="col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2 fire_mod_staff">
                                    <span class="fire_type_text"><b><i class="fa fa-id-card"></i> <?php echo e($rec->reg_type); ?></b>
                                        <span class="pull-right">
                                            <a href="fire_details/<?php echo e($rec->rid); ?>" class="dots">
                                                <i class="fa fa-ellipsis-v fa-lg"></i> 
                                            </a>&nbsp;&nbsp;&nbsp; 
                                        </span>
                                    </span>
                                </span>
                                <?php $si_tm = substr($rec->crestat, 0, 10); ?>
                                <?php if($si_tm === $t): ?>
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 fire_mod" style="background-color: rgba(0, 255, 0, 0.1);">
                                <?php else: ?> 
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 fire_mod" style="background-color: rgba(255, 0, 0, 0.1);">
                                <?php endif; ?>
                                    <span class="badge">Name: </span> <?php echo substr($rec->name, 0, 25); ?>
                                        <br>
                                    <span class="badge">Department:  </span> <?php echo e($rec->department_name); ?>

                                </span>
                                <?php if($si_tm === $t): ?>
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 fire_mod" style="background-color: rgba(0, 255, 0, 0.1);">
                                <?php else: ?> 
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 fire_mod" style="background-color: rgba(255, 0, 0, 0.1);">
                                <?php endif; ?>
                                    <span class="badge">Sign In Location:  </span> <?php echo substr($rec->location_name, 0, 15) . ' Hub ' . $rec->location_code; ?>
                                    <br>
                                    <span class="badge">Sign In Time: </span> <?php echo e(date('d/m/Y H:i:s', strtotime($rec->crestat))); ?>

                                </span>
                                <?php if($si_tm === $t): ?>
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 fire_mod_close" style="background-color: rgba(0, 255, 0, 0.1);">
                                <?php else: ?> 
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 fire_mod_close" style="background-color: rgba(255, 0, 0, 0.1);">
                                <?php endif; ?>
                                    <span class="fire_type_butn pull-right">
                                        <!-- POST DATA TO CONTROLLER -->
                                        <a href="fire/<?php echo e($rec->rid); ?>" class="btn btn-success btn-xs"> <i class="fa fa-check"></i> &nbsp; PRESENT </a>

                                        <!-- OPEN A MODAL AND POST FORM DATA TO CONTTROLLER -->
                                        <a data-toggle="modal" data-target="#not_present" onclick="getMyId(<?php echo e($rec->rid); ?>)" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> &nbsp; NOT PRESENT </a>
                                    </span>
                                </span>
                            </div>
                        <?php else: ?> <!-- for all other reg types -->
                        <!-- =================================================   VISITOR  =========================== -->
                            <!-- Flip Card if(Visitor) -->
                            <div class="row" style="margin-top: 5px;">
                                <span class="col-xs-12 col-sm-6 col-md-6 col-lg-2 col-xl-2 fire_mod_vis">
                                    <span class="fire_type_text"><b><i class="fa fa-user-circle"></i> <?php echo e($rec->reg_type); ?></b>
                                        <span class="pull-right">
                                            <a href="fire_details/<?php echo e($rec->rid); ?>" class="dots">
                                                <i class="fa fa-ellipsis-v fa-lg"></i> 
                                            </a>&nbsp;&nbsp;&nbsp; 
                                        </span>
                                    </span>
                                </span>
                                <?php $si_tm = substr($rec->crestat, 0, 10); ?>
                                <?php if($si_tm === $t): ?>
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 fire_mod" style="background-color: rgba(0, 255, 0, 0.1);">
                                <?php else: ?> 
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 fire_mod" style="background-color: rgba(255, 0, 0, 0.1);">
                                <?php endif; ?>
                                    <span class="badge">Name: </span> <?php echo substr($rec->name, 0, 25); ?>
                                    <br>
                                    <span class="badge">Company:  </span> <?php echo substr($rec->from_company, 0, 28); ?>
                                </span>
                                <?php if($si_tm === $t): ?>
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 fire_mod" style="background-color: rgba(0, 255, 0, 0.1);">
                                <?php else: ?> 
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 fire_mod" style="background-color: rgba(255, 0, 0, 0.1);">
                                <?php endif; ?>
                                    <span class="badge">Sign In Location:  </span> <?php echo substr($rec->location_name, 0, 15) . ' Hub ' . $rec->location_code; ?>
                                    <br>
                                    <span class="badge">Sign In Time: </span> <?php echo e(date('d/m/Y H:i:s', strtotime($rec->crestat))); ?>

                                </span>
                                <?php if($si_tm === $t): ?>
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 fire_mod_close" style="background-color: rgba(0, 255, 0, 0.1);">
                                <?php else: ?> 
                                    <span class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 fire_mod_close" style="background-color: rgba(255, 0, 0, 0.1);">
                                <?php endif; ?>
                                    <span class="fire_type_butn pull-right">
                                        <!-- POST DATA TO CONTROLLER -->
                                        <a href="fire/<?php echo e($rec->rid); ?>" class="btn btn-success btn-xs"> <i class="fa fa-check"></i> &nbsp; PRESENT </a>

                                        <!-- OPEN A MODAL AND POST A FORM TO THE CONTROLLER -->
                                        <a data-toggle="modal" data-target="#not_present" onclick="getMyId(<?php echo e($rec->rid); ?>)" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> &nbsp; NOT PRESENT </a>
                                    </span>
                                </span>
                            </div>  
                        <?php endif; ?> <!-- end if reg type -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- end entries as $rec -->
                </div>
    
    
    
    
                    <br><br>
                    <?php else: ?> <!-- if count entries = 0 -->
                            <p>No Entries Found - The Fire Drill is Completed</p>

                            <br>
                            <a href="firesafety" class="btn btn-primary"> <i class="fa fa-arrow-left fa-lg"></i> &nbsp; Back To Fire Safety </a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="firereports" class="btn btn-primary"> <i class="fa fa-fire-extinguisher fa-lg"></i> &nbsp; View Fire Reports </a>
                    <?php endif; ?> <!-- close if count entries -->
    
                </div>
            </div>
        </div>
    </div>
</div>




<!-- ============================ NOT PRESENT MODAL ================================ -->
<div class="modal fade" tabindex="-1" role="dialog" id="not_present">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="color: #333;">Fire Drill - Non Attendant Feedback</h4>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('pagescontroller.fire_not_present')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                        <label style="color: #333;">Please select the reason why this person is NOT present</label><br>
                        <select name="reason"  id="reason" style="color: #333;" class="form-control" onchange="answer_response()">
                            <option value="" selected disabled> -- Please Select -- </option>
                            <option value="failed to sign out">Non attendant previously failed to sign out</option>
                            <option value="failed to respond to fire alarm">Non attendant failed to respond to fire alarm - May still be inside the building</option>
                            <option value="reported trapped inside the buidling">Non attendant reported as trapped inside the building</option>
                            <option value="other">Other reason not listed</option>
                        </select>
                        <br>
                        <input type="text" name="more_info" id="more_info" class="form-control" placeholder="Enter Full Details" style="display: none;">

                        <input type="hidden" class="form-control" name="id" id="id" value=""> 
                        <script>
                            function getMyId(id){
                                var fid = id;
                                document.getElementById('id').value = fid;
                            }

                            function answer_response(){

                                var rsn = reason.options[reason.selectedIndex].value;
                                
                                if (rsn === 'other'){   
                                    document.getElementById('more_info').style.display = 'block';
                                }
                            }


                        </script> 
                        <br><br>
                        <button type="submit" name="submit" class="btn btn-danger">
                            SUBMIT FEEDBACK
                        </button>
                </div>
                <br>
            </form>  
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fire', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/fire.blade.php ENDPATH**/ ?>