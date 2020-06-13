<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <meta charset="utf-8">
       <link rel="icon" type="image/png" sizes="64x64" href="https://ereceptionhub.co.uk/storage/images/erec.ico">
       <link rel="apple-touch-icon" sizes="180x180" href="https://ereceptionhub.co.uk/storage/images/erec_180.png">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
       <meta name="apple-mobile-web-app-capable" content="yes" />
       <meta name="apple-mobile-web-app-status-bar-style" content="black" />
       <link rel="apple-touch-startup-image" href="https://ereceptionhub.co.uk/storage/images/launch.png">
       <link rel="manifest" href="https://ereceptionhub.co.uk/js/manifest.json">
        <title>eReception Hub</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Styles -->
        <style>
            html, body {
                font-family: tahoma, sans-serif;
                font-weight: lighter;
                margin: 0;
                color: #eee;
                background-color: #eee !important;
                background-image: URL('https://ereceptionhub.co.uk/storage/images/bg_tile3.png');
                background-repeat: repeat;
                overflow-x: hidden;
            }
            footer {
                position: relative;
                margin-top: auto;
                width: 100%;
                background-color: rgba(0, 0, 0, 0.3);
            }

            footer p {
                font-size: 12px !important;
                line-height: 12px;
            }
            .carousel-logo{
                position: absolute;
                top: 25px;
                right: 5px;
                z-index: 20;
            }
            .jumbotron {
                height: 300px;
            }
            .jumbo-logo{
                position: absolute;
                top: 75px;
                right: 10px;
                z-index: 20;
            }
            .message_bar{
                width: 100%;
                text-align: center;
                position: absolute;
                top: 65px;
                z-index: 99;

                animation:message_bar 5s 1;
                -webkit-animation:message_bar 5s 1;
                animation-fill-mode: forwards;

                animation-delay:5.5s;
                -webkit-animation-delay:5.5s; /* Safari and Chrome */
                -webkit-animation-fill-mode: forwards;

                }

                @keyframes message_bar{
                    from {opacity :1;}
                    to {opacity :0;}
                }

                @-webkit-keyframes message_bar{
                    from {opacity :1;}
                    to {opacity :0;}
                }

                #cookie-law {
                position: absolute;
                top: 140px;
                width: 90%;
                left: 50%;
                margin-left: -45%;
                max-width: 90%;
                background:#eee;
                border: solid 2px;
                text-align: center;
                }

                #cookie-law p {
                padding:10px;
                font-size:15px !important;
                font-weight:bold;
                margin: auto;
                color:#333;
                }
                .mybox {
                margin-top: 10px;
                background-color: rgba(255, 255, 255, 0); 
                color: #222; 
                border: solid 15px rgba(0, 0, 0, 0);
                }
                .mybox2{
                    width: 98%;
                    height: 620px;
                    padding: 10px;
                    border-radius: 10px;
                    background-color: rgba(0, 0, 0, 0.1);
                }

                .uls {
                font-size: 12px; 
                font-weight: 500; 
                line-height: 25px;
                margin-left: -10px;
                list-style-position: inside;
                text-align: left;
                }

                /*This inserts a bridge return for carousel text when screen us less than 900px */
                @media (max-width: 900px) {
                    .narrow {
                        display: block;
                    }
                }

		.jumbo_img {
		   background-image: url("https://ereceptionhub.co.uk/storage/images/about_banner.jpg");
		   background-repeat: no-repeat;
    		   background-color: #8ca417;
		}

                .jumbo_serv {
                   background-image: url("https://ereceptionhub.co.uk/storage/images/services_banner.jpg");
                   background-repeat: no-repeat;
                   background-color: #8ca417;
                }

                .jumbo_cont {
                   background-image: url("https://ereceptionhub.co.uk/storage/images/contact_banner.jpg");
                   background-repeat: no-repeat;
                   background-color: #8ca417;
                }

        </style>
    <script type="text/javascript" src="https://ereceptionhub.co.uk/js/links.js"></script>
    </head>
    <body>
        @include('inc.webnav')
        @include('inc.messages')
        @yield('content')
        @include('inc.footer')


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </body>
</html>
