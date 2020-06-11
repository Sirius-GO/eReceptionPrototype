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

<br>
<div style="color: #000; width: 90%; margin-left: 5%; padding: 40px; border-radius: 20px; background-color: rgba(255,255,255, 0.4);">
    <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(255, 0, 0, 0.4);">
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="margin-top: 25px; font-size: 16px !important;"><i class="fa fa-fire-extinguisher fa-lg"> </i> Fire Drill</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Fire Drill: </span><br>{{$drill}}</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <?php if($today < strtotime($due)) { ?>
                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Fire Drill Due: </span><br>{{$due}} </p>
            <?php } else { ?>
                <p style="font-size: 16px; font-weight: 700; margin-top: 10px; color: red;"><span class="badge"> Next Fire Drill Due: </span><br>{{$due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
            <?php } ?>
        </div>
    </div>
    <br>
    <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(255, 127, 0, 0.4);">
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="margin-top: 25px; font-size: 16px !important;"><i class="fa fa-list-ol fa-lg"> </i> Daily Checklist</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Daily Check: </span><br>{{$td}}</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <?php if($today < strtotime($td_due)) { ?>
                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Daily Check Due: </span><br>{{$td_due}} </p>
            <?php } else { ?>
                <p style="font-size: 16px; font-weight: 700; margin-top: 10px; color: red;"><span class="badge"> Next Daily Check Due: </span><br>{{$td_due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
            <?php } ?>
        </div>
    </div>
    <br>
    <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(255, 127, 0, 0.4);">
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="margin-top: 25px; font-size: 16px !important;"><i class="fa fa-list-ol fa-lg"> </i> Weekly Checklist</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Weekly Check: </span><br>{{$tw}}</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <?php if($today < strtotime($tw_due)) { ?>
                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Weekly Check Due: </span><br>{{$tw_due}} </p>
            <?php } else { ?>
                <p style="font-size: 16px; font-weight: 700; margin-top: 10px; color: red;"><span class="badge"> Next Weekly Check Due: </span><br>{{$tw_due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
            <?php } ?>
        </div>
    </div>
    <br>
    <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(255, 255, 0, 0.4);">
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="margin-top: 25px; font-size: 16px !important;"><i class="fa fa-list-ol fa-lg"> </i> Monthly Checklist</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Monthly Check: </span><br>{{$tm}}</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <?php if($today < strtotime($tm_due)) { ?>
                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Monthly Check Due: </span><br>{{$tm_due}} </p>
            <?php } else { ?>
                <p style="font-size: 16px; font-weight: 700; margin-top: 10px; color: red;"><span class="badge"> Next Monthly Check Due: </span><br>{{$tm_due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
            <?php } ?>
        </div>
    </div>
    <br>
    <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(255, 255, 0, 0.4);">
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="margin-top: 25px; font-size: 16px !important;"><i class="fa fa-list-ol fa-lg"> </i> Yearly Checklist</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Yearly Check: </span><br>{{$ty}}</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <?php if($today < strtotime($ty_due)) { ?>
                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Yearly Check Due: </span><br>{{$ty_due}} </p>
            <?php } else { ?>
                <p style="font-size: 16px; font-weight: 700; margin-top: 10px; color: red;"><span class="badge"> Next Yearly Check Due: </span><br>{{$ty_due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
            <?php } ?>
        </div>
    </div>
    <br>
    <div class="row" style="border: 1px dashed #ddd; padding: 10px; border-radius: 10px; background-color: rgba(255, 255, 255, 0.4);">
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="margin-top: 25px; font-size: 16px !important;"><i class="fa fa-exclamation-triangle"> </i> Fire Risk Assessment</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Last Risk Assessment: </span><br>{{$tra}}</p>
        </div>
        <div class="col-12 col-md-4 col-lg-4" style="min-height: 50px; height: 80px; border: 1px dotted #eee;">
            <?php if($today < strtotime($tra_due)) { ?>
                <p style="font-size: 16px; margin-top: 10px;"><span class="badge"> Next Risk Assessment Due: </span><br>{{$tra_due}} </p>
            <?php } else { ?>
                <p style="font-size: 16px; font-weight: 700; margin-top: 10px; color: red;"><span class="badge"> Next Risk Assessment Due: </span><br>{{$tra_due}} <span style="font-size: 20px;"><i class="fa fa-exclamation-circle fa-lg" ></i></span> </p>
            <?php } ?>
        </div>
    </div>

</div>