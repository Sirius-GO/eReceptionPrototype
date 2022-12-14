@extends('layouts.hub')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.searchname') }}</h2></div>

                <div class="panel-body" style="margin-left: 30px;">
                    <hr><p>Searched Name: {{ $name }} </p><hr>
                    @if(count($people) > 0)
                        @foreach($people as $p)
                            <div class="col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2" style="color: #333; margin-top: 10px;">
                                <div style="width: 98%; height: 275px; background-color: rgba(255, 255, 255, 0.5); padding: 10px; border-radius: 10px;">
                                    <center>
                                        @if($p->img)
                                        <img src="https://ereceptionhub.co.uk/storage/mug_shots/{{$p->img}}" style="width: 90%;  max-width: 120px; border-radius: 50%;  border: solid 1px #eee; margin-bottom: 5px;">
                                        @else 
                                        <img src="https://ereceptionhub.co.uk/storage/mug_shots/avatar.png" style="width: 90%; max-width: 120px; border-radius: 50%;  border: solid 1px #eee; margin-bottom: 5px;">
                                        @endif
                                        <hr style="border-color: #333; margin: 0 0 0 0;">
                                            <span style="font-size: 10px; font-weight: 800;">{{ $p->name }}</span>
                                        <hr style="border-color: #333; margin: 0 0 0 0;">
                                        <span style="font-size: 10px; font-weight: 800;">{{ $p->reg_type }}</span> 
                                        <hr style="border-color: #333; margin: 0 0 0 0;">
                                        <span style="font-size: 10px; font-weight: 800;">{{ $p->from_company }}</span> 
                                        <hr style="border-color: #333; margin: 0 0 10px 0;">
                                    </center>
                                        <a href="signout/{{$p->id}}" class="btn btn-primary btn-sm" style="position: absolute; bottom: 5px; width: 60%; left: 50%; margin-left: -30%;"> <i class="fa fa-sign-out fa-lg"> </i> Sign Out</a>
                                </div>
                            </div>
                        @endforeach
                        @else 
                        <p>No Results Found - (May already be signed out)</p>
                        @endif
                </div>
                <center>
                    <hr><br>
                    <a href="/hub" class="btn btn-primary btn-lg"> <i class="fa fa-arrow-left"> </i> Go Back </a>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection
