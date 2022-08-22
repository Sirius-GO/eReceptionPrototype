@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.create') }}</h2></div>

                <div class="panel-body">


                    <br>
<div class="row">
	<div class="col-12">
<br>
	    <button class="btn btn-primary text-white btn-sm" onclick="goBack()"> <i class="fa fa-chevron-left"> </i> Go Back</button>
	
	    <script>
	    function goBack() {
	    window.history.go(-1);
	    }
	    </script>
  	</div>
</div>
{!!Form::open(['action' => 'RegistrationsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="row">
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            {{Form::label('first_name', 'First Name')}}
            {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First Name (Max 50 Chars)', 'maxlength' => '50', 'required'])}}
        </div>
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            {{Form::label('last_name', 'Last Name')}}
            {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last Name (Max 50 Chars)', 'maxlength' => '50', 'required'])}}
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-6-sm col-md-4 col-lg-4 col-xl-4">
            {{Form::label('user_level', 'User Level')}}
            {{Form::select('user_level', array('' => ' -- Select User Level -- ', '10' => 'Super User', '5' => 'Admin User', '1' => 'Staff User'), '0', ['class' => 'form-control', 'required'])}}
        </div>
        <div class="col-12 col-6-sm col-md-4 col-lg-4 col-xl-4">
            {{Form::label('dob', 'Date of Birth')}}
            {{Form::date('dob', '', ['class' => 'form-control', 'placeholder' => 'Date of Birth', 'maxlength' => '50', 'required'])}}
        </div>
        <div class="col-12 col-6-sm col-md-4 col-lg-4 col-xl-4">
            {{Form::label('gender', 'Gender')}}
            {{Form::select('gender', array('' => ' -- Select Gender -- ', 'Male' => 'Male', 'Female' => 'Female', 'Gender Diverse' => 'Gender Diverse', 'Non Binary' => 'Non Binary'), '0', ['class' => 'form-control', 'required'])}}
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            {{Form::label('email', 'Email Address')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address (Max 50 Chars)', 'maxlength' => '50', 'required'])}}
        </div>
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            {{Form::label('mobile_no', 'Modile Number')}}
            {{Form::text('mobile_no', '', ['class' => 'form-control', 'placeholder' => 'Modile Number (Max 15 Chars)', 'maxlength' => '15', 'required'])}}
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            {{Form::label('job_title', 'Job Title')}}
            {{Form::text('job_title', '', ['class' => 'form-control', 'placeholder' => 'Job Title (Max 50 Chars)', 'maxlength' => '50', 'required'])}}
        </div>
        <div class="col-12 col-12-sm col-md-6 col-lg-6 col-xl-6">
            {{Form::label('department_id', 'Department')}}
            <select id='department_id' name='department_id' class="form-control" required>
                    <option value='' disabled selected> -- Select Department -- </option>
                    @foreach($department as $data)
                    <option value="{{$data->id}}">{{$data->department_name}}</option>
                    @endforeach  
            </select>
        </div>        
    </div> 
    <div class="row">
        <div class="col-12 col-12-sm col-md-4 col-lg-4 col-xl-4">
            {{Form::label('hourly_rate', 'Hourly Rate')}}
            {{Form::text('hourly_rate', '', ['class' => 'form-control', 'placeholder' => 'Hourly Rate', 'maxlength' => '7'])}}
        </div>
        <div class="col-12 col-12-sm col-md-4 col-lg-4 col-xl-4">
            {{Form::label('clock_no', 'Clock Number')}}
            {{Form::text('clock_no', '', ['class' => 'form-control', 'placeholder' => 'Clock Number (Max 50 Chars)', 'maxlength' => '50'])}}
        </div>
		<div class="col-12 col-12-sm col-md-4 col-lg-4 col-xl-4">
            {{Form::label('payroll_no', 'Payroll Number')}}
            {{Form::text('payroll_no', '', ['class' => 'form-control', 'placeholder' => 'Payroll Number (Max 50 Chars)', 'maxlength' => '50'])}}
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <br>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
    </div>
{!!Form::close()!!}
<br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection