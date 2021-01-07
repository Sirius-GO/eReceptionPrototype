@extends('layouts.app2')

<?php
	use App\Account;
	$accounts_check = Account::where('company_id', auth()->user()->company_id)->get();

		if(count($accounts_check) > 0){
			foreach($accounts_check as $a){
				//Get Vars
				$active = $a->status;
				$sub_type = $a->type;
			}
		}
?>
@section('content')
@include('inc.status_check')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.reports') }}</h2></div>

                <div class="panel-body">
					<br>
					
					@if($sub_type === 'Gold')
					<div style="max-width: 90%; width: 400px; margin: auto; padding: 20px; border: solid 1px #fff; background-color: rgba(255,255,255,0.3);">
						<!-- Set Start and End Date -->
						<form action="{{ route('download.report')}}" method="post">
							{{ csrf_field() }}
							<h4>Attendance and Payroll Reports</h4>
							<label>Start Date:</label>
							<input type="date" name="start_date" class="form-control" required>
							<label>End Date:</label>
							<input type="date" name="end_date" class="form-control" required>
							<label>Report Type:</label>
							<select name="report_type" class="form-control" required style="color: #333;">
								<option value=""> Choose a Report Type </option>
								<option value="" disabled> ------------------------------------- </option>
								<option value="Hourly_Paid"> Hourly Paid Payroll Report </option>
								<option value="All_Staff"> Staff Attendance Report </option>
								<option value="Visitors"> Visitor Attendance Report </option>
								<option value="Del_Collect"> Deliveries and Collections Report </option>
								<option value="Contractors"> Contractors Attendance Report </option>
								<option value="All"> Combined Attendance Report </option>
								<option value="Forced"> Forced Sign Out Report </option>
							</select>
							<br><br> 
							<button class="btn btn-primary" class="form-control" type="submit"> <i class="fa fa-download"></i> Download Report </button>
						</form>
					</div>
					<br><br><br><hr><br><br>
					@else 
					<div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 70vw; margin: auto;">
						<div class="panel-header"><p>Your current Subscription Level is: {{$sub_type}}</p></div>
						<div class="panel-body">	
							Upgrade to a Gold Subscription Level to get access to:<br><br>
							<span class="badge">Hourly Paid Payroll Report</span>  <span class="badge">Staff Attendance Report</span>
							<span class="badge">Visitor Attendnce Report</span><span class="badge">Deliveries and Collections Report</span>
							<span class="badge">Contractors Report</span><span class="badge">Combined Attendance Report</span> 
							<span class="badge">Forced Sign Out Report</span>
							@if($sub_type === 'Bronze')
							<br><br>
								Upgrade to a Silver or Gold Subscription to get access to:<br><br>
								<span class="badge">Failed to Sign Out Report</span> 
							@endif
						</div>
					</div>
					<br><hr><br><br>
					@endif
					<div class="row">
						<div class="col-sm-12 col-md-6"  style="text-align: center; margin-top: 10px;">
							<label>Generate a report detailing anyone signed in regardless of the amount of time</label><br>
							<form action="{{ route('download.in')}}" method="post">
							{{ csrf_field() }}
								<input type="hidden" name="report_type" value="SignedIn">
								<button class="btn btn-success" type="submit"> <i class="fa fa-download"></i> Currently Signed In  </button>
							</form>
						</div>						
						<div class="col-sm-12 col-md-6"  style="text-align: center; margin-top: 10px;">
							<label>Generate a report detailing Visitor Cars parked on site</label><br>
							<form action="{{ route('download.vcp')}}" method="post">
							{{ csrf_field() }}
								<input type="hidden" name="report_type" value="SignedIn">
								<button class="btn btn-primary" type="submit"> <i class="fa fa-download"></i> Visitor Car Parking  </button>
							</form>
						</div>							
						@if($sub_type === 'Silver' || $sub_type === 'Gold')
						<div class="col-sm-12 col-md-6" style="text-align: center; margin-top: 10px;">
							<br>
							<label >Generate a report detailing anyone signed in for more than 15 hours</label><br>
							<form action="{{ route('download.failed')}}" method="post">
							{{ csrf_field() }}
								<input type="hidden" name="report_type" value="Failed">
								<button class="btn btn-danger" type="submit"> <i class="fa fa-download"></i> Failed to Sign Out </button>
							</form>
						</div>						
						@endif

					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
