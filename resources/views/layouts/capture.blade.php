<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J9QDYXSGS4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J9QDYXSGS4');
</script>
    <title>eReception Hub</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>-->
    <script src="https://ereceptionhub.co.uk/js/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="icon" type="image/png" sizes="64x64" href="https://ereceptionhub.co.uk/storage/images/erec.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="https://ereceptionhub.co.uk/storage/images/erec_180.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content= "eReception Hub is a staff and visitor reception management system. It is a collection of tools designed to replace traditional visitors books and staff and visitor site logging systems. It also has extensive fire safety features, plus much much more. Find out more!" />
    <meta name="robots" content= "index, follow">
    <link rel="canonical"  href="https://www.ereceptionhub.co.uk">
    <meta property="og:title" content="Replace your paper visitors book and safeguard your personal information - eReceptionHub" />
    <meta property="og:type" content="Images" />
    <meta property="og:url" content="https://ereceptionhub.co.uk" />
    <meta property="og:image" content="https://ereceptionhub.co.uk/storage/images/Welcome.png" />
    <meta property="og:description" content="eReception Hub is a staff and visitor reception management system. It is a collection of tools designed to replace traditional visitors books and staff and visitor site logging systems. It also has extensive fire safety features, plus much much more. Find out more!" />
	
	
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style type="text/css">

        body, html {
            color: #333;
            background-color: #eee !important;
            background-image: URL('https://ereceptionhub.co.uk/storage/images/bg_tile3.png');
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
            top: 150px;
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
            top: 150px;
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
    <script type="text/javascript" src="https://ereceptionhub.co.uk/js/links.js"></script>

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
        jpeg_quality: 120
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
