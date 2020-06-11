<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2><?php echo e(__('messages.settings')); ?></h2></div>

                <div class="panel-body" style="margin-left: 30px;">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"><div style="height: 200px;">
                        <p><span class="badge" style="background-color: #1e7553;">Hub Display Settings: </span><br>
                            <form action="<?php echo e(route('environment.choice')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <?php if(count($layout ?? '') > 0): ?>
                                    <?php $__currentLoopData = $layout ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label>Show.. </label><br>
                                        <label>Background Image</label>                                            
                                        <input type="radio" name="bg" value="image" class="checkmark" <?php echo ($l->choice === 'image')?'checked':''; ?>><br>
                                        <label>Background Colour</label>
                                        <input type="radio" name="bg" value="colour" class="checkmark" <?php echo ($l->choice === 'colour')?'checked':''; ?>><br>
                                        <br><button class="btn btn-primary" type="submit" style="position: absolute; bottom: 5px; width: 90%; left: 50%; margin-left: -45%;">
                                            <i class="fa fa-check"></i> Update
                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </form>
                            <br><br>
                    </div></div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"><div style="height: 200px;">
                        <p><span class="badge" style="background-color: #1e7553;">Hub Wallpaper Preview: </span><br>
                            <!-- Show Company Logo or Default Image -->
                            <center>
                            <?php if(count($layout ?? '') > 0): ?>
                                <?php $__currentLoopData = $layout ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($l->bg_image == ''): ?>
                                        <img src="http://localhost:8080/ereceptionhub/storage/app/public/background_images/wallpaper_C4D.jpg" height="100px" style="max-width: 98%">
                                    <?php else: ?> 
                                        <img src="http://localhost:8080/ereceptionhub/storage/app/public/background_images/<?php echo e($l->bg_image); ?>" height="100px" style="max-width: 98%">
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </center>
                        </p>
                        <a data-toggle="modal" data-target="#bg_image_upload"><span class="btn btn-primary" style="position: absolute; bottom: 5px; width: 90%; left: 50%; margin-left: -45%;"> <i class="fa fa-image fa-lg"> </i> <?php echo e(__('messages.bg')); ?> </span></a>
                    </div></div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"><div style="height: 200px;">
                        <p><span class="badge" style="background-color: #1e7553;">Background Colour Preview: </span><br>
                            <?php if(count($layout ?? '') > 0): ?>
                            <?php $__currentLoopData = $layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $bg_col = $l->bg_colour; ?>
                                <div style="position: absolute; width: 80%; height: 100px; left: 50%; margin-left: -40%; background-color: <?php echo $bg_col; ?>; border-radius: 10px;"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <button class="btn btn-primary" data-toggle="modal" data-target="#colourPick" style="position: absolute; bottom: 5px; width: 90%; left: 50%; margin-left: -45%;"> 
                                <i class="fa fa-tint fa-lg"> </i> <?php echo e(__('messages.bgcol')); ?> 
                            </button>
                            <br><br>
                    </div></div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"><div style="height: 200px;">
                        <p><span class="badge" style="background-color: #1e7553;">Button Colour Preview: </span><br>
                            <?php if(count($layout ?? '') > 0): ?>
                            <?php $__currentLoopData = $layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $h = $l->hue; 
                                    $s = $l->sat;                                 
                                ?>
                                <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/staff.png" style="margin-top: 10px; max-width: 90%; -webkit-filter: hue-rotate(<?php echo $h."deg"; ?>) saturate(<?php echo $s; ?>);">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
        
                        <a href="hue_sat" class="btn btn-primary" style="position: absolute; bottom: 5px; width: 90%; left: 50%; margin-left: -45%;"> <i class="fa fa-paint-brush fa-lg"> </i> <?php echo e(__('messages.btncol')); ?> </a><br><br>
                    </div></div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"><div style="height: 200px;">
                        <p><span class="badge" style="background-color: #1e7553;">Prompt Colour Preview: </span><br>
                            <?php if(count($layout ?? '') > 0): ?>
                            <?php $__currentLoopData = $layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $w_col = $l->welcome_col; 
                                    $w_s = $l->welcome_stroke; 
                                    $w_sc = $l->welcome_stroke_col; 
                                ?>
                                <div style="font-size: 60px; font-weight: 900; color: <?php echo $w_col; ?>; -webkit-text-stroke-color: <?php echo $w_sc; ?>; -webkit-text-stroke-width: <?php echo $w_s; ?>px; text-align: center;">TEXT</div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <button class="btn btn-primary" data-toggle="modal" data-target="#txtPick" style="position: absolute; bottom: 5px; width: 90%; left: 50%; margin-left: -45%;"> 
                                <i class="fa fa-cog fa-lg"> </i> <?php echo e(__('messages.txt')); ?> 
                            </button>
                            <br><br>
                    </div></div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"><div style="height: 200px;">
                        <p><span class="badge" style="background-color: #1e7553;">Employee Pass Colour Preview: </span><br>
                            <?php if(count($layout ?? '') > 0): ?>
                            <?php $__currentLoopData = $layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $h = $l->hue_pass; 
                                    $s = $l->sat_pass;                                 
                                ?>
                                <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/Access_Pass_v2.png" style="width: 70%; margin-left: 15%; -webkit-filter: hue-rotate(<?php echo $h."deg"; ?>) saturate(<?php echo $s; ?>); border: solid 1px #000;">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
        
                        <a href="hue_sat_pass" class="btn btn-primary" style="position: absolute; bottom: 5px; width: 90%; left: 50%; margin-left: -45%;"> <i class="fa fa-paint-brush fa-lg"> </i> <?php echo e(__('messages.pass_col')); ?> </a><br><br>
                    </div></div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3"><div style="height: 200px;">
                        <p><span class="badge" style="background-color: #1e7553;">Visitor Pass Colour Preview: </span><br>
                            <?php if(count($layout ?? '') > 0): ?>
                            <?php $__currentLoopData = $layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $h = $l->hue_vis; 
                                    $s = $l->sat_vis;                                 
                                ?>
                                <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/Access_Pass_Visitor_v2.png" style="width: 70%; margin-left: 15%; -webkit-filter: hue-rotate(<?php echo $h."deg"; ?>) saturate(<?php echo $s; ?>); border: solid 1px #000;">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
        
                        <a href="hue_sat_vis" class="btn btn-primary" style="position: absolute; bottom: 5px; width: 90%; left: 50%; margin-left: -45%;"> <i class="fa fa-paint-brush fa-lg"> </i> <?php echo e(__('messages.vis_col')); ?> </a><br><br>
                    </div></div>



                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" tabindex="-1" role="dialog" id="bg_image_upload">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="color: #333;">Upload or Update your Hub Wallpaper</h4>
        </div>
        <div class="modal-body">
            <!-- Upload Cover Image Form -->
            <form id="wallpaper_upload_form" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label style="color: #333;">Upload your Hub Wallpaper</label>
                    <input type="file" class="form-control" name="wallpaper" id="wallpaper">          
                </div>
                <button type="submit" name="submit" class="btn btn-success" onclick="uploadWallpaper()">
                    <i class="fa fa-upload"></i> Upload Hub Wallpaper
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
        function uploadWallpaper(){
            var file = document.getElementById("wallpaper").files[0];
            var formdata = new FormData();
            formdata.append("wallpaper", file);
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
            ajax.open("POST", "<?php echo e(route('environment.wallpaperstore')); ?>");
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
            $('#wallpaper_upload_form')[0].reset();
        }
        function errorHandler(event){
            document.getElementById("status").innerHTML = "Upload Failed";
        }
        function abortHandler(event){
            document.getElementById("status").innerHTML = "Upload Aborted";
        }
    </script>  



