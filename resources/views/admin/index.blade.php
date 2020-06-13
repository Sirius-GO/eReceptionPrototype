@extends('layouts.app2')

<?php 

use App\Company;

?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.admin') }}</h2></div>
                <div class="row">
                    @if(auth()->user()->user_level =='10')
                        <hr>
                        <center>
                            <a href="/administration/create" class="btn btn-primary btn-lg"> <i class="fa fa-plus"></i> Add New User </a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-toggle="modal" data-target="#bulk_reg"><span class="btn btn-primary btn-lg"><i class="fa fa-user-plus"></i> Bulk Registrations </a>
                        </center>
                        <hr>
                    @endif
                </div>            
                <div class="panel-body">
                    @if(count($registrations) > 0)
                        <div class="row">
                            @foreach($registrations as $reg)

                            <!-- ================  Access Pass Layout FULL WIDTH =====================  -->
                            <div id="id_card1_{{$reg->id}}" style="display: none;">
                                <span>
                                    <img src="https://ereceptionhub.co.uk/storage/images/Access_Pass_v2.png" style="position: relative; width: 1000px;">
                                    <img src="https://ereceptionhub.co.uk/storage/images/mug_shots/{{$reg->avatar}}" style="position: absolute; width: 347px; left: 187px; top: 41px; border-radius: 50%;  border: solid 1px #eee;">
                                    <span style="position: absolute; color: #000; font-weight: 700; left: 590px; top: 87px; font-family: tahoma; font-size: 40px;"><p>{{$reg->first_name}} {{$reg->last_name}}</p></span>
                                    <img src="qr-code?text={{$reg->rfid}}&size=300" alt="QR Code" style="position: absolute; left: 650px; top: 320px;">
                                    <span style="position: absolute; color: #000; font-weight: 700; left: 590px; top: 180px; max-width: 333px; font-family: tahoma; font-size: 40px;"><p>{{$reg->job_title}}</p></span>
                                    <?php 
                                        $company = Company::where('id', $reg->company_id)->take(1)->get(); 
                                        foreach($company as $comp){
                                            $comp_name = $comp->company_name;
                                        }
                                    ?>
                                    <span style="position: absolute; color: #808080; font-weight: 700; left: 190px; top: 430px; max-width: 470px; font-family: tahoma; font-size: 40px;"><p>{{$comp_name}}</p></span>
                                </span>
                            </div>

                            <!-- ================  Access Pass Layout 380px WIDTH =====================  -->
                            <div id="id_card_{{$reg->id}}" style="display: none;">
                                <span>
                                    @if(count($layout ?? '') > 0)
                                        @foreach($layout ?? '' as $l)
                                        <?php 
                                            $h = $l->hue_pass; 
                                            $s = $l->sat_pass;                                 
                                        ?>

                                            <img src="https://ereceptionhub.co.uk/storage/images/Access_Pass_v2.png" 
                                            style="position: relative; width: 380px; margin: 30px; border: solid 1px #000; -webkit-filter: hue-rotate(<?php echo $h."deg"; ?>) saturate(<?php echo $s; ?>); ">
                                        @endforeach
                                    @endif
                                    <img src="https://ereceptionhub.co.uk/storage/mug_shots/{{$reg->avatar}}"
                                    style="position: absolute; width: 138px; left: 71px; top: 16px; border-radius: 50%;  border: solid 1px #eee; margin: 30px;">
                                    <span style="margin: 30px; position: absolute; color: #000; font-weight: 700; left: 224px; top: 38px; font-family: tahoma; font-size: 15px;">
                                        <p>{{$reg->first_name}} {{$reg->last_name}}</p>
                                    </span>
                                    <img src="qr-code?text={{$reg->rfid}}&size=115" alt="QR Code"
                                    style="margin: 30px; position: absolute; left: 245px; top: 121px;">
                                    <span style="margin: 30px; position: absolute; color: #000; font-weight: 700; left: 224px; top: 74px; max-width: 127px; font-family: tahoma; font-size: 15px;">
                                        <p>{{$reg->job_title}}</p>
                                    </span>
                                    <?php 
                                        $company = Company::where('id', $reg->company_id)->take(1)->get(); 
                                        foreach($company as $comp){
                                            $comp_name = $comp->company_name;
                                        }
                                    ?>
                                    <span style="margin: 30px; position: absolute; color: #ddd; font-weight: 700; left: 77px; top: 167px; max-width: 179px; font-family: tahoma; font-size: 15px;">
                                        <p>{{$comp_name}}</p>
                                    </span>
                                </span>
                            </div>

                                    <div class="col-6 col-sm-6 col-md-3 col-lg-3" style="background-color: rgba(0,0,0,0.1); padding: 10px; display: inline-block; border: solid 1px #aaa; margin-top: 3px;">
                                        <button onclick="printID({{$reg->id}})" class="btn btn-default btn-sm" style="position: absolute; top: 3px; right: 3px;"><i class="fa fa-print"></i> Print ID </button><br>
                                        <script>
                                            function printID(id){
                                                var printContents = document.getElementById('id_card_' + id).innerHTML;
                                                w = window.open();
                                                w.document.write(printContents);
                                                w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');
                                                w.document.close(); // necessary for IE >= 10
                                                w.focus(); // necessary for IE >= 10
                                                return true;
                                            }                                      
                                        </script>
                                        <img src="https://ereceptionhub.co.uk/storage/mug_shots/{{$reg->avatar}}" style="width: 60%; margin-left: 20%; border-radius: 50%;  border: solid 1px #eee;">
                                        <h6><span class="badge" style="background-color: #1e7553;">Name: </span> {{$reg->first_name}} {{$reg->last_name}} </h6>
                                        <h6><span class="badge" style="background-color: #1e7553;">Current Status: </span> {{$reg->current_status}} </h6>
                                        <hr>
                                        <p align="center"><a href="/administration/{{$reg->id}}" class="btn btn-primary brn-sm"><i class="fa fa-search"></i> View Full Details </a></p>
                                        @if(auth()->user()->user_level =='10')
                                            <a href="/administration/{{$reg->id}}/edit" class="btn btn-success btn-sm pull-left"><i class="fa fa-pencil"></i> Edit </a>
                                        @endif
                                        <span>
                                            @if(!Auth::guest())
                                            @if(Auth::user()->id != $reg->id)                               
                                                @if(auth()->user()->user_level =='10')
                                                    {!!Form::open(['class' => "delete", 'action' => ['RegistrationsController@destroy', $reg->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        <button class="btn btn-danger btn-sm pull-right" onclick="return myConfirm();"><i class="fa fa-trash"></i> Delete </button>
                                                        <!--{{Form::button('<i class="fa fa-trash"> </i> Delete ', ['class' => 'btn btn-danger btn-sm pull-right', 'type' => 'submit'])}}-->
                                                    {!!Form::close()!!}
                                                @endif
                                            @endif
                                        @endif
                                        <script>
                                            function myConfirm() {
                                                var result = confirm("Are you sure you want to delete this registration?");
                                                    if (result==true) {
                                                        return true;
                                                    } else {
                                                        return false;
                                                    }
                                            }
                                        </script>
                                                                                <!--<a href="/administration/{{$reg->id}}/delete" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash"></i> Delete </a>-->
                                        </span>
                                    </div>
                            @endforeach
                        </div>
                    @else
                        <p>No Registrations Found</p>
                    @endif
                    <br><br>
                    {{$registrations->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="bulk_reg">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="color: #333;">Bulk Upload User Registrations</h4>
        </div>
        <div class="modal-body">
            <!-- Upload CSV -->
            <form id="csv_upload_form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label style="color: #333;">Choose a CSV template</label>
                    <input type="file" class="form-control" name="file_name" id="file_name">          
                </div>
                <button type="submit" name="submit" class="btn btn-success" onclick="uploadCSV()">
                    <i class="fa fa-upload"></i> Upload CSV
                </button>
                <br><br>
                <center>
                <progress id="progressBar" value="0" max="100" style="width:250px;"></progress>
                <h3 id="status" style="color: #333;"></h3>
                <p id="loaded_n_total" style="color: #333;"></p>
                </center>
        </form>  
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script>   
        function uploadCSV(){
            var file = document.getElementById("file_name").files[0];
            var formdata = new FormData();
            formdata.append("file_name", file);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "{{ route('bulk_reg.store') }}");
            ajax.send(formdata);
        }
        function progressHandler(event){
            document.getElementById("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
            var percent = (event.loaded / event.total) * 100;
            document.getElementById("progressBar").value = Math.round(percent);
            document.getElementById("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
        }
        function completeHandler(event){
            document.getElementById("status").innerHTML = event.target.responseText;
            document.getElementById("progressBar").value = 0;
            $('#csv_upload_form')[0].reset();
        }
        function errorHandler(event){
            document.getElementById("status").innerHTML = "Upload Failed";
        }
        function abortHandler(event){
            document.getElementById("status").innerHTML = "Upload Aborted";
        }
    </script>  

@endsection
