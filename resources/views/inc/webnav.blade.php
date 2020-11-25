<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" style="padding: 0px; margin-top: 0px;" href="#"><img src="../../storage/images/erec.ico" height="40px"><img src="../../storage/images/logo_w.png" style="height: 30px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active" id="home">
          <a class="nav-link" href="/home"> <i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item" id="about">
            <a class="nav-link" href="/about"> <i class="fa fa-info"></i> About Us</a>
        </li>
        <li class="nav-item" id="services">
            <a class="nav-link" href="/services"> <i class="fa fa-cogs"></i> Our Servies</a>
        </li>
        <li class="nav-item" id="contact">
            <a class="nav-link" href="/contact"> <i class="fa fa-phone"></i> Contact Us</a>
        </li>
    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">    
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" style="font-size: 15px; color: #fff;"> <i class="fa fa-sign-in fa-lg"> </i> Login</a></li>&nbsp;&nbsp;&nbsp;
                            <li><a href="{{ route('register') }}" style="font-size: 15px; color: #fff;"> <i class="fa fa-user-plus"> </i> Registration</a></li>
                        @else
                            <li class="nav-item dropdown" style="padding-right: 60px;">
                                <a href="#" class="nav-link dropdown-toggle" id="dropdown01"  data-toggle="dropdown" role="button" aria-expanded="false" style="color: #fff;">
                                        <i class="fa fa-user fa-lg"> </i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </a>
    
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="../../dashboard"> <i class="fa fa-tachometer"> </i> Admin Dashboard </a>
                                    <a class="dropdown-item" href="../../register_in_out"> <i class="fa fa-list"> </i> Register </a>
                                    <a class="dropdown-item" href="../../account"> <i class="fa fa-user"> </i> My Account </a>
                                    @if(auth()->user()->user_level > '4')
                                        <a class="dropdown-item" href="../../administration"> <i class="fa fa-user-plus"> </i> User Administration </a>
										<a class="dropdown-item" href="../../preregister"> <i class="fa fa-id-card"> </i> Pre Register a Visitor </a>
                                        <a class="dropdown-item" href="../../firesafety"> <i class="fa fa-fire-extinguisher"> </i> Fire Safety </a>
										<a class="dropdown-item" href="../../reports"> <i class="fa fa-folder"> </i> Reports </a>
                                    @endif
                                    <a class="dropdown-item" href="../../policies"> <i class="fa fa-file"> </i> Policies </a>
                                    @if(auth()->user()->user_level > '4')
                                        <a class="dropdown-item" href="../../settings"> <i class="fa fa-cogs"> </i> Environment Settings </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"> </i> Logout
                                    </a>
            
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </div>
                            </li>
                        @endif
                    </ul>
    
    </div>
  </nav>