<div class="modal fade" tabindex="-1" role="dialog" id="colourPick">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="color: #333;">Colour Selector</h4>
        </div>
        <div class="modal-body">
            <!-- Report Image button -->
            <center>
            <form action="<?php echo e(route('colour.select')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label style="color: #333;">Please Select a Colour</label>
                    <input type="color" style="width: 250px;" class="form-control" id="colour" name="colour" value="#62DED1">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="fa fa-paint-brush fa-lg"></i> Select Colour
                </button>
            </form>
            </center>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



  <div class="modal fade" tabindex="-1" role="dialog" id="txtPick">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="color: #333;">Change Hub Text Settings</h4>
        </div>
        <div class="modal-body">
            <!-- Report Image button -->
            <center>
            <form action="<?php echo e(route('txt.pick')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label style="color: #333;">Please Select Text Colour</label>
                    <input type="color" style="width: 250px;" class="form-control" id="colour" name="colour" value="<?php echo $w_col; ?>">
                    <label style="color: #333;">Please Select Stroke Colour</label>
                    <input type="color" style="width: 250px;" class="form-control" id="stc" name="stc" value="<?php echo $w_sc; ?>">
                    <label style="color: #333;">Please Select Stroke Width</label>
                    <input type="range"  style="width: 250px;" class="form-control" min="0" max="5" step="0.5" name="stw" value="<?php echo $w_s; ?>" onchange="updateTextInput(this.value);">
                    <label style="color: #333;">Range Output: </label><input type="text" id="textInput" class="form-control"  style="width: 50px;" value="<?php echo $w_s; ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="fa fa-cog fa-lg"></i> Update Hub Text
                </button>
            </form>
            </center>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<script>
    //Show Range Slider Output
    function updateTextInput(val) {
        document.getElementById('textInput').value=val; 
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/settings.blade.php ENDPATH**/ ?>