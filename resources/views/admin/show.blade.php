@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.view') }}</h2></div>
                <div class="panel-body">
                    <br>
                    @if(count($registration) > 0)
                        <div class="row">
                            @foreach($registration as $reg)
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: rgba(0,0,0,0.1); padding-top: 12px; display: inline-block; border: solid 1px #aaa; margin-top: 3px; min-height: 250px; min-width: 300px;">
                                        <img src="http://localhost:8080/ereceptionhub/storage/app/public/mug_shots/{{ $reg->avatar }}" style="position: absolute; width: 200px; left: 10px; top: 10px; border-radius: 50%; border: solid 1px #eee;">
                                        <img style="position: absolute; width: 100px; right: 10px; top: 10px;" src="../qr-code?text={{$reg->rfid}}&size=100" alt="QR Code">

                                        @if(count($company ?? '') > 0)
                                            @foreach($company ?? '' as $comp)
                                                @if($comp->company_logo == '')
                                                    <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/default_logo.png" style="position: absolute; width: 100px; right: 10px; bottom: 10px;">
                                                @else 
                                                    <img src="http://localhost:8080/ereceptionhub/storage/app/public{{ $comp->company_logo }}" style="position: absolute; width: 100px; right: 10px; bottom: 10px;">
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: rgba(0,0,0,0.1); padding-top: 12px; display: inline-block; border: solid 1px #aaa; margin-top: 3px; min-height: 250px; min-width: 300px;">
                                        <h5><u>User Credentials</u></h5><br>
                                        <h6><span class="badge" style="background-color: #1e7553;">Name: </span> {{$reg->first_name}} {{$reg->last_name}} </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Email: </span> {{$reg->email}} </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Mobile No: </span> {{$reg->mobile_no ?? 'Not Set'}} </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Gender: </span> {{$reg->gender ?? 'Not Set'}} </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">DOB: </span> <?php if(!EMPTY($reg->dob)){ echo date('jS F, Y', strtotime($reg->dob)); }else { echo 'Not Set'; } ?> </h6>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: rgba(0,0,0,0.1); padding-top: 12px; display: inline-block; border: solid 1px #aaa; margin-top: 3px; min-height: 250px; min-width: 300px;">
                                        <h5><u>Company Credentials</u></h5><br>
                                        <h6><span class="badge" style="background-color: #1e7553;">Company: </span> 
                                            @foreach($company ?? '' as $comp)
                                            {{ $comp->company_name ?? 'Not Set'}}
                                            @endforeach
                                        </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Job Title: </span> {{$reg->job_title ?? 'Not Set'}} </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Department: </span> 
                                            @foreach($department ?? '' as $dep)
                                            {{ $dep->department_name ?? 'Not Set'}}
                                            @endforeach
                                        </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Company No: </span>
                                            @foreach($company ?? '' as $comp)
                                            {{ $comp->company_number ?? 'Not Set'}}
                                            @endforeach
                                        </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">VAT No: </span>
                                            @foreach($company ?? '' as $comp)
                                            {{ $comp->vat_number ?? 'Not Set'}}
                                            @endforeach
                                        </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">QR Code: </span>
                                            {{ $reg->rfid }}
                                        </h6> 
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: rgba(0,0,0,0.1); padding-top: 12px; display: inline-block; border: solid 1px #aaa; margin-top: 3px; min-height: 250px; min-width: 300px;">
                                        <h5><u>Status Credentials</u></h5><br>
                                        <h6><span class="badge" style="background-color: #489b85;">Current Status: </span>
                                            {{ $reg->current_status }}
                                        </h6>
                                        <h6><span class="badge" style="background-color: #489b85;">Last Time In / Out: </span> 
                                            {{ date('jS F, Y H:i:s',$reg->last_time) }}
                                        </h6> 
                                        <h6><span class="badge" style="background-color: #1e7553;">User Level: </span>
                                            <?php
                                                if($reg->user_level === 10){ echo 'Super User';}
                                                if($reg->user_level === 5){ echo 'Admin User';}
                                                if($reg->user_level === 1){ echo 'Staff User';}
                                            ?>
                                        </h6>

                                    </div>
                            @endforeach
                        </div>
                        <br><hr><br>
                        <div class="row">
                            <div class="col-12">
                                <p align="center"><a href="/ereceptionhub/public/administration" class="btn btn-primary"><i class="fa fa-arrow-left fa-lg"></i> &nbsp;Go Back </a></p>
                            </div>
                        </div>
                    @else
                        <p>No Registration Found</p>
                    @endif
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
