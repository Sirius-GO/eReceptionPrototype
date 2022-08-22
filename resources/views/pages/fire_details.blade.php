@extends('layouts.fire')

<?php
if(count($staff_details) > 0){
    foreach($staff_details as $sdet){
        $staff = $sdet->reg_type;
    }
}elseif(count($staff_details) === 0 && count($details) > 0){
    foreach($details as $det){
        $staff = $det->reg_type;
    }
}

$tm = now();
$ut = time();
$tm_days = substr($tm, 8, 2);
?>


@include('inc.calc_date')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.more_details') }}</h2></div>

                <div class="panel-body">
                        @if($staff === 'Staff')

                            @foreach($staff_details as $sdet)
                                <div class="col-sm-12 col-md-12 col-lg-12" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 10px 10px 0 0;">
                                    <h1 class="text-center"><?php echo strtoupper($sdet->reg_type); ?> <a href="../fire" class="btn btn-primary btn-lg pull-right" style="margin-top: -10px; margin-right: 15px;"> <i class="fa fa-arrow-left"> </i> Go Back </a></h1>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <img src="http://ereceptionhub.co.uk/storage/mug_shots/{{ $sdet->img }}" style="position: relative; height: 100px; border-radius: 50%;  border: solid 1px #eee; left: 50%; margin-left: -50px;">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Name: </span> {{$sdet->name}} <br>
                                        <span class="badge">Company: </span> {{$sdet->from_company}}
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- Department / Job Title or Visiting Who / Car Reg -->
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Department: </span> {{$sdet->department_name}}
                                        <br>
                                        <span class="badge">Job Title: </span> {{$sdet->job_title}}
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- How Long Onsite -->
                                    <p style="color: #333; text-align: center;"><span class="badge">Length of Time On-Site: </span> </p>
                                    <?php 
                                        $one = $tm;
                                        $two = $sdet->crestat;
                                        $first_date = new DateTime($one);
                                        $second_date = new DateTime($two);
                                        $difference = $first_date->diff($second_date);
                                        $time_result = format_interval($difference);
                                    ?>

                                    <p style="text-align: center; width: 90%; margin-left: 5%; background-color: rgba(0, 0, 0, 0.5); padding: 5px; font-size: 15px;">
                                        {{$time_result}}
                                    </p>
                               </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- Sign In Location and Sign In Address -->
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Sign In Location: </span> {{$sdet->location_name}}
                                        <br>
                                        <span class="badge">Sign In Address: </span> {{$sdet->location_address}}
                                    </p>    
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- Current Status and Sign In Time -->
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Current Status: </span> {{$sdet->current_status}}
                                        <br>
                                        <span class="badge">Sign In Time: </span> {{ date('d/m/Y H:i:s', strtotime($sdet->crestat)) }}
                                    </p>    
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 0 0 10px 10px;">
                                    Staff Record
                                </div>
                            @endforeach
                        @else 
                            @foreach($details as $det)
                                <div class="col-sm-12 col-md-12 col-lg-12" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 10px 10px 0 0;">
                                    <h1 class="text-center"><?php echo strtoupper($det->reg_type); ?> <a href="../fire" class="btn btn-primary btn-lg pull-right" style="margin-top: -10px; margin-right: 15px;"> <i class="fa fa-arrow-left"> </i> Go Back </a></h1>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <img src="http://ereceptionhub.co.uk/storage/mug_shots/{{ $det->img }}" style="position: relative; height: 100px; border-radius: 50%;  border: solid 1px #eee; left: 50%; margin-left: -50px;">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Name: </span> {{$det->name}} <br>
                                        <span class="badge">Company: </span> {{$det->from_company}}
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                <!-- Department / Job Title or Visiting Who / Car Reg -->
                                <p style="color: #333; font-size: 16px;">
                                    <span class="badge">Visiting Who: </span> {{$det->first_name}} {{ $det->last_name}}
                                    <br>
                                    <span class="badge">Car Reg: </span> {{$det->car_reg}}
                                </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- How Long Onsite -->
                                    <p style="color: #333; text-align: center;"><span class="badge">Length of Time On-Site: </span> </p>
                                    <?php 
                                        $one = $tm;
                                        $two = $det->crestat;
                                        $first_date = new DateTime($one);
                                        $second_date = new DateTime($two);
                                        $difference = $first_date->diff($second_date);
                                        $time_result = format_interval($difference);
                                    ?>

                                    <p style="text-align: center; width: 90%; margin-left: 5%; background-color: rgba(0, 0, 0, 0.5); padding: 5px; font-size: 15px;">
                                        {{$time_result}}
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- Sign In Location and Sign In Address -->
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Sign In Location: </span> {{$det->location_name}}
                                        <br>
                                        <span class="badge">Sign In Address: </span> {{$det->location_address}}
                                    </p>    
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 details_box">
                                    <!-- Current Status and Sign In Time -->
                                    <p style="color: #333; font-size: 16px;">
                                        <span class="badge">Current Status: </span> {{$det->current_status}}
                                        <br>
                                        <span class="badge">Sign In Time: </span> {{ date('d/m/Y H:i:s', strtotime($det->crestat)) }}
                                    </p>    
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 0 0 10px 10px;">
                                    Visitor Record
                                </div>
                            @endforeach
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
