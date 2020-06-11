<?php 
use App\Location; 
use App\Departments; 
?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2><?php echo e(__('messages.account')); ?></h2></div>

                <div class="panel-body">


                    <div id="main">
                     <div class="row">
                   <!-- User Credentials -->
                    <div class="row" style="background-color: rgba(255,255,255,0.5); padding: 10px;">
                        <h3>User Credentials                        
                            <a data-toggle="modal" data-target="#user_cred"><span class="btn btn-primary pull-right"><i class="fa fa-pencil fa-lg"> </i> Edit </span></a>
                        </h3>                                
                    </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Name: </span><br>
                                <?php echo e(auth()->user()->first_name); ?>  <?php echo e(auth()->user()->last_name); ?><br> 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">User Level:</span><br>
                                <?php if(auth()->user()->user_level === 10): ?> 
                                    Super User
                                <?php elseif(auth()->user()->user_level === 5): ?>
                                    Administrator
                                <?php else: ?>
                                    Standard User
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Avatar: </span><br>
                                <img src="http://localhost:8080/ereceptionhub/storage/app/public/mug_shots/<?php echo e(auth()->user()->avatar); ?>" style="height: 100px; border-radius: 50%;  border: solid 1px #eee;">
                                <a href="capture_cam"><span class="btn btn-primary"><i class="fa fa-upload fa-lg"> </i> Upload </span></a>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Email Address: </span><br>
                                <?php echo e(auth()->user()->email); ?><br> 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Mobile No: </span><br>
                                <?php echo e(auth()->user()->mobile_no); ?>

                                <?php if( auth()->user()->mobile_no == ''): ?> 
                                Not Set<br>
                                <?php endif; ?> 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">QR Code ID: </span><br>
                                <?php echo e(auth()->user()->rfid); ?>

                                <?php if( auth()->user()->rfid == ''): ?> 
                                Not Set<br>
                                <?php endif; ?> 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Date of Birth: </span><br>
                                <?php if(!EMPTY(auth()->user()->dob)){ echo date('jS F, Y', strtotime(auth()->user()->dob)); } else { echo 'Not Set'; } ?>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Gender: </span><br>
                                <?php echo e(auth()->user()->gender); ?>

                                <?php if( auth()->user()->gender == ''): ?> 
                                    Not Set<br>
                                <?php endif; ?> 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Current Register Status: </span><br>
                                <?php echo e(auth()->user()->current_status); ?><br> 
                            </p>
                        </div>
                        </div>

                        <br>
            <?php if(auth()->user()->user_level =='10'): ?>
                        <!-- Company Credentials -->
                        <div class="row">
                        <div class="row" style="background-color: rgba(255,255,255,0.5); padding: 10px;">
                            <h3>Company Credentials
                            <a data-toggle="modal" data-target="#comp_cred"><span class="btn btn-primary pull-right"><i class="fa fa-pencil fa-lg"> </i> Edit </span></a>
                            </h3> 
                        </div>                               
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Company Name: </span><br>
                                <?php if(auth()->user()->company_id > 0): ?> 
                                    <?php if(count($company) > 0): ?>
                                        <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($comp->company_name); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    Not Set<br>
                                <?php endif; ?> 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Job Title: </span><br>
                                <?php echo e(auth()->user()->job_title); ?>

                                <?php if( auth()->user()->job_title == ''): ?> 
                                Not Set<br>
                                <?php endif; ?> 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Department: </span><br>
                                <?php if( auth()->user()->department_id === 0): ?> 
                                    Not Set<br>
                                <?php else: ?> 
                                    <?php $dep_name = Departments::WHERE('id', auth()->user()->department_id)->take(1)->get(); ?>
                                <?php endif; ?> 
                                 <?php $__currentLoopData = $dep_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($d->department_name); ?>

                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Head Office Address: </span><br>
                                <?php if(auth()->user()->company_id > 0): ?> 
                                    <?php if(count($company ) > 0): ?>
                                        <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span style="word-break: break-word;"><?php echo e($comp->ho_address); ?></span>
                                            <?php if( $comp->ho_address == ''): ?> 
                                            Not Set<br>
                                            <?php endif; ?> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Company Number: </span><br>
                                <?php if(auth()->user()->company_id > 0): ?> 
                                    <?php if(count($company ?? '') > 0): ?>
                                        <?php $__currentLoopData = $company ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($comp->company_number); ?>

                                            <?php if( $comp->company_number == ''): ?> 
                                            Not Set<br>
                                            <?php endif; ?>                                         
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">VAT Number: </span><br>
                                <?php if(auth()->user()->company_id > 0): ?> 
                                    <?php if(count($company ?? '') > 0): ?>
                                        <?php $__currentLoopData = $company ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($comp->vat_number); ?>

                                            <?php if( $comp->vat_number == ''): ?> 
                                            Not Set<br>
                                            <?php endif; ?>                                         
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Company Logo: </span><br>
                                <!-- Show Company Logo or Default Image -->
                                <?php if(count($company ?? '') > 0): ?>
                                    <?php $__currentLoopData = $company ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($comp->company_logo == ''): ?>
                                            <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/default_logo.png" height="100px">
                                        <?php else: ?> 
                                            <img src="http://localhost:8080/ereceptionhub/storage/app/public<?php echo e($comp->company_logo); ?>" height="100px">
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                    <a data-toggle="modal" data-target="#company_logo_upload"><span class="btn btn-primary"><i class="fa fa-upload fa-lg"> </i> Upload </span></a>
                            </p>
                        </div>
                        </div>

                        <br>
                        <div class="row">
                            <!-- Account Credentials -->
                            <div class="row" style="background-color: rgba(255,255,255,0.5); padding: 10px;">
                                <h3>Account Credentials
                                    <a data-toggle="modal" data-target="#account_cred"><span class="btn btn-primary pull-right"><i class="fa fa-pencil fa-lg"> </i> Edit </span></a>
                                </h3>                                
                            </div>                                
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                                <p><span class="badge" style="background-color: #1e7553;">Account Status: </span><br>
                                    <?php if(count($account) > 0): ?>
                                        <?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($ac->status); ?><br>
                                            <?php if($ac->status === 'Inactive'): ?>
                                                <a href="subscriptions" class="btn btn-primary"> Buy Subscription </a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                                <p><span class="badge" style="background-color: #1e7553;">Account Type: </span><br>
                                    <?php if(count($account) > 0): ?>
                                        <?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($ac->type); ?>

                                            <?php if( $ac->type == ''): ?> 
                                                Not Set<br>
                                            <?php endif; ?> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                                <p><span class="badge" style="background-color: #1e7553;">Account Classification: </span><br>
                                    <?php if(count($account) > 0): ?>
                                        <?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($ac->classification); ?><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        
                        <br>
                        <div class="row">
                            <!-- Add / Update Locations / Departments -->
                            <div class="row" style="background-color: rgba(255,255,255,0.5); padding: 10px;">
                                <h3>Locations and Departments</h3>                                
                            </div>  
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                                <p><span class="badge" style="background-color: #1e7553;">Locations: </span><br>
                                    <?php if(count($location) > 0): ?>
                                        <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                            <?php echo e($loc->location_name); ?> Hub <?php echo e($loc->location_code); ?>

                                            <br> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <span class="btn btn-primary btn-sm"><a data-toggle="modal" data-target="#loc_edit"><i class="fa fa-pencil fa-lg"> </i> Edit </a></span>
                                        <br>
                                        <span class="btn btn-primary"><a data-toggle="modal" data-target="#loc_add"> <i class="fa fa-plus fa-lg"> </i> Add Location </span></a>&nbsp;&nbsp;&nbsp;
                                    <?php else: ?>
                                        None Set<br>
                                        <span class="btn btn-primary"><a data-toggle="modal" data-target="#loc_add"> <i class="fa fa-plus fa-lg"> </i> Add Location</span></a>&nbsp;&nbsp;&nbsp;
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                                <p><span class="badge" style="background-color: #1e7553;">Departments: </span><br>
                                    <?php if(count($department) > 0): ?>
                                        <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($dep->department_name); ?> 
                                            <br> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <span class="btn btn-primary btn-sm"><a data-toggle="modal" data-target="#dep_edit"><i class="fa fa-pencil fa-lg"> </i> Edit </a></span>
                                        <br>
                                        <span class="btn btn-primary"><a data-toggle="modal" data-target="#dep_add"><i class="fa fa-plus fa-lg"> </i> Add Department </a></span>&nbsp;&nbsp;&nbsp;
                                    <?php else: ?>
                                        None Set<br>
                                        <span class="btn btn-primary"><a data-toggle="modal" data-target="#dep_add"><i class="fa fa-plus fa-lg"> </i> Add Department </a></span>&nbsp;&nbsp;&nbsp;
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    

                <?php endif; ?>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="user_cred">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update User Credentials</h4>
        </div>
        <div class="modal-body">

            <form action="<?php echo e(route('ereception.user_cred')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                <label  style="color: #333;">First Name</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo e(auth()->user()->first_name); ?>">
                <label  style="color: #333;">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo e(auth()->user()->last_name); ?>">
                <label  style="color: #333;">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo e(auth()->user()->email); ?>">
                <label  style="color: #333;">Mobile Number</label>
                <input type="text" class="form-control" name="mobile_no" value="<?php echo e(auth()->user()->mobile_no ? auth()->user()->mobile_no : ''); ?>">
                <label  style="color: #333;">QR Code ID</label>
                <input type="text" class="form-control" name="rfid" value="<?php echo e(auth()->user()->rfid ? auth()->user()->rfid : ''); ?>">
                <label  style="color: #333;">Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="<?php echo e(auth()->user()->dob ? auth()->user()->dob : ''); ?>">
                <label  style="color: #333;">Gender</label>
                <select name="gender" id="gender"class="form-control">
                    <option value="<?php echo e(auth()->user()->gender); ?>"> Current Selection - <?php echo e(auth()->user()->gender); ?> </option>
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
                    <option value="Gender Diverse"> Gender Diverse </option>
                    <option value="Non Binary"> Non Binary </option>
                </select>
                </div>
                <button type="submit" name="submit" class="btn btn-success">
                    <i class="fa fa-pencil fa-lg"></i> Update
                </button>
            </form>
            <br>           
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   


  <div class="modal fade" tabindex="-1" role="dialog" id="comp_cred">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Company Credentials</h4>
        </div>
        <div class="modal-body">

            <form action="<?php echo e(route('ereception.comp_cred')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <?php if(count($company ?? '') > 0): ?>
                        <?php $__currentLoopData = $company ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label  style="color: #333;">Company Name</label>
                            <input type="text" class="form-control" name="company_name" value="<?php echo e($comp->company_name); ?>">
                            <label  style="color: #333;">Job Title</label>
                            <input type="text" class="form-control" name="job_title" value="<?php if(auth()->user()->job_title === 'Not Set'){ echo ' '; } else { ?> <?php echo e(auth()->user()->job_title); ?> <?php } ?>">
                            <label  style="color: #333;">Department</label>
                            <?php if(auth()->user()->company_id === 0): ?>
                                <select name="department_id" id="department_id"class="form-control">
                                    <option value="0"> -- ADD DEPARTMENTS TO SELECT -- </option>
                                </select>
                            <?php else: ?>
                            <select name="department_id" id="department_id"class="form-control">
                                    <option value="<?php echo e(auth()->user()->department_id); ?> " selected> Current Department ID -<?php echo e(auth()->user()->department_id); ?></option>
                                <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($dep->id); ?>"> <?php echo e($dep->department_name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>                        
                            <?php endif; ?>
                            <label  style="color: #333;">Head Office Address</label>
                        <input type="text" class="form-control" name="ho_address" value="<?php echo e($comp->ho_address ? $comp->ho_address : ''); ?>">
                            <label  style="color: #333;">Company Number</label>
                            <input type="text" class="form-control" name="company_number" value="<?php echo e($comp->company_number ? $comp->company_number : ''); ?>">
                            <label  style="color: #333;">VAT Number</label>
                            <input type="text" class="form-control" name="vat_number" value="<?php echo e($comp->vat_number ? $comp->vat_number : ''); ?>">
                            <input type="hidden" name="company_id" value="<?php echo e(auth()->user()->company_id); ?>">                     
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">
                                <i class="fa fa-pencil fa-lg"></i> Update
                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
            </form>
            <br>           
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->   

  <div class="modal fade" tabindex="-1" role="dialog" id="account_cred">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Account Credentials</h4>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('ereception.account_cred')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label  style="color: #333;">Account Classification</label>
                        <select name="classification" id="classification"class="form-control">
                            <option value="<?php echo e($ac->classification); ?>"> Current Selection - <?php echo e($ac->classification); ?> </option>
                            <option value="Business"> Business </option>
                            <option value="Education"> Education </option>
                            <option value="Health"> Health </option>
                        </select>   
                        <input type="hidden" name="company_id" value="<?php echo e(auth()->user()->company_id); ?>">                     
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">
                            <i class="fa fa-pencil fa-lg"></i> Update
                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
            <br>           
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->   
   

  <div class="modal fade" tabindex="-1" role="dialog" id="loc_add">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add New Location</h4>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('ereception.loc_add')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                    <input type="hidden" name="company_id" value="<?php echo e(auth()->user()->company_id); ?>">                     
                        <label  style="color: #333;">Location Name</label>
                        <input type="text" class="form-control" name="location_name">  
                        <label  style="color: #333;">Hub Number (Optional - If you have more than one hub at the same location)</label>
                        <input type="text" class="form-control" name="location_code">  
                        <label  style="color: #333;">Location Address</label>
                        <input type="text" class="form-control" name="location_address">  
                </div>
                        <button type="submit" name="submit" class="btn btn-success">
                            <i class="fa fa-plus fa-lg"></i> Submit
                        </button>
            </form>
            <br>           
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->   

  <div class="modal fade" tabindex="-1" role="dialog" id="loc_edit">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Location</h4>
        </div>
            <div class="modal-body">
            <?php if(count($location) > 0): ?>                  
            <form action="<?php echo e(route('ereception.loc_edit')); ?>" method="post">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                            <label  style="color: #333;">Location Name</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <label  style="color: #333;">Hub Number</label>&nbsp;&nbsp;
                            <label  style="color: #333;">Location Address</label>
                            <br>
                            <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span style="display: inline-block; color: #000;">
                                    <input type="hidden" name="location[<?php echo e($i); ?>][user_id]" value="<?php echo e(auth()->user()->id); ?>">
                                    <input type="hidden" name="location[<?php echo e($i); ?>][location_id]" value="<?php echo e($loc->id); ?>">        
                                    <input type="text" size="12" name="location[<?php echo e($i); ?>][location_name]" value="<?php echo e($loc->location_name); ?>">  
                                    <input type="text" size="8" name="location[<?php echo e($i); ?>][location_code]" value="<?php echo e($loc->location_code); ?>">  
                                    <input type="text" size="33" name="location[<?php echo e($i); ?>][location_address]" value="<?php echo e($loc->location_address); ?>">  
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>  
                <br><br>                          
                            <button type="submit" name="submit" class="btn btn-success">
                                <i class="fa fa-pencil fa-lg"></i> Update
                            </button>
            </form>
            <br>           
            <?php else: ?> 
                <br>
                <p style="color: #333;">None Set</p>
                <br>
            <?php endif; ?>
        </div><!-- /.modal-body -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <div class="modal fade" tabindex="-1" role="dialog" id="dep_add">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add New Location</h4>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('ereception.dep_add')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">                     
                    <input type="hidden" name="company_id" value="<?php echo e(auth()->user()->company_id); ?>">                     
                        <label  style="color: #333;">Department Name</label>
                        <input type="text" class="form-control" name="department_name">  
                </div>
                        <button type="submit" name="submit" class="btn btn-success">
                            <i class="fa fa-plus fa-lg"></i> Submit
                        </button>
            </form>
            <br>           
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->   

  <div class="modal fade" tabindex="-1" role="dialog" id="dep_edit">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Department(s)</h4>
        </div>
            <div class="modal-body">
            <?php if(count($location) > 0): ?>                  
            <form action="<?php echo e(route('ereception.dep_edit')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                            <label  style="color: #333;">Department Name</label>
                         <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="department[<?php echo e($i); ?>][user_id]" value="<?php echo e(auth()->user()->id); ?>">   
                            <input type="hidden" name="department[<?php echo e($i); ?>][company_id]" value="<?php echo e(auth()->user()->company_id); ?>">   
                            <input type="hidden" class="form-control" name="department[<?php echo e($i); ?>][department_id]" value="<?php echo e($dep->id); ?>">  
                            <input type="text" class="form-control" name="department[<?php echo e($i); ?>][department_name]" value="<?php echo e($dep->department_name); ?>" required>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>                    
                            <button type="submit" name="submit" class="btn btn-success">
                                <i class="fa fa-pencil fa-lg"></i> Update
                            </button>
            </form>
            <br>           
            <?php else: ?> 
                <br>
                <p style="color: #333;">None Set</p>
                <br>
            <?php endif; ?>
        </div><!-- /.modal-body -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div class="modal fade" tabindex="-1" role="dialog" id="company_logo_upload">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="color: #333;">Upload or Update your Company Logo</h4>
        </div>
        <div class="modal-body">
            <!-- Upload Cover Image Form -->
            <form id="c_logo_upload_form" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label style="color: #333;">Upload your Company Logo</label>
                    <input type="file" class="form-control" name="c_logo" id="c_logo">          
                </div>
                <button type="submit" name="submit" class="btn btn-success" onclick="uploadCompLogo()">
                    <i class="fa fa-upload"></i> Upload Company logo
                </button>
                <br><br>
                <center>
                <progress id="progressBar" value="0" max="100" style="width:250px;"></progress>
                <h3 id="status" style="color: #333;"></h3>
                <p id="loaded_n_total" style="color: #333;"></p>
                </center>
        </form>  
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script>   
        function uploadCompLogo(){
            var file = document.getElementById("c_logo").files[0];
            var formdata = new FormData();
            formdata.append("c_logo", file);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "<?php echo e(route('clogo.store')); ?>");
            ajax.send(formdata);
        }
        function progressHandler(event){
            document.getElementById("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
            var percent = (event.loaded / event.total) * 100;
            document.getElementById("progressBar").value = Math.round(percent);
            document.getElementById("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
        }
        function completeHandler(event){
            document.getElementById("status").innerHTML = event.target.responseText;
            document.getElementById("progressBar").value = 0;
            $('#c_logo_upload_form')[0].reset();
        }
        function errorHandler(event){
            document.getElementById("status").innerHTML = "Upload Failed";
        }
        function abortHandler(event){
            document.getElementById("status").innerHTML = "Upload Aborted";
        }
    </script>  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/account.blade.php ENDPATH**/ ?>