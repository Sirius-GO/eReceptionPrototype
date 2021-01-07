@extends('layouts.web')

@section('content')
    <br><br>
    @include('inc.carousel')
    <br>
    <center>
            <img src="../../storage/images/logo.png"><br>
            <h2 style="color: #222; font-weight: 600;">Digital Sign-in for Staff, Visitors, Contractors, Deliveries and Collections</h2>
            <h3 style="color: #222;">Replace your paper visitors book and safeguard your personal information</h3>
    </ceneter>
    
<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mybox">
        <div class="mybox2">
            <div style="background-color: rgba(187, 211, 73, 0.5); padding: 10px; margin: -10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <h3 style="font-weight: 700; color: #eee;">Key Features</h3>
            </div>
            <br>
            <ul class="uls" style="text-align: left; font-size: 15px;">
                <li>Unlimited Sign In's</li><br>
                <li>Email Notifications</li><br>
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
                Packages start from only £35.00 per calendar month.
            </p>        
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mybox">
        <div class="mybox2">
            <div style="background-color: rgba(188, 138, 99, 0.5); padding: 10px; margin: -10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <h3 style="font-weight: 700; color: #804738;">Bronze</h3>
            </div>
            <br>
            <center><img src="../../storage/images/bronze.png" style="width: 120px;"></center>
        <hr>
        <ul class="uls">
            <li>Unlimited Sign-in's</li>
            <li>Secure Access</li>
            <li>Real-Time Dashboard</li>
            <li>Fire Drills / Reporting *</li>
            <li>Unlimited Email Notifications</li>
            <li>Custom Branding / Hub Environment Settings</li>
            <li>GDPR Compliant</li>
			<li>Currently Signed In Report</li>
			<li>Visitor Parking Report</li>
			<li>User Administration / Bulk Registration</li>
        <hr>
        * Extensive Fire Reports
        <br>         
        <a href="" class="btn btn-primary" style="position: absolute; bottom: 10px; width: 120px; left: 50%; margin-left: -60px;"> Find Out More </a>
        </ul>

        <br>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mybox">
    <div class="mybox2">
        <div style="background-color: rgba(139, 139, 139, 0.5); padding: 10px; margin: -10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <h3 style="font-weight: 700; color: #505050;">Silver</h3>
        </div>
        <br>
    <center><img src="../../storage/images/silver.png" style="width: 120px;"></center>
        <hr>
        <ul class="uls">
            <h6>Everything offered in Bronze, plus</h6>
            <li>Bespoke Documentation with E-Sign</li>
            <li>Staff ID Badge Printing *</li>
            <li>Visitor Pass Printing</li>
            <li>Pre Register Visitors</li>
            <li>Staff Photos</li>
            <li>Failed to Sign Out Report **</li>
			<li>eReception Hub Message</li>
            <br>
            <br>
            <hr>
            * Printer required
            <br>
            ** Flags anybody onsite for more than 15 hours
            <a href="" class="btn btn-primary" style="position: absolute; bottom: 10px; width: 120px; left: 50%; margin-left: -60px;"> Find Out More </a>
        </ul>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3 mybox">
        <div class="mybox2">
            <div style="background-color: rgba(216, 152, 68, 0.5); padding: 10px; margin: -10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <h3 style="font-weight: 700; color: #863e1b;">Gold</h3>
            </div>
            <br>
                <center><img src="../../storage/images/gold.png" style="width: 120px;"></center>
            <hr>
        <ul class="uls">
            <h6>Everything offered in Silver, plus</h6>
            <li>Hourly Paid Attendance Data Export *</li>
			<li>Site Attendance Staff Data Export</li>
			<li>Site Attendance Visitors Data Export</li>
            <li>Deliveries and Collections Report</li>
			<li>Contractors Attendance Report</li>
			<li>Combined Attendance Report</li>
            <li>Forced Sign Out Report</li>
            <li>1 x Bespoke Report of your choice **</li>
			<li>Future Updates Included</li>
            <hr>
            * Download a Spreadsheet for payroll
            <br>
	    	** Within System Parameters
            <a href="" class="btn btn-primary" style="position: absolute; bottom: 10px; width: 120px; left: 50%; margin-left: -60px;"> Find Out More </a>
        </ul>
        </div>
    </div>  
</div>  
<div style="text-align: left;">
@include('inc.contactform')
</div>
<script>
    $(document).ready(function () {
        $(".nav-item").removeClass("active");
        $('#home').addClass('active');
    });
</script>

@endsection

