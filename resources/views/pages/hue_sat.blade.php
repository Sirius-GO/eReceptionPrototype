@extends('layouts.app2')

@section('content')
@include('inc.status_check')
    <div class="container">
        <div class="slidecontainer" style="width: 50vw; margin: auto; background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px;">
            <form action="{{ route('environment.colourstore') }}" method="post">
                {{ csrf_field()}}
                <p class="txt text-center">{{ __('messages.change') }}<br>{{ __('messages.colours') }}</p>
                @if(count($layout) > 0)
                    @foreach($layout as $l)
                    <span><b>Current Settings:</b> &nbsp;&nbsp;&nbsp; Hue: {{ $l->hue }} &nbsp;&nbsp;&nbsp; Sat: {{ $l->sat }}</span>
                    <b style="margin-left: 200px;">Preview: </b>
                    <span style="display: inline-block">
                        <img src="https://ereceptionhub.co.uk/storage/images/staff.png" style="margin-top: 10px; height: 60px; -webkit-filter: hue-rotate(<?php echo $l->hue."deg"; ?>) saturate(<?php echo $l->sat; ?>);">
                    </span>
                    @endforeach
                    @endif
                        <br>
                        <label>{{ __('messages.hue') }}</label><input type="range" min="0" max="330" step="1" value="1" class="slider" name="myRange" id="myRange"><br>
                        <br><br>
                        <label>{{ __('messages.saturation') }}</label><input type="range" min="0" max="8" step="0.01" value="1" class="slider" name="myRangeB" id="myRangeB">
                        <br><br>
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
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <img src="https://ereceptionhub.co.uk/storage/images/staff.png" style="max-height: 14vh; max-width: 35vw;">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <img src="https://ereceptionhub.co.uk/storage/images/visitor.png" style="max-height: 14vh; max-width: 35vw;">
                            </div>
                        </div> 
                    @else
                        <div style="position: relative; top: 5vh;">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <img src="https://ereceptionhub.co.uk/storage/images/staff.png" style="max-height: 14vh; max-width: 35vw;">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <img src="https://ereceptionhub.co.uk/storage/images/visitor_w.png" style="max-height: 14vh; max-width: 35vw;">
                            </div>
                        </div> 
                    @endif
                </div>
            </center>
        </div>
    </div>


@endsection
