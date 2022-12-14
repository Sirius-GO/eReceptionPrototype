<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J9QDYXSGS4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J9QDYXSGS4');
</script>
    <meta charset="utf-8">
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
	
	
	
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- High Charts CDN -->
    <script src="../js/highcharts.js"></script>

    <!-- Charts CDN 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>-->

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">



        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body, html {
        color: #eee;
        background-color: #eee !important;
        background-image: URL('https://ereceptionhub.co.uk/storage/images/wallpaper_C4D.jpg');
        height: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        overflow-x: hidden;
        } 
        
        p {
            word-break: break-all; 
        }
        .fade-in {
        margin-top: 10vh;
        animation: fadeIn ease 2s;
        -webkit-animation: fadeIn ease 2s;
        }
        @keyframes fadeIn {
        0% {
            opacity:0;
        }
        100% {
            opacity:1;
        }
        }

        @-webkit-keyframes fadeIn {
        0% {
            opacity:0;
        }
        100% {
            opacity:1;
        }
        }

        a, a:hover {
            color: unset;
            background-color: unset;
            text-decoration: unset;
        }


        p {
            line-height: 1.8;
            font-size: 20px;
            font-weight: 450;
        }
        body,h1,h2,h3,h4,h5,h6 {
            font-family: "Lato", sans-serif; 
        }

        .message_bar{
        width: 100%;
        text-align: center;
        position: absolute;
        top: 55px;
        z-index: 3;

        animation:message_bar 3s 1;
        -webkit-animation:message_bar 3s 1;
        animation-fill-mode: forwards;

        animation-delay:3.5s;
        -webkit-animation-delay:3.5s; /* Safari and Chrome */
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

    .myPop {
        position: absolute;
        width: 60.5vw;
        max-height: 71vh;
        left: 50%;
        margin-left: -31vw;
        top: 70px;
        background-color: #333;
        border: solid 4px #fff;
        z-index: 10;
    }
    .myPop span.close {
        position: absolute;
        top: -23px;
        right: -23px;
        font-size: 30px;
        color: #fff;
        opacity: 1;
        z-index: 15;
    }


    .wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
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

    .welcome {
        height: 20vh;
        max-width: 60vw;
        font-size: 5vw;
        font-weight: 900;
        -webkit-text-stroke: 1.5px #333;
    }
    .txt {
        font-size: 35px;
        font-weight: 900;
        -webkit-text-stroke: 1.5px #333;
    }

    .logo {
        position: absolute;
        top: 55px;
        left: 10px;
    }

    #main {
        /*-webkit-filter: hue-rotate(0deg);
        filter: hue-rotate(0deg);
        -webkit-filter: saturate(1);
        filter: saturate(1);*/
    }

    #preview{
       position: absolute;
       width: 50vw;
       max-width: 50vw;
       max-height: 60vh;
       top: 150px;
       left: 50%;
       margin-left: -25vw;
       z-index: 0;
    }
    #preview_box{
        position: absolute;
        width: 60vw;
        height: calc(60vw*0.7);
        max-height: 75vh;
        left: 50%;
        margin-left: -30vw;
        top: 100px;
        max-width: 60vw;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 10;
    }
    #scancode{
        margin-top: 10px;
    }
    #cam{
        position: absolute;
        width: 400px;
        text-align: center;
        left: 50%;
        margin-left: -200px;
        top: 550px;
    }
    #wait_message{
        position: absolute;
        width: 300px;
        height: 100px;
        border: solid 1px #fff;
        color: #fff;
        font-size: 2vw;
        left: 50%;
        margin-left: -150px;
        top: 200px;
        display: none;
    }

    .hideme{
        display: none;
    }

    #loading{
        position: absolute;
        width: 300px;
        height: 100px;
        border: solid 1px #fff;
        color: #fff;
        font-size: 2vw;
        left: 50%;
        margin-left: -150px;
        top: 200px;
        display: none;
    }
    div[class^=MyCard_]{
                width: 100%;
                min-width: 280px;
                max-width: 310px;
                height: 200px;
                -webkit-transition: -webkit-transform 1s;
                -moz-transition: -moz-transform 1s;
                -o-transition: -o-transform 1s;
                transition: transform 1s;
                -webkit-transform-style: preserve-3d;
                -moz-transform-style: preserve-3d;
                -o-transform-style: preserve-3d;
                transform-style: preserve-3d;
                -webkit-transform-origin: 50% 50%;
            }
            div[class^=MyCard_] div {
                height: 200px;
                width: 100%;
                color: #333;
                -webkit-backface-visibility: hidden;
                -moz-backface-visibility: hidden;
                -o-backface-visibility: hidden;
                backface-visibility: hidden;
            }

            div[class^=MyCard_] .front {
                position: absolute;
                top: 0px;
                background: #fff;
                z-index: 1;
            }
            div[class^=MyCard_] .back {
                position: absolute;
                top: 0px;
                background: #ddd;
                z-index: 1;
                -webkit-transform: rotateY( 180deg );
                -moz-transform: rotateY( 180deg );
                -o-transform: rotateY( 180deg );
                transform: rotateY( 180deg );
            }
            div[class^=MyCard_].flipped {
                -webkit-transform: rotateY( 180deg );
                -moz-transform: rotateY( 180deg );
                -o-transform: rotateY( 180deg );
                transform: rotateY( 180deg );
            }

            .mb {
                line-height: 12px;
                margin-left: 10px;
            }
    </style>
    <script type="text/javascript" src="https://ereceptionhub.co.uk/js/links.js"></script> 
    <title>{{ config('app.name', 'eReception-Hub') }}</title>

</head>
<body>
    <!-- if statement to check and include somethng only for index / -->
    @if(Request::is('/')) 
    @endif
    <div class="wrapper">
        @include('inc.navbar')
        @include('inc.messages')
        <div class="fade-in">
            @yield('content')
            <br><br><br><br><br>
        </div>
        @include('inc.footer')
    </div>
    <!-- Scripts 
    
    <script src="../public/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="../public/js/jquery.form.min.js"></script>

    -->
            <script>
                var dropCookie = true;                      // false disables the Cookie, allowing you to style the banner
                var cookieDuration = 14;                    // Number of days before the cookie expires, and the banner reappears
                var cookieName = 'GDPRcomplianceCookie';        // Name of our cookie
                var cookieValue = 'on';                     // Value of cookie
                
                function createDiv(){
                    var bodytag = document.querySelector(".container");
                    var div = document.createElement('div');
                    div.setAttribute('id','cookie-law');
                    div.innerHTML = '<p>Our website uses cookies. By continuing we assume your permission to deploy cookies, as detailed in our <a href="/privacy" rel="nofollow" title="Policies">privacy and cookie policies</a>. <a class="close-cookie-banner" href="javascript:void(0);" onclick="removeMe();" style="padding-left: 35px; text-decoration: none;"><span class=pull-right>X&nbsp;&nbsp; </span></a></p>';    
                // Be advised the Close Banner 'X' link requires jQuery
                    bodytag.appendChild(div); // Adds the Cookie Law Banner just before the closing </body> tag
                    // or
                    //bodytag.insertBefore(div,bodytag.firstChild); // Adds the Cookie Law Banner just after the opening <body> tag
                    document.querySelector(".container").className+=' cookiebanner'; //Adds a class tothe <body> tag when the banner is visible
                    createCookie(window.cookieName,window.cookieValue, window.cookieDuration); // Create the cookie
                }
                function createCookie(name,value,days) {
                    if (days) {
                        var date = new Date();
                        date.setTime(date.getTime()+(days*24*60*60*1000)); 
                        var expires = "; expires="+date.toGMTString(); 
                    }
                    else var expires = "";
                    if(window.dropCookie) { 
                        document.cookie = name+"="+value+expires+"; path=/"; 
                    }
                }
                function checkCookie(name) {
                    var nameEQ = name + "=";
                    var ca = document.cookie.split(';');
                    for(var i=0;i < ca.length;i++) {
                        var c = ca[i];
                        while (c.charAt(0)==' ') c = c.substring(1,c.length);
                        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                    }
                    return null;
                }
                function eraseCookie(name) {
                    createCookie(name,"",-1);
                }
                window.onload = function(){
                    if(checkCookie(window.cookieName) != window.cookieValue){
                        createDiv(); 
                    }
                }
                function removeMe(){
                    var element = document.getElementById('cookie-law');
                    element.parentNode.removeChild(element);
                }

                function changeHue(n, m){
                    h = document.getElementById('main');
                    h.style.WebkitFilter = "hue-rotate(" + n + "deg)" + "saturate(" + m + ")";
                    h.style.filter = "hue-rotate(" + n + "deg)" + "saturate(" + m + ")";
                }

                var a = document.getElementById('myRange');
                value=a.value;
                var b = document.getElementById('myRangeB');
                valueb=b.value;

                a.addEventListener("input",function(){
                    value=a.value;
                    valueb=b.value;
                console.log(value, valueb);
                changeHue(value, valueb);
                },0);   

                b.addEventListener("input",function(){
                    value=a.value;
                    valueb=b.value;
                console.log(value, valueb);
                changeHue(value, valueb);
                },0);   

    </script>
    <script>
        
        document.getElementById('loading').style.display = "block";

        setTimeout(function() {
            document.getElementById('wait_message').style.display = "block";
           document.getElementById('loading').style.display = "none";
        },3000);
    </script>

<script>
    function flip(i) {
          $('.MyCard_'+i).toggleClass('flipped');
      }
  </script>
</body>
</html>
