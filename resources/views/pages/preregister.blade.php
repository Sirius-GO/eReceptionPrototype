@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.preregister') }}</h2></div>

                <div class="panel-body">
					<p>Pre registering visitors streamlines the visiting process. By completing this form, your visitor will be emailed with a unique QR code and instructions how to <b>Scan In</b>, on their arrival. Visitors can scan the QR code directly from their email on their smartphone, or alternatively, they can print the email and scan their hard copy. </p> 
<br>
					<p>All fields are required, except Car Registration, which is optional.</p>
					
					
					
<form action="{{ route('pre.register') }}"  method="POST">
	{{ csrf_field() }}
    <div class="row">
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
			<label>First Name</label>
            <input type="text" name="first_name" class="form-control" placeholder="First Name (Max 50 Chars)" maxlength="50" required>
        </div>
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" placeholder="Last Name (Max 50 Chars)" maxlength="50" required>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <label>Email Address</label>
            <input type="text" name="email" class="form-control" placeholder="Email Address (Max 50 Chars)" maxlength="50" required>
        </div>
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <label>Mobile Number</label>
            <input type="text" name="mobile" class="form-control" placeholder="Mobile (Max 15 Chars)" maxlength="15" required>
        </div>
    </div>
    <div class="row">
		<div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <label>Company Name</label>
            <input type="text" name="company" class="form-control" placeholder="Company Name (Max 100 Chars)" maxlength="100" required>
        </div> 
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            <label>Job Title</label>
            <input type="text" name="job_title" class="form-control" placeholder="Mobile (Max 100 Chars)" maxlength="100" required>
        </div>      
    </div>   
    <div class="row">
 
		<div class="col-12 col-12-sm col-md-4 col-lg-4 col-xl-4">
            <label>Meeting Date</label>
            <input type="date" name="mdate" class="form-control" maxlength="10" required>
        </div>  
		<div class="col-12 col-12-sm col-md-4 col-lg-4 col-xl-4">
            <label>Meeting Time</label>
            <input type="time" name="mtime" class="form-control" maxlength="10" required>
        </div> 
		<div class="col-12 col-12-sm col-md-4 col-lg-4 col-xl-4">
            <label>Car Registration</label>
            <input type="text" name="car_reg" class="form-control" placeholder="Car Registration (Max 10 Chars)" maxlength="10">
        </div>     
	</div> 
	<div class="row">
        <div class="col-12">
            <br>
			<button type="submit" class="btn btn-primary"> Confirm </button>
        </div>
    </div>
</form>
<br><br>					
					
					
					
					
					
					
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
