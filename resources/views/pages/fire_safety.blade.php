@extends('layouts.fire')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.fire') }}</h2></div>
                        @if(count($fire) > 0)
                        @foreach($fire as $f)
                            <?php 
                                $drill1 = $f->created_at; 
                                $drill1 = strtotime($drill1);
                                $drill = date('jS M Y H:i', $drill1);

                                $due1 = $f->created_at;
                                $due1 = strtotime($due1);
                                $due1 = strtotime('+90 day', $due1);
                                $due = date('jS M Y H:i', $due1);
                            ?>
                        @endforeach
                        @else 
                            <?php 
                                $drill = 'None Completed'; 
                                $due = 'None Completed'; 
                            ?>
                        @endif

                        @if(count($test_daily) > 0)
                        @foreach($test_daily as $tday)
                            <?php 
                                $td1 = $tday->created_at; 
                                $td2 = strtotime($td1);
                                $td = date('jS M Y H:i', $td2);

                                $td_due1 = $tday->created_at;
                                $td_due2 = strtotime($td_due1);
                                $td_due3 = strtotime('+1 day', $td_due2);
                                $td_due = date('jS M Y H:i', $td_due3);
                            ?>
                        @endforeach
                        @else 
                            <?php 
                                $td = 'None Completed'; 
                                $td_due = 'None Completed'; 
                            ?>
                        @endif

                        @if(count($test_weekly) > 0)
                        @foreach($test_weekly as $tweek)
                            <?php 
                                $tw1 = $tweek->created_at; 
                                $tw2 = strtotime($tw1);
                                $tw = date('jS M Y H:i', $tw2);
                                
                                $tw_due1 = $tweek->created_at;
                                $tw_due2 = strtotime($tw_due1);
                                $tw_due3 = strtotime('+7 days', $tw_due2);
                                $tw_due = date('jS M Y H:i', $tw_due3);
                            ?>
                        @endforeach
                        @else 
                            <?php 
                                $tw = 'None Completed'; 
                                $tw_due = 'None Completed'; 
                            ?>
                        @endif

                        @if(count($test_monthly) > 0)
                        @foreach($test_monthly as $tmon)
                            <?php 
                                $tm1 = $tmon->created_at; 
                                $tm2 = strtotime($tm1);
                                $tm = date('jS M Y H:i', $tm2);
                                
                                $tm_due1 = $tmon->created_at;
                                $tm_due2 = strtotime($tm_due1);
                                $tm_due3 = strtotime('+30 days', $tm_due2);
                                $tm_due = date('jS M Y H:i', $tm_due3);
                            ?>
                        @endforeach
                        @else 
                            <?php 
                                $tm = 'None Completed'; 
                                $tm_due = 'None Completed'; 
                            ?>
                        @endif

                        @if(count($test_yearly) > 0)
                        @foreach($test_yearly as $tyear)
                            <?php 
                                $ty1 = $tyear->created_at; 
                                $ty2 = strtotime($ty1);
                                $ty = date('jS M Y H:i', $ty2);
                                
                                $ty_due1 = $tyear->created_at;
                                $ty_due2 = strtotime($ty_due1);
                                $ty_due3 = strtotime('+365 days', $ty_due2);
                                $ty_due = date('jS M Y H:i', $ty_due3);
                            ?>
                        @endforeach
                        @else 
                            <?php 
                                $ty = 'None Completed'; 
                                $ty_due = 'None Completed'; 
                            ?>
                        @endif

                        @if(count($test_fra) > 0)
                        @foreach($test_fra as $tfra)
                            <?php 
                                $tra1 = $tfra->created_at; 
                                $tra2 = strtotime($tra1);
                                $tra = date('jS M Y H:i', $tra2);
                                
                                $tra_due1 = $tfra->created_at;
                                $tra_due2 = strtotime($tra_due1);
                                $tra_due3 = strtotime('+187 days', $tra_due2);
                                $tra_due = date('jS M Y H:i', $tra_due3);
                            ?>
                        @endforeach
                        @else 
                            <?php 
                                $tra = 'None Completed'; 
                                $tra_due = 'None Completed'; 
                            ?>
                        @endif

                        <?php $today = time(); ?>


                <div class="panel-body">
                        <div class="row" >
                            <div class="col-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(0, 0, 0, 0.2);">
                                <a href="/firereports" style="width: 90%; margin-left: 5%;" class="btn btn-primary"> <i class="fa fa-fire-extinguisher fa-lg"> </i> View Fire Reports </a>
                            </div>
                        </div>
                        <br>
                        <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(0, 0, 0, 0.2);">
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee; ">
                                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Fire Drill: </span> {{$drill}}</p>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px;">
                                <a href="/fire" style="margin-top: 10px; width: 90%; margin-left: 5%;" class="btn btn-danger"> <i class="fa fa-fire-extinguisher fa-lg"> </i> Fire Drill </a>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <?php if($today < strtotime($due)) { ?>
                                    <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Fire Drill Due: </span> {{$due}} </p>
                                <?php } else { ?>
                                    <p style="font-size: 16px; font-weight: 500; margin-top: 10px; color: red;"><span class="badge"> Next Fire Drill Due: </span> {{$due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
                                <?php } ?>
                            </div>
                        </div>
                    <br>
                        <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(0, 0, 0, 0.2);">
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Daily Check: </span> {{$td}}</p>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px;">
                                <a href="/daily_checklist" style="margin-top: 10px; width: 90%; margin-left: 5%;" class="btn btn-warning"> <i class="fa fa-list-ol fa-lg"> </i> Daily Checklist </a>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <?php if($today < strtotime($td_due)) { ?>
                                    <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Daily Check Due: </span> {{$td_due}} </p>
                                <?php } else { ?>
                                    <p style="font-size: 16px; font-weight: 500; margin-top: 10px; color: red;"><span class="badge"> Next Daily Check Due: </span> {{$td_due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
                                <?php } ?>
                            </div>
                        </div>
                    <br>
                        <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(0, 0, 0, 0.2);">
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Weekly Check: </span> {{$tw}}</p>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px;">
                                <a href="/weekly_checklist" style="margin-top: 10px; width: 90%; margin-left: 5%;" class="btn btn-warning"> <i class="fa fa-list-ol fa-lg"> </i> Weekly Checklist </a>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <?php if($today < strtotime($tw_due)) { ?>
                                    <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Weekly Check Due: </span> {{$tw_due}} </p>
                                <?php } else { ?>
                                    <p style="font-size: 16px; font-weight: 500; margin-top: 10px; color: red;"><span class="badge"> Next Weekly Check Due: </span> {{$tw_due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
                                <?php } ?>
                            </div>
                        </div>
                    <br>
                        <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(0, 0, 0, 0.2);">
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Monthly Check: </span> {{$tm}}</p>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px;">
                                <a href="/monthly_checklist" style="margin-top: 10px; width: 90%; margin-left: 5%;" class="btn btn-info"> <i class="fa fa-list-ol"> </i> Monthly Checklist </a>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <?php if($today < strtotime($tm_due)) { ?>
                                    <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Monthly Check Due: </span> {{$tm_due}} </p>
                                <?php } else { ?>
                                    <p style="font-size: 16px; font-weight: 500; margin-top: 10px; color: red;"><span class="badge"> Next Monthly Check Due: </span> {{$tm_due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
                                <?php } ?>
                            </div>
                        </div>
                    <br>
                        <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(0, 0, 0, 0.2);">
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Yearly Check: </span> {{$ty}}</p>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px;">
                                <a href="/yearly_checklist" style="margin-top: 10px; width: 90%; margin-left: 5%;" class="btn btn-info"> <i class="fa fa-list-ol"> </i> Yearly Checklist </a>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <?php if($today < strtotime($ty_due)) { ?>
                                    <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Yearly Check Due: </span> {{$ty_due}} </p>
                                <?php } else { ?>
                                    <p style="font-size: 16px; font-weight: 500; margin-top: 10px; color: red;"><span class="badge"> Next Yearly Check Due: </span> {{$ty_due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
                                <?php } ?>
                            </div>
                        </div>
                    <br>
                        <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(0, 0, 0, 0.2);">
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Risk Assessment: </span> {{$tra}}</p>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px;">
                                <a href="/fire_risk_assessment" style="margin-top: 10px; width: 90%; margin-left: 5%;" class="btn btn-default"> <i class="fa fa-exclamation-triangle"> </i> Fire Risk Assessment </a>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; border: 1px dotted #eee;">
                                <?php if($today < strtotime($tra_due)) { ?>
                                    <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Risk Assessment Due: </span> {{$tra_due}} </p>
                                <?php } else { ?>
                                    <p style="font-size: 16px; font-weight: 500; margin-top: 10px; color: red;"><span class="badge"> Next Risk Assessment Due: </span> {{$tra_due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
                                <?php } ?>
                            </div>
                        </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
