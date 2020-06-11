<?php $__env->startSection('content'); ?>
    <br><br>
    <?php echo $__env->make('inc.carousel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <br>
    <center>
            <img src="../../ereceptionhub/storage/app/public/images/logo.png"><br>
            <h2 style="color: #222; font-weight: 600;">Digital Sign-in for Staff, Visitors, Contractors, Deliveries and Collections</h2>
            <h3 style="color: #222;">Replace your paper visitors and safeguard your personal information</h3>
    </ceneter>
    
<div class="row">
    <div class="col-12 col-md-6 col-lg-3 mybox">
        <div class="mybox2">
            <div style="background-color: rgba(187, 211, 73, 0.5); padding: 10px; margin: -10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <h3 style="font-weight: 700; color: #eee;">Key Features</h3>
            </div>
            <br>
            <ul class="uls" style="text-align: left; font-size: 15px;">
                <li>Unlimited Sign In's</li><br>
                <li>Email or SMS Notifications</li><br>
                <li>QR Code Sign In / Out</li><br>
                <li>Pre Register Visitors</li><br>
                <li>Fire Safety</li><br>
                <li>Staff ID and Visitor Pass Printing</li><br>
                <li>Modern First Impression</li><br>
            </ul>
            <hr>
            <p style="text-align: left; margin-left: 10px;">
                Note! Please see the feature list for each package to find out which features are included.
                <br><br>
                Packages start from only £25.00 per calendar month.
            </p>        
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3 mybox">
        <div class="mybox2">
            <div style="background-color: rgba(188, 138, 99, 0.5); padding: 10px; margin: -10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <h3 style="font-weight: 700; color: #804738;">Bronze</h3>
            </div>
            <br>
            <center><img src="../../ereceptionhub/storage/app/public/images/bronze.png" style="width: 120px;"></center>
        <hr>
        <ul class="uls">
            <li>Unlimited Sign-in's</li>
            <li>Secure Access</li>
            <li>Real-Time Dashboard</li>
            <li>Data Exports *</li>
            <li>Unlimited Notifications **</li>
            <li>Custom Branding</li>
            <li>GDPR Compliant</li>
            <li>Health & Safety Briefing</li>
            <li>Digital Sigantures</li>
            <li>Visitor Experience Feedback</li>
        <hr>
        * Extensive Fire, Staff and Visitor Reports
        <br>
        ** Email or SMS. SMS attracts extra charges          
        <a href="" class="btn btn-primary" style="position: absolute; bottom: 10px; width: 120px; left: 50%; margin-left: -60px;"> Find Out More </a>
        </ul>

        <br>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mybox">
    <div class="mybox2">
        <div style="background-color: rgba(139, 139, 139, 0.5); padding: 10px; margin: -10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <h3 style="font-weight: 700; color: #505050;">Silver</h3>
        </div>
        <br>
    <center><img src="../../ereceptionhub/storage/app/public/images/silver.png" style="width: 120px;"></center>
        <hr>
        <ul class="uls">
            <h6>Everything offered in Bronze, plus</h6>
            <li>Bespoke Documentation with E-Sign</li>
            <li>Staff ID Badge Printing *</li>
            <li>Visitor Pass Printing **</li>
            <li>Parking Registraion</li>
            <li>Pre Register Visitors</li>
            <li>Staff Photos</li>
            <br>
            <br>
            <br>
            <hr>
            * External ID badge printer required
            <br>
            ** Photo ID not included
            <a href="" class="btn btn-primary" style="position: absolute; bottom: 10px; width: 120px; left: 50%; margin-left: -60px;"> Find Out More </a>
        </ul>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mybox">
        <div class="mybox2">
            <div style="background-color: rgba(216, 152, 68, 0.5); padding: 10px; margin: -10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <h3 style="font-weight: 700; color: #863e1b;">Gold</h3>
            </div>
            <br>
                <center><img src="../../ereceptionhub/storage/app/public/images/gold.png" style="width: 120px;"></center>
            <hr>
        <ul class="uls">
            <h6>Everything offered in Silver, plus</h6>
            <li>Payroll Data Export</li>
            <li>Visitor Photos</li>
            <li>Clocking and Payroll *</li>
            <li>Future Updates Included</li>
            <br>
            <br>
            <br>
            <br>
            <br>
            <hr>
            * Download a CSV for Sage or Xero
            <br>

            <a href="" class="btn btn-primary" style="position: absolute; bottom: 10px; width: 120px; left: 50%; margin-left: -60px;"> Find Out More </a>
        </ul>
        </div>
    </div>  
</div>  
<div style="text-align: left;">
<?php echo $__env->make('inc.contactform', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<script>
    $(document).ready(function () {
        $(".nav-item").removeClass("active");
        $('#home').addClass('active');
    });
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/website/index.blade.php ENDPATH**/ ?>