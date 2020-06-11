<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="64x64" href="http://localhost:8080/ereceptionhub/storage/app/public/images/erec.ico">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        body, html {
        color: #eee;
        background-color: #eee !important;
        background-image: URL('http://localhost:8080/ereceptionhub/storage/app/public/images/bg_tile3.png');
        background-repeat: repeat;
        overflow-x: hidden;
        } 
        
        p {
            word-break: break-word; 
        }
        .fade-in {
        margin-top: 10vh;
        animation: fadeIn ease 2s;
        -webkit-animation: fadeIn ease 2s;
        }
        @keyframes  fadeIn {
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

        @keyframes  message_bar{
            from {opacity :1;}
            to {opacity :0;}
        }

        @-webkit-keyframes message_bar{
            from {opacity :1;}
            to {opacity :0;}
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



            .checkmark {
                position: relative;
                top: 10px;
                height: 30px;
                width: 30px;
                background-color: #eee;
                border-radius: 50%;
            }


            .fire_mod{
                min-height: 50px; 
                padding-top: 5px; 
                padding-bottom: 5px; 
                background-color: rgba(255, 255, 255, 0.2); 
                padding-left: 10px;
                padding-right: 10px;                
                border-left: 1px solid rgba(238,238,238,0.3);
                border-right: 1px solid rgba(56,105,56,0.3);
            }
            
            .fire_mod_staff{
                min-height: 50px; 
                padding-top: 5px; 
                padding-bottom: 5px; 
                background-color: rgba(0,0,255,0.4);
                border-right: 1px solid rgba(56,105,56,0.3);
            }

            @media (max-width: 767.98px) {
                .fire_mod_staff{
                    border-radius: 25px 25px 0 0;
                }
            }
            @media (min-width: 768px) and (max-width: 1199.68px){
                .fire_mod_staff{
                    border-radius: 25px 0 0 0;
                }
            }
            @media (min-width: 1200px){
                .fire_mod_staff{
                    border-radius: 25px 0 0 25px;
                }
            }

            .fire_mod_vis{
                min-height: 50px; 
                padding-top: 5px; 
                padding-bottom: 5px; 
                background-color: rgba(255,125,0,0.4); 
                border-radius: 25px 0 0 0;
                border-right: 1px solid rgba(56,105,56,0.3);
            }

            @media (max-width: 767.98px) {
                .fire_mod_vis{
                    border-radius: 25px 25px 0 0;
                }
            }
            @media (min-width: 768px) and (max-width: 1199.68px){
                .fire_mod_vis{
                    border-radius: 25px 0 0 0;
                }
            }
            @media (min-width: 1200px){
                .fire_mod_vis{
                    border-radius: 25px 0 0 25px;
                }
            }


            .fire_mod_close{
                min-height: 50px; 
                padding-top: 5px; 
                padding-bottom: 5px; 
                background-color: rgba(30,200,175,0.3); 
                border-left: 1px solid rgba(238,238,238,0.3);
            }

            @media (max-width: 767.98px) {
                .fire_mod_close{
                    border-radius: 0 0 25px 25px;
                }
            }
            @media (min-width: 768px) and (max-width: 1199.68px){
                .fire_mod_close{
                    border-radius: 0 0 25px 0;
                }
            }
            @media (min-width: 1200px){
                .fire_mod_close{
                    border-radius: 0 25px 25px 0;
                }
            }

            .fire_type_text{
                position: relative; 
                top: 10px; 
                left: 10px;
            }

            .fire_type_butn{
                position: relative; 
                top: 10px; 
            }

            .dots, .dots:visited{
                color: #fff;
                text-decoration: none!important;
            }
            .dots:hover{
                color: #333;
                text-decoration: none!important;
            }

            .badge{
                background-color: #0066cc;
            }

            .details_box{
                background-color: rgba(255, 255, 255, 0.5);
                padding: 10px; 
                height: 120px; 
                border: solid 1px #333;
            }

            .firedrill_window{
                width: 100%;
                height: 250px;
                padding: 25px;
                border: solid 1px #eee;
                background-color: rgba(0, 0, 0, 0.3);
                overflow-x: hidden;
                overflow-y: scroll;
            }

            #firedrill_window_bar{
                width: 100%; padding: 5px;
                border: solid 1px #eee;
                margin-top: 5px;
                border-radius: 30px;
                background-color: rgba(255, 255, 255, 0.3);
                margin-left: 0px;
            }
    </style>
    <title><?php echo e(config('app.name', 'eReception-Hub')); ?></title>

</head>
<body>
    <!-- if statement to check and include somethng only for index / -->
    <?php if(Request::is('/')): ?> 
    <?php endif; ?>
    <div class="wrapper">
        <?php echo $__env->make('inc.navbar2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="fade-in">
            <?php echo $__env->yieldContent('content'); ?>
            <br><br><br><br><br>
        </div>
        <?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</body>
</html>
<?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/layouts/fire.blade.php ENDPATH**/ ?>