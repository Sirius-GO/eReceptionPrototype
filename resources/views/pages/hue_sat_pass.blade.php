@extends('layouts.app2')

@section('content')
@include('inc.status_check')
    <div class="container">
        <div class="slidecontainer" style="width: 50vw; margin: auto; background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px;">
            <form action="{{ route('environment.colourstorepass') }}" method="post">
                {{ csrf_field()}}
                <p class="txt text-center">{{ __('messages.pass_col') }}</p>
                @if(count($layout) > 0)
                    @foreach($layout as $l)
                    <span><b>Current Settings:</b> &nbsp;&nbsp;&nbsp; Hue: {{ $l->hue_pass }} &nbsp;&nbsp;&nbsp; Sat: {{ $l->sat_pass }}</span>
                    <b style="margin-left: 200px;">Preview: </b>
                    <span style="display: inline-block">
                        <img src="https://ereceptionhub.co.uk/storage/images/Access_Pass_v2.png" style="margin-top: 10px; height: 60px; -webkit-filter: hue-rotate(<?php echo $l->hue_pass."deg"; ?>) saturate(<?php echo $l->sat_pass; ?>);">
                    </span>
                    @endforeach
                    @endif
                        <label>{{ __('messages.hue') }}</label><input type="range" min="0" max="330" step="1" value="1" class="slider" name="myRange" id="myRange"><br>
                        <br>
                        <label>{{ __('messages.saturation') }}</label><input type="range" min="0" max="8" step="0.01" value="1" class="slider" name="myRangeB" id="myRangeB">
                        <br>
                <center>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Save Colours
                    </button>
                </center>
            </form>
        </div>
        <div class="row">
            <center>
                <div id="main">
                    @if(app()->isLocale('en'))
                        <div style="position: relative; top: 5vh;">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <img src="https://ereceptionhub.co.uk/storage/images/Access_Pass_v2.png" style="max-width: 20vw;">
                            </div>
                        </div> 
                    @else
                        <div style="position: relative; top: 5vh;">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <img src="https://ereceptionhub.co.uk/storage/images/Access_Pass_v2.png" style="max-width: 20vw;">
                            </div>
                        </div> 
                    @endif
                </div>
            </center>
        </div>
    </div>


@endsection
