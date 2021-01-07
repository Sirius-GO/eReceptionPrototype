@extends('layouts.app2')

<?php 

use App\Company;
use App\Account;
use App\User;
$accounts_check = Account::where('company_id', auth()->user()->company_id)->get();

if(count($accounts_check) > 0){
	foreach($accounts_check as $a){
		//Get Vars
		$active = $a->status;
		$sub_type = $a->type;
	}
}
?>

@section('content')
@include('inc.status_check')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.visitor') }}</h2></div>
          
                <div class="panel-body">
				@if($sub_type === 'Silver' || $sub_type === 'Gold')
                    @if(count($registrations) > 0)
                        <div class="row">
                            @foreach($registrations as $reg)

                            <!-- ================  Access Pass Layout FULL WIDTH =====================  -->
                            <div id="id_card1_{{$reg->id}}" style="display: none;">
                                <span>
                                    <img src="https://ereceptionhub.co.uk/storage/images/Access_Pass_Visitor_v2.png" style="position: relative; width: 1000px;">
                                    <img src="https://ereceptionhub.co.uk/storage/images/mug_shots/avatar.png" style="position: absolute; width: 347px; left: 187px; top: 41px; border-radius: 50%;  border: solid 1px #eee;">
                                    <span style="position: absolute; color: #000; font-weight: 700; left: 590px; top: 87px; font-family: tahoma; font-size: 40px;"><p>{{$reg->name}}</p></span>
									<?php 
                                        $who = User::where('id', $reg->who)->take(1)->get(); 
                                        foreach($who as $w){
                                            $wname = $w->first_name . ' ' . $w->last_name;
                                        }
                                    ?>
                                    <span style="position: absolute; color: #000; font-weight: 700; left: 590px; top: 180px; max-width: 333px; font-family: tahoma; font-size: 40px;"><p>{{$wname}}</p></span>
                                    <span style="position: absolute; color: #808080; font-weight: 700; left: 190px; top: 430px; max-width: 470px; font-family: tahoma; font-size: 40px;"><p>{{$reg->from_company}}</p></span>
                                </span>
                            </div>

                            <!-- ================  Access Pass Layout 380px WIDTH =====================  -->
                            <div id="id_card_{{$reg->id}}" style="display: none;">
                                <span>
                                    @if(count($layout ?? '') > 0)
                                        @foreach($layout ?? '' as $l)
                                        <?php 
                                            $h = $l->hue_vis; 
                                            $s = $l->sat_vis;                                 
                                        ?>

                                            <img src="https://ereceptionhub.co.uk/storage/images/Access_Pass_Visitor_v2.png" 
                                            style="position: relative; width: 380px; margin: 30px; border: solid 1px #000; -webkit-filter: hue-rotate(<?php echo $h."deg"; ?>) saturate(<?php echo $s; ?>); ">
                                        @endforeach
                                    @endif
                                    <img src="https://ereceptionhub.co.uk/storage/mug_shots/avatar.png"
                                    style="position: absolute; width: 138px; left: 71px; top: 16px; border-radius: 50%;  border: solid 1px #eee; margin: 30px;">
                                    <span style="margin: 30px; position: absolute; color: #000; font-weight: 700; left: 224px; top: 38px; font-family: tahoma; font-size: 15px;">
                                        <p>{{$reg->name}}</p>
                                    </span>
                                    <img src="https://ereceptionhub.co.uk/storage/images/erec.png" alt="QR Code"
                                    style="margin: 30px; position: absolute; left: 257px; top: 131px; width: 115px;">
                                    <span style="margin: 30px; position: absolute; color: #000; font-weight: 700; left: 224px; top: 74px; max-width: 127px; font-family: tahoma; font-size: 15px;">
                                        <p>{{$wname}}</p>
                                    </span>
                                    <span style="margin: 30px; position: absolute; color: #ddd; font-weight: 700; left: 77px; top: 167px; max-width: 179px; font-family: tahoma; font-size: 15px;">
                                        <p>{{$reg->from_company}}</p>
                                    </span>
                                </span>
                            </div>

                                    <div class="col-6 col-sm-6 col-md-3 col-lg-3" style="background-color: rgba(0,0,0,0.1); padding: 10px; display: inline-block; border: solid 1px #aaa; margin-top: 3px;">
                                       @if($sub_type === 'Silver' || $sub_type === 'Gold')
											<a href="#" onclick="printID({{$reg->id}})" class="btn btn-default btn-sm" style="position: absolute; top: 3px; right: 3px;">
												<i class="fa fa-print"></i> Print ID 
											</a>
											<br>
										@else
											<span class="badge" style="width: 100%">
												Print ID not Available<br>Uprage to a Silver Account for access
											</span>
											<br><br>
										@endif
                                        <script>
                                            function printID(id){
                                                var printContents = document.getElementById('id_card_' + id).innerHTML;
                                                w = window.open();
                                                w.document.write(printContents);
                                                w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); setTimeout(function () { window.close(); }, 3000);  };' + '</sc' + 'ript>');
                                                w.document.close(); // necessary for IE >= 10
                                                w.focus(); // necessary for IE >= 10
                                                return true;
                                            }                                      
                                        </script>
                                        <img src="https://ereceptionhub.co.uk/storage/mug_shots/avatar.png" style="width: 60%; margin-left: 20%; border-radius: 50%;  border: solid 1px #eee;">
                                        <h6><span class="badge" style="background-color: #1e7553;">Name: </span> {{$reg->name}}</h6>
										<h6><span class="badge" style="background-color: #1e7553;">Visitng Who: </span> {{$wname}}</h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Current Status: </span> {{$reg->current_status}} </h6>
                    

                                        </span>
                                    </div>
                            @endforeach
                        </div>
                    @else
                        <p>No Visitors Found</p>
                    @endif
                @else 
				<p>Please upgrade your Subscription to Silver or Gold to gain access to this feature.</p>
				@endif
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
