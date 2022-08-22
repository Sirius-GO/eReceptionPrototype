@extends('layouts.app2')


<?php
use App\User;

$my_url = htmlspecialchars($_SERVER['HTTP_REFERER']);

if(strpos($my_url, 'reg') == false){
    session()->put('page', NULL);
    $t = now();
    $tn = substr($t, 0, 10);
    session()->put('dt', $tn);
    session()->put('io', 'In');
    echo '<script>location.reload();</script>';
}

?>


@include('inc.calc_date')


@section('content')
@include('inc.status_check')
<div class="container">
    <div class="row">
        <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; width: 100%; max-width: 90vw; margin: auto;">
            <div class="panel-header"><h2>{{ __('messages.register') }}</h2></div>
            <div class="panel-body" style="margin-left: -20px;">


            <!-- FORM TO VIEW ALTERNATIVE DATES -->
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <form action="{{ route('master.register') }}" method="post">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <label  style="color: #333;">Register Date</label>
                            <input type="date" class="form-control" name="dt" required>
                            <label  style="color: #333;">Status</label>
                            <select class="form-control" name="io" required>
                                <option value="" disabled selected> -- Select An Option -- </option>
                                <option value="In"> Signed In </option>
                                <option value="Out"> Signed Out </option>
                                <option value="Both"> Signed In or Out </option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">
                            <i class="fa fa-calendar fa-lg"></i> Update
                        </button>
                    </form>
                </div>
            </div>
            <br>

            <p>
                <?php 
                    $t = now();

                    if(session('page', 'hold')){
                        if(!isset($_POST['io']) && session('io') !=''){ $_POST['io'] = session('io'); $stat = session('io'); } 
                        if(!isset($_POST['dt']) && session('dt') !=''){ $_POST['dt'] = session('dt'); } 
                    } elseif(session('page', '')) {
                        $_POST['io'] = 'In'; $stat = 'In';
                        $_POST['dt'] = $tn = substr($t, 0, 10);
                    }

                    if(isset($_POST['submit'])){
                        if(isset($_POST['io']) && $_POST['io'] === 'Both'){ $stat = 'In or Out'; } else { $stat = $_POST['io']; }
                    } elseif(!isset($_POST['dt']) && session('dt') !='' && session('page', 'hold')){
                        $tn = session('dt');
                    } else {
                        $tn = substr($t, 0, 10); 
                    }
                    if(isset($_POST['dt'])){ 
                        $tn = $_POST['dt']; 
                        echo 'Current Search - Signed ' . $stat . ' on ' . date('jS F, Y', strtotime($tn)); 
                    } else {
                        $tn = substr($t, 0, 10); 
                        echo 'Current Search - Signed In on ' . date('jS F, Y', strtotime($tn));
                    }
                ?>
            </p>       

            <div style="padding: 10px; border: dashed 1px #eee; border-radius: 20px; background-color: rgba(255, 255, 255, 0.3);">
                <div class="badge">KEY: </div> &nbsp;&nbsp;
                <i class="fa fa-qrcode"></i> : Scan Sign Out &nbsp;&nbsp; 
                <i class="fa fa-user"></i> : Manual Sign Out &nbsp;&nbsp;
                <i class="fa fa-exclamation-triangle"></i> : Forced Sign Out &nbsp;&nbsp;
                <i class="fa fa-fire-extinguisher"></i> : Fire Drill Sign Out
            </div>

            <!-- Flip Card if(Staff) -->

            @if(count($entries) > 0)

                <div class="row">
                    @foreach($entries as $rec)
                    @if($rec->reg_type === 'Staff')

                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="scene" style="max-width: 310px; margin: auto; margin-top: 20px;">
                                <div class="MyCard_{{$rec->rid}}">

                                    <div class="front">
                                        <div class="card">

                                            <div class="card-header" style="height: 40px; background-color: rgba(0,0,255,0.4); color: #333;">
                                                    <span class="mb"><b style="position: absolute; top: 14px;"> <i class="fa fa-id-card"></i> {{ $rec->reg_type }}
                                                        @if($rec->curstat === 'Out' && $rec->sign_out_type === 'SCAN')
                                                            <span>
                                                                <?php 

                                                                    $one = $rec->upstat;
                                                                    $two = $rec->crestat;
                                                                    $first_date = new DateTime($one);
                                                                    $second_date = new DateTime($two);
                                                                    $difference = $first_date->diff($second_date);
                                                                    $time_result = format_interval_shorthand($difference);

                                                                    //echo '(On Site: ' . date('H:i:s', strtotime($rec->upstat) - strtotime($rec->crestat)) .')';
                                                                    echo '(On Site:' . $time_result . ')<i class="fa fa-qrcode fa-lg"></i>';
                                                                ?>
                                                            </span>
                                                            @elseif($rec->curstat === 'Out' && $rec->sign_out_type === 'MANUAL')
                                                            <span>
                                                                <?php 
                                                                    $one = $rec->upstat;
                                                                    $two = $rec->crestat;
                                                                    $first_date = new DateTime($one);
                                                                    $second_date = new DateTime($two);
                                                                    $difference = $first_date->diff($second_date);
                                                                    $time_result = format_interval_shorthand($difference);                                                                
                                                                    echo '(On Site:' . $time_result . ')<i class="fa fa-user fa-lg"></i>';
                                                                ?>
                                                            </span> 
                                                            @elseif($rec->curstat === 'Out' && $rec->sign_out_type === 'FORCED')
                                                            <span>
                                                                <?php 
                                                                    $one = $rec->upstat;
                                                                    $two = $rec->crestat;
                                                                    $first_date = new DateTime($one);
                                                                    $second_date = new DateTime($two);
                                                                    $difference = $first_date->diff($second_date);
                                                                    $time_result = format_interval_shorthand($difference);                                                                
                                                                    echo '(On Site:' . $time_result . ')<i class="fa fa-exclamation-triangle fa-lg"></i>';
                                                                ?>
                                                            </span> 
                                                            @elseif($rec->curstat === 'Out' && $rec->sign_out_type === 'FIRE DRILL')
                                                            <span>
                                                                <?php 
                                                                    $one = $rec->upstat;
                                                                    $two = $rec->crestat;
                                                                    $first_date = new DateTime($one);
                                                                    $second_date = new DateTime($two);
                                                                    $difference = $first_date->diff($second_date);
                                                                    $time_result = format_interval_shorthand($difference);                                                                
                                                                    echo '(On Site:' . $time_result . ')<i class="fa fa-fire-extinguisher fa-lg"></i>';
                                                                ?>
                                                            </span> 
                                                        
                                                        @endif
                                                        </b>
                                                    </span>
                                                    <span style="position: absolute; top: 5px; right: 5px;">
                                                        <a href="#/" onclick="flip({{$rec->rid}})" class="btn btn-info btn-sm"> <i class="fa fa-undo"> </i> </a>
                                                    </span>
                                            </div>
                                            <div class="card-body mb" style="height: 110px;">
                                                    <br>
                                                    <h5><span class="badge">Name: </span> <?php echo substr($rec->name, 0, 25); ?></h5>
                                                    <h5><span class="badge">Department:  </span>
                                                        {{ $rec->department_name }}
                                                    </h5>
                                                    <h5><span class="badge">Job Title:  </span> 
                                                            <?php echo substr($rec->job_title, 0, 27); ?>
                                                    </h5>
                                            </div>

                                            @if($rec->curstat === 'In')
                                                <div class="card-footer" style="height: 50px; width:100%; background-color: rgba(0,255,0,0.3);">
                                            @else 
                                                <div class="card-footer" style="height: 50px; width:100%; background-color: rgba(255,0,0,0.3);">
                                            @endif
                                                <!-- Footer -->
                                                <div style="position: relative; top: 5px;">
                                                    <span style="margin-left: 10px;">
                                                        <span class="badge">Signed In: </span><span> {{ date('d/m/Y H:i:s', strtotime($rec->crestat)) }}</span>
                                                    </span>
                                                    <br>
                                                    <span style="margin-left: 10px;">
                                                        <span class="badge">Signed Out: </span>
                                                        @if($rec->curstat === 'Out')
                                                            <span> {{ date('d/m/Y H:i:s', strtotime($rec->upstat)) }}</span>
                                                        @else 
                                                            Currently Signed In
                                                        @endif
                                                    </span>
                                                </div>
                                                </div>

                                        </div>
                                    </div>
                
                                    <div class="back">
                                        <div class="card">

                                            <div class="card-header" style="height: 40px; background-color: rgba(0,0,255,0.4); color: #eee;">
                                                <span class="mb"><b style="position: absolute; top: 14px;"> <i class="fa fa-id-card"></i> {{ $rec->reg_type }}</b></span>
                                                <span style="position: absolute; top: 5px; right: 5px;">
                                                <a href="#/" id="Close" onclick="flip({{$rec->rid}})" class="btn btn-info btn-sm"> <i class="fa fa-times"> </i> </a>
                                                </span>
                                            </div>
                                            <div class="card-body mb" style="height: 130px;">
                                                <br>
                                                <h5><span class="badge">Name: </span> <?php echo substr($rec->name, 0, 25); ?></h5>
                                                <h5><span class="badge">Sign-In Location: </span> 
                                                    <?php
                                                        echo substr($rec->location_name, 0, 15) . ' Hub ' . $rec->location_code;
                                                    ?>
                                                </h5>
                                                @if($rec->curstat === 'In')
                                                    <h5>
                                                        <!--<a href="force_signout/{{$rec->rid}}" class="btn btn-danger btn-xs" style="position: absolute; bottom: 36px; width: 120px; left: 50%; margin-left: -60px;"> <i class="fa fa-sign-out fa-lg"> </i> Force Sign Out</a>-->
                                                        <a href="#"  data-toggle="modal" data-target="#force_sign_out" onclick="getMyId({{ $rec->rid }})" class="btn btn-danger btn-xs forced" style="position: absolute; bottom: 36px; width: 120px; left: 50%; margin-left: -60px;"> <i class="fa fa-sign-out fa-lg"> </i> Force Sign Out</a>

                                                    </h5>
                                                @else 
                                                <span class="badge">Sign Out Type: </span> {{ $rec->sign_out_type }}
                                                @endif
                                            </div>
                                            <div class="card-footer" style="height: 30px; width: 100%;  background-color: rgba(0,0,0,0.3);">
                                                <!-- Footer -->
                                                <div style="position: relative; top: 5px;">
                                                    <a href="administration/{{$rec->uuu}}"><center><span class="bnt btn-info btn-sm"> <i class="fa fa-search"></i> View Profile </span></center></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @else <!-- for all other reg types -->
                        <!-- Flip Card if(Visitor) -->
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="scene" style="max-width: 310px; margin: auto; margin-top: 20px;">
                                <div class="MyCard_{{$rec->rid}}">
                                    
                                    <div class="front">
                                        <div class="card">
                                            <div class="card-header" style="height: 40px; background-color: rgba(255,125,0,0.5); color: #333;">
                                                    <span class="mb"><b style="position: absolute; top: 14px;"> <i class="fa fa-user-circle"></i> {{ $rec->reg_type }}
                                                        @if($rec->curstat === 'Out' && $rec->sign_out_type === 'SCAN')
                                                            <span>
                                                                <?php 

                                                                    $one = $rec->upstat;
                                                                    $two = $rec->crestat;
                                                                    $first_date = new DateTime($one);
                                                                    $second_date = new DateTime($two);
                                                                    $difference = $first_date->diff($second_date);
                                                                    $time_result = format_interval_shorthand($difference);

                                                                    //echo '(On Site: ' . date('H:i:s', strtotime($rec->upstat) - strtotime($rec->crestat)) .')';
                                                                    echo '(On Site:' . $time_result . ')<i class="fa fa-qrcode fa-lg"></i>';
                                                                ?>
                                                            </span>
                                                            @elseif($rec->curstat === 'Out' && $rec->sign_out_type === 'MANUAL')
                                                            <span>
                                                                <?php 
                                                                    $one = $rec->upstat;
                                                                    $two = $rec->crestat;
                                                                    $first_date = new DateTime($one);
                                                                    $second_date = new DateTime($two);
                                                                    $difference = $first_date->diff($second_date);
                                                                    $time_result = format_interval_shorthand($difference);                                                                
                                                                    echo '(On Site:' . $time_result . ')<i class="fa fa-user fa-lg"></i>';
                                                                ?>
                                                            </span> 
                                                            @elseif($rec->curstat === 'Out' && $rec->sign_out_type === 'FORCED')
                                                            <span>
                                                                <?php 
                                                                    $one = $rec->upstat;
                                                                    $two = $rec->crestat;
                                                                    $first_date = new DateTime($one);
                                                                    $second_date = new DateTime($two);
                                                                    $difference = $first_date->diff($second_date);
                                                                    $time_result = format_interval_shorthand($difference);                                                                
                                                                    echo '(On Site:' . $time_result . ')<i class="fa fa-exclamation-triangle fa-lg"></i>';
                                                                ?>
                                                            </span> 
                                                            @elseif($rec->curstat === 'Out' && $rec->sign_out_type === 'FIRE DRILL')
                                                            <span>
                                                                <?php 
                                                                    $one = $rec->upstat;
                                                                    $two = $rec->crestat;
                                                                    $first_date = new DateTime($one);
                                                                    $second_date = new DateTime($two);
                                                                    $difference = $first_date->diff($second_date);
                                                                    $time_result = format_interval_shorthand($difference);                                                                
                                                                    echo '(On Site:' . $time_result . ')<i class="fa fa-fire-extinguisher fa-lg"></i>';
                                                                ?>
                                                            </span> 
                                                        
                                                        @endif
                                                    </b>
                                                </span>
                                                <span style="position: absolute; top: 5px; right: 5px;">
                                                    <a href="#/" onclick="flip({{$rec->rid}})" class="btn btn-info btn-sm"> <i class="fa fa-undo"> </i> </a>
                                                </span>
                                            </div>
                                            <div class="card-body mb" style="height: 110px;">
                                                    <br>
                                                    <h5><span class="badge">Name: </span> <?php echo substr($rec->name, 0, 25); ?></h5>
                                                    <h5><span class="badge">Sign-In Location: </span> 
                                                        <?php
                                                            echo substr($rec->location_name, 0, 15) . ' Hub ' . $rec->location_code;
                                                        ?>
                                                    </h5>
                                                    <h5><span class="badge">Visitng Who:  </span> 
                                                        <?php
                                                            $visit = User::WHERE('id', $rec->who)->get();
                                                            foreach($visit as $vis){
                                                                echo substr($vis->first_name . ' ' . $vis->last_name, 0, 22);
                                                            }
                                                        ?>
                                                    </h5>
                                            </div>
                                            @if($rec->curstat === 'In')
                                                <div class="card-footer" style="height: 50px; width:100%; background-color: rgba(0,255,0,0.3);">
                                            @else 
                                                <div class="card-footer" style="height: 50px; width:100%; background-color: rgba(255,0,0,0.3);">
                                            @endif
                                                <!-- Footer -->
                                                <div style="position: relative; top: 5px;">
                                                    <span style="margin-left: 10px;">
                                                        <span class="badge">Signed In: </span><span> {{ date('d/m/Y H:i:s', strtotime($rec->crestat)) }}</span>
                                                    </span>
                                                    <br>
                                                    <span style="margin-left: 10px;">
                                                        <span class="badge">Signed Out: </span>
                                                        @if($rec->curstat === 'Out')
                                                            <span> {{ date('d/m/Y H:i:s', strtotime($rec->upstat)) }}</span>
                                                        @else 
                                                            Currently Signed In
                                                        @endif
                                                    </span>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                
                                    <div class="back">
                                        <div class="card">
                                                <div class="card-header" style="height: 40px; background-color: rgba(255,125,0,0.5); color: #333;">
                                                        <span class="mb"><b style="position: absolute; top: 14px;"> <i class="fa fa-user-circle"></i> {{ $rec->reg_type }}</b></span>
                                                        <span style="position: absolute; top: 5px; right: 5px;">
                                                        <a href="#/" id="Close" onclick="flip({{$rec->rid}})" class="btn btn-info btn-sm"> <i class="fa fa-times"> </i> </a>
                                                </span>
                                            </div>
                                            <div class="card-body mb" style="height: 130px;">
                                                <br>
                                                <h5><span class="badge">Name: </span> <?php echo substr($rec->name, 0, 25); ?></h5>
                                                <h5><span class="badge">Company:  </span> <?php echo substr($rec->from_company, 0, 28); ?></h5>
                                                    <h5><span class="badge">Car Registration:  </span> <?php echo substr($rec->car_reg, 0, 10); ?></h5>
                                                    @if($rec->curstat === 'In')
                                                        <h5>
                                                            <a href="#" data-toggle="modal" data-target="#force_sign_out" onclick="getMyId({{ $rec->rid }})" class="btn btn-danger btn-xs forced" style="position: absolute; bottom: 36px; width: 120px; left: 50%; margin-left: -60px;"> <i class="fa fa-sign-out fa-lg"> </i> Force Sign Out</a>
                                                        </h5>
                                                    @else 
                                                        <span class="badge">Sign Out Type: </span> {{ $rec->sign_out_type }}
                                                    @endif
                                            </div>
                                            <div class="card-footer" style="height: 30px; width: 100%;  background-color: rgba(0,0,0,0.3);">
                                                <!-- Footer Controls -->
												<!-- Set Vars for Docs -->
												<?php
													if($rec->doc_id_1){
														$doc1 = explode("|", $rec->doc_id_1);
													}
													if($rec->doc_id_2){
														$doc2 = explode("|", $rec->doc_id_2);
													}
													if($rec->doc_id_3){
														$doc3 = explode("|", $rec->doc_id_3);
													}
												?>
                                                <div style="position: relative; top: 5px; display: inline-block;">

													@if($rec->doc_id_1 !== '|')
													<a href="#" data-toggle="modal" data-target="#doc" style="display: inline-block; margin-left: 15px;" onclick="docView('{{$doc1[0]}}', `{{$doc1[1]}}`, '{{$rec->rid}}', `{{$rec->signature_1}}`)">
														<span class="bnt btn-info btn-sm">
															<i class="fa fa-file"></i> Doc 1 
														</span>
													</a>
													@else
													<a style="display: inline-block; margin-left: 15px;">
														<span class="bnt btn-default btn-sm" style="color: #bbb;"> 
															<i class="fa fa-file"></i> Doc 1 
														</span>	
													</a>
													@endif
													@if($rec->doc_id_2 !== '|')
													<a href="#" data-toggle="modal" data-target="#doc" style="display: inline-block; margin-left: 25px;" onclick="docView('{{$doc2[0]}}', `{{$doc2[1]}}`, '{{$rec->rid}}', `{{$rec->signature_2}}`)">
														<span class="bnt btn-info btn-sm"> 
															<i class="fa fa-file"></i> Doc 2 
														</span>
													</a>
													@else
													<a style="display: inline-block; margin-left: 25px;">
														<span class="bnt btn-default btn-sm" style="color: #bbb;"> 
															<i class="fa fa-file"></i> Doc 2 
														</span>	
													</a>												
													@endif
													@if($rec->doc_id_3 !== '|')
													<a href="#" data-toggle="modal" data-target="#doc" style="display: inline-block; margin-left: 25px;" onclick="docView('{{$doc3[0]}}', `{{$doc3[1]}}`, '{{$rec->rid}}', `{{$rec->signature_3}}`)">
														<span class="bnt btn-info btn-sm"> 
															<i class="fa fa-file"></i> Doc 3 
														</span>
													</a>
													@else
													<a style="display: inline-block; margin-left: 25px;">
														<span class="bnt btn-default btn-sm" style="color: #bbb;"> 
															<i class="fa fa-file"></i> Doc 3 
														</span>	
													</a>
													@endif
													
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>  
                    @endif <!-- end if reg type -->
                    @endforeach <!-- end entries as $rec -->
                </div>




            <br><br>
            @else <!-- if count entries = 0 -->
                    <p>No Entries Found For Your Chosen Date</p>
            @endif <!-- close if count entries -->




            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="force_sign_out">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="color: #333;">Force Sign Out</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('PagesController.forceSignout') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <center>
                        <label style="color: #333;">Please Enter The Correct Sign Out Date and Time</label><br>
                        <span style="display: inline-block;">
                            <input type="date" class="form-control" name="sign_out_date" style="width: 170px;">          
                        </span>
                        <span style="display: inline-block;">
                            <input type="time" class="form-control" name="sign_out_time" style="width: 100px;">    
                        <input type="hidden" class="form-control" name="id" id="id" value=""> 
                        </span>
                        <script>
                            function getMyId(id){
                                var fid = id;
                                document.getElementById('id').value = fid;
                            }
                        </script> 
                        <br><br>
                        <button type="submit" name="submit" class="btn btn-danger">
                            <i class="fa fa-sign-out fa-lg"></i> Force Sign Out
                        </button>
                    </center>
                </div>
                <br>
            </form>  
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

		
		
  <div class="modal fade" tabindex="-1" role="dialog" id="doc">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Document Preview - Register ID: <span id="sn"></span></h4>
        </div>
        <div class="modal-body" style="color: #333;">
			<div><u><h4><span id="aaa"></span></h4></u></div>
			<div style="white-space: pre-wrap; line-height: 2;"><span id="bbb"></span></div>
            <br> 
			<div><img src="" id="sig"></div>
			<script>
				function docView(a, b, c, d){
					var aa = a;
					var bb = b;
					var cc = c;
					var dd = d;
					
					if(dd === ''){
						var dd = 'storage/images/logo_w_s.png';	
					}
					document.getElementById('aaa').innerHTML = aa;
					document.getElementById('bbb').innerHTML = bb;
					document.getElementById('sn').innerHTML = cc;
					document.getElementById("sig").src = "https://ereceptionhub.co.uk/" + dd;
				}
			</script>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
@endsection
