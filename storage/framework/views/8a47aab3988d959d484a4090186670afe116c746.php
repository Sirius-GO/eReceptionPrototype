<nav class="navbar navbar-default navbar-fixed-top" style="background-color: rgba(0,0,0,0.05); color: #fff; font-size: 1.5vh;">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                    <!--<li><a href="../../ereceptionhub/public/"> <i class="fa fa-home"> </i> Home</a></li>-->
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                    <li><a href="<?php echo e(url('locale/en')); ?>" > <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/british_flag.jpg" title="English" style="height: 30px; margin-top: -10px; margin-bottom: -10px;"></a></li>
                    <li><a href="<?php echo e(url('locale/welsh')); ?>" > <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/welsh_flag.jpg" title="Welsh" style="height: 30px; margin-top: -10px; margin-bottom: -10px;"></a></li>
                    <li>
                        <a href="<?php echo e(route('logout')); ?>" style="margin-left: 200px; font-size:15px; color: #fff;"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"> </i> Logout
                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/inc/hubnav.blade.php ENDPATH**/ ?>