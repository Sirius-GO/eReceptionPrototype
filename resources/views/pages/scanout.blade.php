@extends('layouts.hub')

@section('content')

<div class="row">
    <center>
            <video id="preview"></video>
            <div id="preview_box">            
                <div id="scancode" style="color: #fff;">
                <div id="loading"> Loading....<br>Please Wait </div>  
                <div id="wait_message">Please Scan Your QR Code</div>
            </div>
</div>
    </center>
</div>
<div class="row">
    <div id="cam">
<!--<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>-->
<script src="../../ereceptionhub/resources/js/instascan.min.js"></script>
<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 2, mirror: false });
    scanner.addListener('scan',function(content){
        //alert(content);
        document.getElementById("scancode").innerHTML = 'scan_out?id='+content;
        window.location.href='scan_out?id='+content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
</script>


<div class="hideme">
    <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
    <label class="btn btn-primary active">
        <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
    </label>
    <label class="btn btn-secondary">
        <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
    </label>
    </div>
</div>




</div>
<a href="/ereceptionhub/public/hub" class="btn btn-primary btn-lg" style="position: absolute; top: 100px; right: 150px;"> <i class="fa fa-arrow-left"> </i> Go Back </a>
</div>
@endsection