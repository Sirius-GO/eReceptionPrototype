@extends('layouts.hub')

<?php use App\Departments; ?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.searchdep') }}</h2></div>

                <div class="panel-body" style="margin-left: 30px;">
                    @if(count($dep) > 0)
                        @foreach($dep as $d)
                            <hr><p>Department: {{ $d->department_name }} </p><hr>
                        @endforeach
                    @endif
                    @if(count($people) > 0)
                        @foreach($people as $p)
                            <div class="col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2" style="color: #333; margin-top: 10px;">
                                <div style="width: 98%; height: 275px; background-color: rgba(255, 255, 255, 0.5); padding: 10px; border-radius: 10px;">
                                    <center>
                                        <img src="../../ereceptionhub/storage/app/public/mug_shots/{{$p->avatar}}" style="width: 90%;  max-width: 120px; margin-bottom: 5px;  border-radius: 50%;  border: solid 1px #eee;">
                                        <hr style="border-color: #333; margin: 0 0 0 0;">
                                            <span style="font-size: 10px; font-weight: 800;">{{ $p->first_name }} {{ $p->last_name }}</span>
                                        <hr style="border-color: #333; margin: 0 0 0 0;">
                                            <span style="font-size: 10px; font-weight: 800;">{{ $p->job_title }}</span> 
                                        <hr style="border-color: #333; margin: 0 0 10px 0;">
                                        <a href="signin/{{$p->id}}" class="btn btn-primary btn-sm" style="position: absolute; bottom: 5px; width: 60%; left: 50%; margin-left: -30%;"> <i class="fa fa-sign-in fa-lg"> </i> Sign In</a>
                                    </center>
                                </div>
                            </div>
                        @endforeach
                    @else 
                    <p>No Results Found - (May already be signed in)</p>
                    @endif
                </div>
                <center>
                    <hr><br>
                    <a href="sign_in_options" class="btn btn-primary btn-lg"> <i class="fa fa-arrow-left"> </i> Go Back </a>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection