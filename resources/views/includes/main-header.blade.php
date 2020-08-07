<header class="header">
    <div class="container">
        <div class="row">
            <!-- Logo Starts -->
            <div class="main-logo col-xs-12 col-md-3 col-md-2 col-lg-2 hidden-xs">
                <a href="{{url('/')}}">
                    <img id="logo" class="img-responsive" src="{{asset('public/mantra/images/logo-dark.png')}}" alt="logo">
                </a>
            </div>
            <!-- Logo Ends -->
            <!-- Statistics Starts -->
            <div class="col-md-7 col-lg-7">
                <ul class="unstyled bitcoin-stats text-center">
                    <li>
                        <h6>9,450 USD</h6><span>Last trade price</span></li>
                    <li>
                        <h6>+5.26%</h6><span>24 hour price</span></li>
                    <li>
                        <h6>12.820 BTC</h6><span>24 hour volume</span></li>
                    <li>
                        <h6>2,231,775</h6><span>active traders</span></li>
                        <!--
                    <li>
                        <div class="btcwdgt-price" data-bw-theme="light" data-bw-cur="usd"></div>
                        <span>Live Bitcoin price</span>
                    </li>
-->
                </ul>
            </div>
            <!-- Statistics Ends -->
            <!-- User Sign In/Sign Up Starts -->
            <div class="col-md-3 col-lg-3">
                <ul class="unstyled user">
                    @if(Auth::user() !== null)
                    <li @if(Request::segment(1) == "profile")  class="sign-in" @endif><a href="{{url('/profile')}}" class="btn btn-primary"> My account</a></li>
                    @else
                    <li class="sign-in"><a href="javascript:void(0)"  data-toggle="modal" data-target="#meLogin" class="btn btn-primary"><i class="fa fa-user"></i> Sign in</a></li>
                    <li class="sign-up"><a href="javascript:void(0)" data-toggle="modal" data-target="#meRegister" class="btn btn-primary"><i class="fa fa-user-plus"></i> Register</a></li>
                    @endif
                </ul>
            </div>
            <!-- User Sign In/Sign Up Ends -->
        </div>
    </div>
    <!-- Navigation Menu Starts -->
    <nav class="site-navigation navigation" id="site-navigation">
        <div class="container">
            <div class="site-nav-inner">
                <!-- Logo For ONLY Mobile display Starts -->
                <a class="logo-mobile" href="index-2.html">
                    <img id="logo-mobile" class="img-responsive" src="{{asset('public/mantra/images/logo-dark.png')}}" alt="">
                </a>
                <!-- Logo For ONLY Mobile display Ends -->
                <!-- Toggle Icon for Mobile Starts -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Toggle Icon for Mobile Ends -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <!-- Main Menu Starts -->
                    <ul class="nav navbar-nav">
                        <li @if(Request::segment(1) == "")  class="active" @endif><a href="{{url('/')}}">Home</a></li>
                        <li @if(Request::segment(1) == "about")  class="active" @endif><a href="{{url('about')}}">About Us</a></li>
                        <li @if(Request::segment(1) == "services")  class="active" @endif><a href="{{url('services')}}">Services</a></li>
                        
                        
                        <li @if(Request::segment(1) == "contact")  class="active" @endif><a href="{{url('contact')}}">Contact</a></li>
                        @if(Auth::user() !== null)
                        <li @if(Request::segment(2) == "profile")  class="active" @endif><a href="{{url('customers/profile')}}">My account</a></li>
                        <li ><a href="{{url('logout')}}">Logout</a></li>
                        @endif
                        <!-- Cart Icon Starts -->
                         <!-- Cart Icon Starts -->
                        <!-- Search Icon Starts -->
                        <li class="search"><button class="fa fa-search"></button></li>
                        <!-- Search Icon Ends -->
                    </ul>
                    <!-- Main Menu Ends -->
                </div>
            </div>
        </div>
        <!-- Search Input Starts -->
        <div class="site-search">
            <div class="container">
                <input type="text" placeholder="type your keyword and hit enter ...">
                <span class="close">×</span>
            </div>
        </div>
        <!-- Search Input Ends -->
    </nav>
    <!-- Navigation Menu Ends -->
</header>