<?php

use App\Register;
use App\User;

?>
@extends('layouts.fire')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <a href="/firesafety" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-arrow-left"> </i> Go Back </a>
                <div class="panel-header"><h2>{{ __('messages.Fire_Reports') }}</h2></div>

                <div class="panel-body">
                    <h3>Fire Drills</h3>
                    <div class="firedrill_window">
                    @if(count($firedrill) > 0)
                    @foreach($firedrill as $f)
                        <div class="row" id="firedrill_window_bar">
                            <!-- Fire Drills Here -->
                            <?php
                                $name = User::where('id', $f->user_id)->take(1)->get();
                            ?>
                            <div style="margin-top: 5px;">
                                <span class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <span class="badge">Completed By:</span>
                                    @foreach($name as $n)
                                        {{$n->first_name}} {{$n->last_name}} &nbsp;
                                    @endforeach
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <span class="badge">People Reported:</span>
                                    {{$f->people}} &nbsp;
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <span class="badge">Fire Drill Date:</span>
                                    <?php echo date('jS F, Y', strtotime($f->part)); ?>  &nbsp;
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                    <a href="firereportsdetails/{{$f->id}}" class="pull-right btn btn-primary btn-sm">
                                        View Report
                                    </a>
                                </span>
                            </div>
                            
                        </div>
                    @endforeach
                    @endif
                </div>
                <h3>Fire Maintenance Checks</h3>

                <div class="firedrill_window">
                    @if(count($firetest) > 0)
                    @foreach($firetest as $t)
                        <div class="row" id="firedrill_window_bar">
                            <!-- Fire Tests Here -->
                            <?php
                                $name = User::where('id', $t->user_id)->take(1)->get();
                            ?>
                            <div style="margin-top: 5px;">
                                <span class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <span class="badge">Completed By:</span>
                                    @foreach($name as $n)
                                        {{$n->first_name}} {{$n->last_name}} &nbsp;
                                    @endforeach
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <span class="badge">Report Type:</span>
                                    @if($t->report_type !== 'FRA')
                                        {{$t->report_type}} Checklist &nbsp;
                                    @else 
                                        Fire Risk Assessment &nbsp;
                                    @endif
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <span class="badge">Check Date:</span>
                                    <?php echo date('jS F, Y', strtotime($t->part)); ?>  &nbsp;
                                </span>
                                <span class="col-xs-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                    <a href="firecheckreportsdetails/{{$t->id}}" class="pull-right btn btn-primary btn-sm">
                                        View Report
                                    </a>
                                </span>
                            </div>
                            
                        </div>
                    @endforeach
                    @endif


                </div>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
