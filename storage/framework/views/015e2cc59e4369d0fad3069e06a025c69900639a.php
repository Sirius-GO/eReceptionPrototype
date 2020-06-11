<nav class="navbar navbar-default navbar-fixed-top" style="background-color: rgba(100,100,100,1); color: #fff; font-size: 1.5vh;">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?php echo e(url('/home')); ?>" style="color: #fff;"> <i class="fa fa-home fa-lg"> </i> </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                    <!--<li><a href="../../ereceptionhub/public/"> <i class="fa fa-home"> </i> Home</a></li>-->
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('locale/en')); ?>" > <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/british_flag.jpg" title="English" style="height: 30px; margin-top: -10px; margin-bottom: -10px;"></a></li>
                    <li><a href="<?php echo e(url('locale/welsh')); ?>" > <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/welsh_flag.jpg" title="Welsh" style="height: 30px; margin-top: -10px; margin-bottom: -10px;"></a></li>
                    <li><a href="<?php echo e(route('login')); ?>" style="font-size: 15px; color: #fff;"> <i class="fa fa-sign-in fa-lg"> </i> Admin Login</a></li>
                    <!-- <li><a href="<?php echo e(route('register')); ?>"> <i class="fa fa-user-plus"> </i> Registration</a></li>-->
                <?php else: ?>
                    <li><a href="<?php echo e(url('locale/en')); ?>" > <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/british_flag.jpg" title="English" style="height: 30px; margin-top: -10px; margin-bottom: -10px;"></a></li>
                    <li><a href="<?php echo e(url('locale/welsh')); ?>" > <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/welsh_flag.jpg" title="Welsh" style="height: 30px; margin-top: -10px; margin-bottom: -10px;"></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="background-color: rgba(100,100,100,1); color: #fff; color: #fff;">
                                <i class="fa fa-user fa-lg"> </i> <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?><span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu" style="background-color: rgba(255,255,255,1); color: #333;">
                            <li><a href="../../../ereceptionhub/public/dashboard"> <i class="fa fa-tachometer"> </i> Admin Dashboard </a><li>
                                <li><a href="../../../ereceptionhub/public/register_in_out"> <i class="fa fa-list"> </i> Register </a><li>
                                <li><a href="../../../ereceptionhub/public/account"> <i class="fa fa-user"> </i> My Account </a><li>
                                <?php if(auth()->user()->user_level > '4'): ?>
                                    <li><a href="../../../ereceptionhub/public/administration"> <i class="fa fa-user-plus"> </i> User Administration </a><li>                                        
                                    <li><a href="../../../ereceptionhub/public/firesafety"> <i class="fa fa-fire-extinguisher"> </i> Fire Safety </a><li>
                                <?php endif; ?>
                                <li><a href="../../../ereceptionhub/public/policies"> <i class="fa fa-file"> </i> Policies </a><li>
                                <?php if(auth()->user()->user_level > '4'): ?>
                                    <li><a href="../../../ereceptionhub/public/settings"> <i class="fa fa-cogs"> </i> Environment Settings </a><li>
                                <?php endif; ?>
                        <a href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"> </i> Logout
                        </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/inc/navbar3.blade.php ENDPATH**/ ?>