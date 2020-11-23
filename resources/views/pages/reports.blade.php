@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.reports') }}</h2></div>

                <div class="panel-body">
					<br>
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
								<option value="Visitors"> Visitor Attendnce Report </option>
								<option value="Del_Collect"> Deliveries and Collections Report </option>
								<option value="Contractors"> Contractors Report </option>
								<option value="All"> Combined Attendance Report </option>
								<option value="Forced"> Forced Sign Out Report </option>
							</select>
							<br><br> 
							<button class="btn btn-primary" class="form-control" type="submit"> <i class="fa fa-download"></i> Download Report </button>
						</form>
					</div>
					<br><br><br><hr><br><br>
					<div class="row">
						<div class="col-sm-12 col-md-6" style="text-align: center; margin-top: 10px;">
							<label >Generate a report detailing anyone signed in for more than 15 hours</label><br>
							<form action="{{ route('download.failed')}}" method="post">
							{{ csrf_field() }}
								<input type="hidden" name="report_type" value="Failed">
								<button class="btn btn-danger" type="submit"> <i class="fa fa-download"></i> Failed to Sign Out </button>
							</form>
						</div>
						<div class="col-sm-12 col-md-6"  style="text-align: center; margin-top: 10px;">
							<label>Generate a report detailing anyone signed in regardless of the amount of time</label><br>
							<form action="{{ route('download.in')}}" method="post">
							{{ csrf_field() }}
								<input type="hidden" name="report_type" value="SignedIn">
								<button class="btn btn-success" type="submit"> <i class="fa fa-download"></i> Currently Signed In  </button>
							</form>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
