@extends('layouts.web')

@section('content')
<br><br>
<div class="jumbotron jumbo_serv" style="padding: 0px;">
   <!-- <img style="width: 100%;" src="../../storage/images/services_banner.jpg"> -->
<center>
	<br><br><br><br><br>
	<h1 style="font-size: 60px; font-weight: 900;-webkit-text-stroke-width: 2px; -webkit-text-stroke-color: black;">Our Services</h1>
	</center>
</div>
<br>
<div class="container"  style="padding 50px; border-radius: 20px; background-color: rgba(255,255,255,0.2);">
	<div class="row">
		<div class="col-sm-12 col-md-3">
			<img src="/storage/company_logos/1591959064-1585212970-Cornerstone_logo.jpg" style="width: 100%; margin-top: 50px;">
		</div>
		<div class="col-sm-12 col-md-9" style="color: #333;">
			<br><br>
			<h3>What we do.....</h3><br>

			<span style="color: #333; font-size: 16px;">eReception Hub is just one of our software developments. Our umbrella company, Cornerstone Retail Services, design's software that enhances productivity, security and essentially saves you money, as well as a host of other services.<br><br>
				<center>
				<a href="https://ereceptionhub.co.uk/register" class="btn btn-primary" style="width: 200px;"> Register Now! </a>
				</center>
				<br><br>
				You can find out more about other services we offer <a href="https://cornerstoneretail.co.uk" target="_blank">here</a>.<br><br>
			</span>
		</div>
	</div>
<div class="row" style="color: #333; text-align: center; padding 50px;">
	<div class="col-sm-12"><h3>Company Core Values</h3><br></div>
	<div class="col-sm-12 col-md-1"></div>
	<div class="col-sm-12 col-md-2">
		<img src="https://www.cornerstoneretail.co.uk/cornerstone/storage/images/relationships.png" style="width: 100%; margin-top: 50px;"><br>
		<p style="padding-top: 20px;"><img style="display: inline;" src="https://www.cornerstoneretail.co.uk/cornerstone/storage/images/S.png">trengthen &amp; Develop Relationships</p>
	</div>
	<div class="col-sm-12 col-md-2">
		<img src="https://www.cornerstoneretail.co.uk/cornerstone/storage/images/efficiency.png" style="width: 100%; margin-top: 50px;"><br>
		<p style="padding-top: 20px;"><img style="display: inline;" src="https://www.cornerstoneretail.co.uk/cornerstone/storage/images/M.png">aximise Efficiency</p>
	</div>
	<div class="col-sm-12 col-md-2">
		<img src="https://www.cornerstoneretail.co.uk/cornerstone/storage/images/acc_quality.png" style="width: 100%; margin-top: 50px;"><br>
		<p style="padding-top: 20px;"><img style="display: inline;" src="https://www.cornerstoneretail.co.uk/cornerstone/storage/images/A.png">ccountability &amp; Quality</p>
	</div>
	<div class="col-sm-12 col-md-2">
		<img src="https://www.cornerstoneretail.co.uk/cornerstone/storage/images/hon_resp.png" style="width: 100%; margin-top: 50px;"><br>
		<p style="padding-top: 20px;"><img style="display: inline;" src="https://www.cornerstoneretail.co.uk/cornerstone/storage/images/R.png">espect &amp; Honesty</p>
	</div>
	<div class="col-sm-12 col-md-2">
		<img src="https://www.cornerstoneretail.co.uk/cornerstone/storage/images/team.png" style="width: 100%; margin-top: 50px;"><br>
		<p style="padding-top: 20px;"><img style="display: inline;" src="https://www.cornerstoneretail.co.uk/cornerstone/storage/images/T.png">eamwork &amp; Professionalism</p>
	</div>
	<div class="col-sm-12 col-md-1"></div>
</div>
<div class="row">
		<div class="col-sm-12 col-md-6">
			<br>
			<img src="/storage/images/development.jpg" style="width: 100%; border: 1px solid #333;">
		</div>		
		<div class="col-sm-12 col-md-6" style="color: #333; font-size: 30px;">
			<br>
			We design bespoke software with you in mind. <a href="contact">Contact us</a> now for more information.
		</div>

</div>	
	<br><br>
</div>

<br>

<script>
    $(document).ready(function () {
        $(".nav-item").removeClass("active");
        $('#services').addClass('active');
    });
</script>
@endsection
