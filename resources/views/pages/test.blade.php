@extends('layouts.halloween')

@section('content')
<div id="my_page">

        <div class="bats">
            <img src="http://oursmile.uk/storage/background_images/bat.gif" height="150px">
        </div>


        <div id="window12" style="max-height:90%;">
                <div class="container">
                  <div class="wrapper">
                          <ul id="sb-slider" class="sb-slider">
                           @if(count($images) > 0)
                           @foreach($images AS $image)
                            <div class="GOLD-content GOLD-section" style="min-width: 800;">
                                    <div class="mySlides GOLD-animate-left">
                                           <img src="../../storage{{$image->img_location}}" style="height: 79vh; border: solid 3px; box-shadow: 5px 7px 1px 1px rgba(0,0,0,0.4);">
                                           @if($image->type == 'user_image')
                                          <h2 style="text-align: center; border: solid 2px #ddd; padding: 3px; background-color: rgba(255,255,255,0.7); width: 850px; box-shadow: 5px 7px 1px 1px rgba(0,0,0,0.4); font-weight:900;">Event Code: &nbsp;&nbsp; {{$image->venue_code}} &nbsp;&nbsp;&nbsp; Image Number: &nbsp;&nbsp;&nbsp; {{$image->id}}</h2>
                                           @elseif($image->type == 'title')
                                            <h2 style="text-align: center; border: solid 2px #ddd; padding: 3px; background-color: rgba(255,255,255,0.7); width: 500px; box-shadow: 5px 7px 1px 1px x 1px rgba(0,0,0,0.4); font-weight:900;">Event Code: &nbsp;&nbsp; {{$image->venue_code}}</h2>
                                              @else
                                          @endif
                                    </div>
                            </div>
                            @endforeach
                            @else
                         <br><br><br><br><br>
                         <h3 style="position: relative; text-align: center; padding: 20px; border: solid 1px #333; width: 350px; left: 50%; margin-left: -175px; background-color: #eee; font-weight 450px;">
                          No Images Upload Yet!!
                         </h3>
                         @endif
                         </ul>
                   </div>
                </div>
        </div>
</div>
        <div id="tree">
            <img border="0" src="../../storage/background_images/witch.gif" style="height: 60vh;">
        </div>
        <div id="xmas">
          <img border="0" src="../../storage/images/visit.png" style="width: 1000px;">
        </div>
        <div id="snow">
            <img border="0" src="../../storage/background_images/pumpkin.png" style="width: 10vw;">
        </div>
@endsection