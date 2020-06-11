<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <a href="/ereceptionhub/public/firesafety" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-arrow-left"> </i> Go Back </a>
                <div class="panel-header"><h2><?php echo e(__('messages.daily')); ?></h2></div>

                <div class="panel-body">

                    <form action="<?php echo e(route('pagescontroller.daily_checklist')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <h3 style="color: #ffdd00;">Escape Routes</h3>
                        <!-- ============== DQ1 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q1. Can all fire exits be opened immediately and easily?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response1" id="response1" onclick="divid1(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response1" id="response1" onclick="divid1(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <br>
                            <div id="report1" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report1" maxlength="500"> 
                            </div>
                            <script>
                                function divid1(val){
                                    var response1 = val;
                                    if(response1 === 'YES'){ document.getElementById('report1').style.display = 'none'; }
                                    if(response1 === 'NO'){ document.getElementById('report1').style.display = 'block'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <!-- ============== DQ2 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q2. Are all fire exits clear of obstructions?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response2" id="response2" onclick="divid2(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response2" id="response2" onclick="divid2(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <br>
                            <div id="report2" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report2" maxlength="500"> 
                            </div>
                            <script>
                                function divid2(val){
                                    var response2 = val;
                                    if(response2 === 'YES'){ document.getElementById('report2').style.display = 'none'; }
                                    if(response2 === 'NO'){ document.getElementById('report2').style.display = 'block'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <!-- ============== DQ3 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q3. Are all escape routes clear?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response3" id="response3" onclick="divid3(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response3" id="response3" onclick="divid3(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <br>
                            <div id="report3" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report3" maxlength="500"> 
                            </div>
                            <script>
                                function divid3(val){
                                    var response3 = val;
                                    if(response3 === 'YES'){ document.getElementById('report3').style.display = 'none'; }
                                    if(response3 === 'NO'){ document.getElementById('report3').style.display = 'block'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <!-- ============== DQ4 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q4. Is the perimeter of the building clear and safe?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response4" id="response4" onclick="divid4(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response4" id="response4" onclick="divid4(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <span style="font-size: 17px;">
                                N/A: <input type="radio" name="response4" id="response4" onclick="divid4(this.value)" class="checkmark" value="NA" required>
                            </span><br>
                            <div id="report4" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report4" maxlength="500"> 
                            </div>
                            <script>
                                function divid4(val){
                                    var response4 = val;
                                    if(response4 === 'YES'){ document.getElementById('report4').style.display = 'none'; }
                                    if(response4 === 'NO'){ document.getElementById('report4').style.display = 'block'; }
                                    if(response4 === 'NA'){ document.getElementById('report4').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <h3 style="color: #ffdd00;">Fire Alarm Systems</h3>
                        <!-- ============== DQ5 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q5. Is the fire indicator panel showing normal?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response5" id="response5" onclick="divid5(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response5" id="response5" onclick="divid5(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <span style="font-size: 17px;">
                                N/A: <input type="radio" name="response5" id="response5" onclick="divid5(this.value)" class="checkmark" value="NA" required>
                            </span><br>
                            <div id="report5" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report5" maxlength="500"> 
                            </div>
                            <script>
                                function divid5(val){
                                    var response5 = val;
                                    if(response5 === 'YES'){ document.getElementById('report5').style.display = 'none'; }
                                    if(response5 === 'NO'){ document.getElementById('report5').style.display = 'block'; }
                                    if(response5 === 'NA'){ document.getElementById('report5').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <!-- ============== DQ6 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q6. Are sounders and bells in place?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response6" id="response6" onclick="divid6(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response6" id="response6" onclick="divid6(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <span style="font-size: 17px;">
                                N/A: <input type="radio" name="response6" id="response6" onclick="divid6(this.value)" class="checkmark" value="NA" required>
                            </span><br>
                            <div id="report6" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report6" maxlength="500"> 
                            </div>
                            <script>
                                function divid6(val){
                                    var response6 = val;
                                    if(response6 === 'YES'){ document.getElementById('report6').style.display = 'none'; }
                                    if(response6 === 'NO'){ document.getElementById('report6').style.display = 'block'; }
                                    if(response6 === 'NA'){ document.getElementById('report6').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <!-- ============== DQ7 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q7. Are all emergency lights and exit signs in good condition and undamaged?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response7" id="response7" onclick="divid7(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response7" id="response7" onclick="divid7(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <br>
                            <div id="report7" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report7" maxlength="500"> 
                            </div>
                            <script>
                                function divid7(val){
                                    var response7 = val;
                                    if(response7 === 'YES'){ document.getElementById('report7').style.display = 'none'; }
                                    if(response7 === 'NO'){ document.getElementById('report7').style.display = 'block'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <h3 style="color: #ffdd00;">Fire Equipment</h3>
                        <!-- ============== DQ8 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q8. Are all fire points in good order?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response8" id="response8" onclick="divid8(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response8" id="response8" onclick="divid8(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <br>
                            <div id="report8" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report8" maxlength="500"> 
                            </div>
                            <script>
                                function divid8(val){
                                    var response8 = val;
                                    if(response8 === 'YES'){ document.getElementById('report8').style.display = 'none'; }
                                    if(response8 === 'NO'){ document.getElementById('report8').style.display = 'block'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <!-- ============== DQ9 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q9. Are all fire extinguishers in place, clearly visible and off the floor?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response9" id="response9" onclick="divid9(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response9" id="response9" onclick="divid9(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <br>
                            <div id="report9" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report9" maxlength="500"> 
                            </div>
                            <script>
                                function divid9(val){
                                    var response9 = val;
                                    if(response9 === 'YES'){ document.getElementById('report9').style.display = 'none'; }
                                    if(response9 === 'NO'){ document.getElementById('report9').style.display = 'block'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <h3 style="color: #ffdd00;">House Keeping</h3>
                        <!-- ============== DQ10 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q10. Are any electrical sockets overloaded?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response10" id="response10" onclick="divid10(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response10" id="response10" onclick="divid10(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <br>
                            <div id="report10" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report10" maxlength="500"> 
                            </div>
                            <script>
                                function divid10(val){
                                    var response10 = val;
                                    if(response10 === 'YES'){ document.getElementById('report10').style.display = 'block'; }
                                    if(response10 === 'NO'){ document.getElementById('report10').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <!-- ============== DQ11 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q11. Are rubbish skips and bins kept securely away from the building?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response11" id="response11" onclick="divid11(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response11" id="response11" onclick="divid11(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <span style="font-size: 17px;">
                                N/A: <input type="radio" name="response11" id="response11" onclick="divid11(this.value)" class="checkmark" value="NA" required>
                            </span><br>
                            <div id="report11" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report11" maxlength="500"> 
                            </div>
                            <script>
                                function divid11(val){
                                    var response11 = val;
                                    if(response11 === 'YES'){ document.getElementById('report11').style.display = 'none'; }
                                    if(response11 === 'NO'){ document.getElementById('report11').style.display = 'block'; }
                                    if(response11 === 'NA'){ document.getElementById('report11').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <!-- ============== DQ12 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q12. Is all rubbish, within the buidling, organised and safely stored (Away from any heat sources or electrics)?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response12" id="response12" onclick="divid12(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response12" id="response12" onclick="divid12(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <br>
                            <div id="report12" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report12" maxlength="500"> 
                            </div>
                            <script>
                                function divid12(val){
                                    var response12 = val;
                                    if(response12 === 'YES'){ document.getElementById('report12').style.display = 'none'; }
                                    if(response12 === 'NO'){ document.getElementById('report12').style.display = 'block'; }
                                }
                            </script>
                            <hr>
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

<?php echo $__env->make('layouts.fire', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/daily_checklist.blade.php ENDPATH**/ ?>