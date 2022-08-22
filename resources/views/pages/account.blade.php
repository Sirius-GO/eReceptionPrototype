@extends('layouts.app2')


<?php 
use App\Location; 
use App\Departments; 
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

<div class="container">
    <div class="row justify-content-center">
		
		
		
		
		
		
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.account') }}</h2></div>

                <div class="panel-body">


                    <div id="main">
						
						
						
                        <br>
                        <div class="row">
                            <!-- Account Credentials -->
                            <div class="row" style="background-color: rgba(255,255,255,0.5); padding: 10px;">
                                <h3>Account Credentials
                                    <a href="#" data-toggle="modal" data-target="#account_cred"><span class="btn btn-primary pull-right"><i class="fa fa-pencil fa-lg"> </i> Edit </span></a>
                                </h3>                                
                            </div>                                
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                                <p><span class="badge" style="background-color: #1e7553;">Account Status: </span><br>
                                    @if(count($account) > 0)
                                        @foreach($account as $ac)
                                            {{ $ac->status }}<br>
                                            @if($ac->status === 'Inactive')
                                                <a href="subscriptions" class="btn btn-primary"> Buy Subscription </a>
                                            @endif
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                                <p><span class="badge" style="background-color: #1e7553;">Account Type: </span><br>
                                    @if(count($account) > 0)
                                        @foreach($account as $ac)
                                            {{ $ac->type }}
                                            @if( $ac->type == '') 
                                                Not Set<br>
                                            @endif 
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                                <p><span class="badge" style="background-color: #1e7553;">Account Classification: </span><br>
                                    @if(count($account) > 0)
                                        @foreach($account as $ac)
                                            {{ $ac->classification }}<br>
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                        </div>
						
						
						
						
						
						
						
					<br>	
                     <div class="row">
                   <!-- User Credentials -->
                    <div class="row" style="background-color: rgba(255,255,255,0.5); padding: 10px;">
                        <h3>User Credentials                        
                            <a href="#" data-toggle="modal" data-target="#user_cred"><span class="btn btn-primary pull-right"><i class="fa fa-pencil fa-lg"> </i> Edit </span></a>
                        </h3>                                
                    </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Name: </span><br>
                                {{ auth()->user()->first_name }}  {{ auth()->user()->last_name }}<br> 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">User Level:</span><br>
                                @if(auth()->user()->user_level === 10) 
                                    Super User
                                @elseif(auth()->user()->user_level === 5)
                                    Administrator
                                @else
                                    Standard User
                                @endif
                            </p>
                        </div>
						@if($sub_type === 'Silver' || $sub_type === 'Gold')
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Avatar: </span><br>
                                <img src="../../storage/mug_shots/{{ auth()->user()->avatar }}" style="height: 100px; border-radius: 50%;  border: solid 1px #eee;">
                                <a href="capture_cam"><span class="btn btn-primary"><i class="fa fa-upload fa-lg"> </i> Upload </span></a>
                            </p>
                        </div>
						@else
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Avatar:</span><br>
							Upragde to a Silver or Gold account to get access.
							</p>
                        </div>						 
						@endif
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Email Address: </span><br>
                                {{ auth()->user()->email }}<br> 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Mobile No: </span><br>
                                {{ auth()->user()->mobile_no }}
                                @if( auth()->user()->mobile_no == '') 
                                Not Set<br>
                                @endif 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">QR Code ID: </span><br>
                                {{ auth()->user()->rfid }}
                                @if( auth()->user()->rfid == '') 
                                Not Set<br>
                                @endif 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Date of Birth: </span><br>
                                <?php if(!EMPTY(auth()->user()->dob)){ echo date('jS F, Y', strtotime(auth()->user()->dob)); } else { echo 'Not Set'; } ?>
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Gender: </span><br>
                                {{ auth()->user()->gender }}
                                @if( auth()->user()->gender == '') 
                                    Not Set<br>
                                @endif 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Current Register Status: </span><br>
                                {{ auth()->user()->current_status }}<br> 
                            </p>
                        </div>
						<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Hourly Rate: </span><br>
								@if( auth()->user()->hourly_rate === '0.00')
									Salaried Staff<br>
								@else 
                                	£{{ auth()->user()->hourly_rate }}<br> 
								@endif
                            </p>
                        </div>
						<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Clock Number: </span><br>
								@if(!auth()->user()->clock_no)
									Not Set<br>
								@else 
                                	{{ auth()->user()->clock_no }}<br> 
								@endif
                            </p>
                        </div>
						<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Payroll Number: </span><br>
								@if(!auth()->user()->payroll_no)
									Not Set<br>
								@else 
                                	{{ auth()->user()->payroll_no }}<br> 
								@endif
                            </p>
                            </p>
                        </div>						 
						 
						 
                        </div>

                        <br>
            @if(auth()->user()->user_level =='10')
                        <!-- Company Credentials -->
                        <div class="row">
                        <div class="row" style="background-color: rgba(255,255,255,0.5); padding: 10px;">
                            <h3>Company Credentials
                            <a href="#" data-toggle="modal" data-target="#comp_cred"><span class="btn btn-primary pull-right"><i class="fa fa-pencil fa-lg"> </i> Edit </span></a>
                            </h3> 
                        </div>                               
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Company Name: </span><br>
                                @if(auth()->user()->company_id > 0) 
                                    @if(count($company) > 0)
                                        @foreach($company as $comp)
                                            {{ $comp->company_name }}
                                        @endforeach
                                    @endif
                                @else
                                    Not Set<br>
                                @endif 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Job Title: </span><br>
                                {{ auth()->user()->job_title }}
                                @if( auth()->user()->job_title == '') 
                                Not Set<br>
                                @endif 
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Department: </span><br>
                                @if( auth()->user()->department_id === 0) 
                                    Not Set<br>
                                @else 
                                    <?php $dep_name = Departments::WHERE('id', auth()->user()->department_id)->take(1)->get(); ?>
                                @endif 
                                 @foreach($dep_name as $d)
                                    {{ $d->department_name }}
                                 @endforeach
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Head Office Address: </span><br>
                                @if(auth()->user()->company_id > 0) 
                                    @if(count($company ) > 0)
                                        @foreach($company as $comp)
                                            <span style="word-break: break-word;">{{ $comp->ho_address }}</span>
                                            @if( $comp->ho_address == '') 
                                            Not Set<br>
                                            @endif 
                                        @endforeach
                                    @endif
                                @endif
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Company Number: </span><br>
                                @if(auth()->user()->company_id > 0) 
                                    @if(count($company ?? '') > 0)
                                        @foreach($company ?? '' as $comp)
                                            {{ $comp->company_number }}
                                            @if( $comp->company_number == '') 
                                            Not Set<br>
                                            @endif                                         
                                        @endforeach
                                    @endif
                                @endif
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">VAT Number: </span><br>
                                @if(auth()->user()->company_id > 0) 
                                    @if(count($company ?? '') > 0)
                                        @foreach($company ?? '' as $comp)
                                            {{ $comp->vat_number }}
                                            @if( $comp->vat_number == '') 
                                            Not Set<br>
                                            @endif                                         
                                            @endforeach
                                    @endif
                                @endif
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                            <p><span class="badge" style="background-color: #1e7553;">Company Logo: </span><br>
                                <!-- Show Company Logo or Default Image -->
                                @if(count($company ?? '') > 0)
                                    @foreach($company ?? '' as $comp)
                                        @if($comp->company_logo == '')
                                            <img src="../../storage/images/default_logo.png" height="100px">
                                        @else 
                                            <img src="../../storage{{ $comp->company_logo }}" height="100px">
                                        @endif
                                    @endforeach
                                @endif
                                    <a href="#" data-toggle="modal" data-target="#company_logo_upload"><span class="btn btn-primary"><i class="fa fa-upload fa-lg"> </i> Upload </span></a>
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
                                    @if(count($location) > 0)
                                        @foreach($location as $loc)    
                                            {{ $loc->location_name }} Hub {{ $loc->location_code }}
                                            <br> 
                                        @endforeach
                                        <span class="btn btn-primary btn-sm"><a href="#" data-toggle="modal" data-target="#loc_edit"><i class="fa fa-pencil fa-lg"> </i> Edit </a></span>
                                        <br>
                                        <span class="btn btn-primary"><a href="#" data-toggle="modal" data-target="#loc_add"> <i class="fa fa-plus fa-lg"> </i> Add Location </span></a>&nbsp;&nbsp;&nbsp;
                                    @else
                                        None Set<br>
                                        <span class="btn btn-primary"><a href="#" data-toggle="modal" data-target="#loc_add"> <i class="fa fa-plus fa-lg"> </i> Add Location</span></a>&nbsp;&nbsp;&nbsp;
                                    @endif
                                </p>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4" style="min-height: 160px; border-bottom: dotted 1px;">
                                <p><span class="badge" style="background-color: #1e7553;">Departments: </span><br>
                                    @if(count($department) > 0)
                                        @foreach($department as $dep)
                                            {{ $dep->department_name }} 
                                            <br> 
                                        @endforeach
                                        <span class="btn btn-primary btn-sm"><a href="#" data-toggle="modal" data-target="#dep_edit"><i class="fa fa-pencil fa-lg"> </i> Edit </a></span>
                                        <br>
                                        <span class="btn btn-primary"><a href="#" data-toggle="modal" data-target="#dep_add"><i class="fa fa-plus fa-lg"> </i> Add Department </a></span>&nbsp;&nbsp;&nbsp;
                                    @else
                                        None Set<br>
                                        <span class="btn btn-primary"><a href="#" data-toggle="modal" data-target="#dep_add"><i class="fa fa-plus fa-lg"> </i> Add Department </a></span>&nbsp;&nbsp;&nbsp;
                                    @endif
                                </p>
                            </div>
                        </div>
                    

                @endif

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

            <form action="{{ route('ereception.user_cred') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                <label  style="color: #333;">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ auth()->user()->first_name }}">
                <label  style="color: #333;">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ auth()->user()->last_name }}">
                <label  style="color: #333;">Email</label>
                <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                <label  style="color: #333;">Mobile Number</label>
                <input type="text" class="form-control" name="mobile_no" value="{{ auth()->user()->mobile_no ? auth()->user()->mobile_no : '' }}">
                <label  style="color: #333;">QR Code ID</label>
                <input type="text" class="form-control" name="rfid" value="{{ auth()->user()->rfid ? auth()->user()->rfid : '' }}">
                <label  style="color: #333;">Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="{{ auth()->user()->dob ? auth()->user()->dob : '' }}">
                <label  style="color: #333;">Gender</label>
                <select name="gender" id="gender"class="form-control">
                    <option value="{{ auth()->user()->gender }}"> Current Selection - {{ auth()->user()->gender }} </option>
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

            <form action="{{ route('ereception.comp_cred') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    @if(count($company ?? '') > 0)
                        @foreach($company ?? '' as $comp)
                            <label  style="color: #333;">Company Name</label>
                            <input type="text" class="form-control" name="company_name" value="{{ $comp->company_name }}">
                            <label  style="color: #333;">Job Title</label>
                            <input type="text" class="form-control" name="job_title" value="<?php if(auth()->user()->job_title === 'Not Set'){ echo ' '; } else { ?> {{ auth()->user()->job_title }} <?php } ?>">
                            <label  style="color: #333;">Department</label>
                            @if(auth()->user()->company_id === 0)
                                <select name="department_id" id="department_id"class="form-control">
                                    <option value="0"> -- ADD DEPARTMENTS TO SELECT -- </option>
                                </select>
                            @else
                            <select name="department_id" id="department_id"class="form-control">
                                    <option value="{{ auth()->user()->department_id }} " selected> Current Department ID -{{ auth()->user()->department_id }}</option>
                                @foreach($department as $dep)
                                    <option value="{{ $dep->id }}"> {{ $dep->department_name }} </option>
                                @endforeach
                            </select>                        
                            @endif
                            <label  style="color: #333;">Head Office Address</label>
                        <input type="text" class="form-control" name="ho_address" value="{{ $comp->ho_address ? $comp->ho_address : '' }}">
                            <label  style="color: #333;">Company Number</label>
                            <input type="text" class="form-control" name="company_number" value="{{ $comp->company_number ? $comp->company_number : '' }}">
                            <label  style="color: #333;">VAT Number</label>
                            <input type="text" class="form-control" name="vat_number" value="{{ $comp->vat_number ? $comp->vat_number : '' }}">
                            <input type="hidden" name="company_id" value="{{ auth()->user()->company_id }}">                     
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">
                                <i class="fa fa-pencil fa-lg"></i> Update
                            </button>
                        @endforeach
                    @endif
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
            <form action="{{ route('ereception.account_cred') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    @foreach($account as $ac)
                        <label  style="color: #333;">Account Classification</label>
                        <select name="classification" id="classification"class="form-control">
                            <option value="{{ $ac->classification }}"> Current Selection - {{ $ac->classification }} </option>
                            <option value="Business"> Business </option>
                            <option value="Education"> Education </option>
                            <option value="Health"> Health </option>
                        </select>   
                        <input type="hidden" name="company_id" value="{{ auth()->user()->company_id }}">                     
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">
                            <i class="fa fa-pencil fa-lg"></i> Update
                        </button>
                    @endforeach
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
            <form action="{{ route('ereception.loc_add') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="company_id" value="{{ auth()->user()->company_id }}">                     
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
            @if(count($location) > 0)                  
            <form action="{{ route('ereception.loc_edit') }}" method="post">
                {{ csrf_field()}}

                <div class="form-group">
                            <label  style="color: #333;">Location Name</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <label  style="color: #333;">Hub Number</label>&nbsp;&nbsp;
                            <label  style="color: #333;">Location Address</label>
                            <br>
                            @foreach($location as $i => $loc)
                                <span style="display: inline-block; color: #000;">
                                    <input type="hidden" name="location[{{ $i }}][user_id]" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="location[{{ $i }}][location_id]" value="{{ $loc->id }}">        
                                    <input type="text" size="12" name="location[{{ $i }}][location_name]" value="{{ $loc->location_name }}">  
                                    <input type="text" size="8" name="location[{{ $i }}][location_code]" value="{{ $loc->location_code }}">  
                                    <input type="text" size="33" name="location[{{ $i }}][location_address]" value="{{ $loc->location_address }}">  
                                </span>
                            @endforeach
                </div>  
                <br><br>                          
                            <button type="submit" name="submit" class="btn btn-success">
                                <i class="fa fa-pencil fa-lg"></i> Update
                            </button>
            </form>
            <br>           
            @else 
                <br>
                <p style="color: #333;">None Set</p>
                <br>
            @endif
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
            <form action="{{ route('ereception.dep_add') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">                     
                    <input type="hidden" name="company_id" value="{{ auth()->user()->company_id }}">                     
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
            @if(count($location) > 0)                  
            <form action="{{ route('ereception.dep_edit') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                            <label  style="color: #333;">Department Name</label>
                         @foreach($department as $i => $dep)
                            <input type="hidden" name="department[{{ $i }}][user_id]" value="{{ auth()->user()->id }}">   
                            <input type="hidden" name="department[{{ $i }}][company_id]" value="{{ auth()->user()->company_id }}">   
                            <input type="hidden" class="form-control" name="department[{{ $i }}][department_id]" value="{{ $dep->id }}">  
                            <input type="text" class="form-control" name="department[{{ $i }}][department_name]" value="{{ $dep->department_name }}" required>  
                        @endforeach
                </div>                    
                            <button type="submit" name="submit" class="btn btn-success">
                                <i class="fa fa-pencil fa-lg"></i> Update
                            </button>
            </form>
            <br>           
            @else 
                <br>
                <p style="color: #333;">None Set</p>
                <br>
            @endif
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
                {{ csrf_field() }}
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
            ajax.open("POST", "{{ route('clogo.store') }}");
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

@endsection
