<!DOCTYPE html>
<html>
<head>

    <title>eReception Hub</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">

        body, html {
            color: #333;
            background-color: #eee !important;
            background-image: URL('http://localhost:8080/ereceptionhub/storage/app/public/images/bg_tile3.png');
            background-repeat: repeat;
            overflow-x: hidden;
        } 

        #cam_wrap{
            position: absolute;
            width: 340px;
            height: 320px;
            padding: 20px;
            left: 50%;
            margin-left: -400px;
            top: 130px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }
        #my_camera {
            position: absolute;
            width: 300px;
            height: 240px;
        }
        #take_snap{
            position: absolute;
            width: 150px;
            bottom: 10px;
            left: 50%;
            margin-left: -75px;         
        }

        #results_wrap{
            position: absolute;
            width: 346px;
            height: 320px;
            padding: 20px;
            left: 50%;
            margin-left: 60px;
            top: 130px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }
        #results { 
            padding: 2px;
            border:1px solid; 
            background:#ccc; 
            word-break: break-word;
        }
        #sub_snap{
            position: absolute;
            width: 150px;
            bottom: 10px;
            left: 50%;
            margin-left: -75px;         
        }


        footer {
            position: absolute;
            bottom: 0px;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            color: #eee;
        }

        footer p {
            font-size: 12px !important;
            line-height: 12px;
        }



    </style>
</head>

<body>

    @include('inc.messages')
    <div class="fade-in">
        @yield('content')
        <br><br><br><br><br>
    </div>
    @include('inc.footer')

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">

    Webcam.set({
        width: 300,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );

  

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            document.getElementById("image1").value = data_uri;
            $('#sub_snap').show();
        } );
    }

    if(!$('image1').val()){
    $('#sub_snap').hide();
    }
</script>

</body>

</html>