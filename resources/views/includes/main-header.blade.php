<header id="header" class="clearfix">
    <div class="site-header">
        <div class="container">
            <div class="row">
                <div class="top-header clearfix" style="padding: 20px 15px !important;">
                    <div class="logo col-md-4">
                        <a href="{{url('/')}}">
                            <img src="{{asset('public/main/img/logo.png')}}" alt="" />
                        </a>
                    </div>

                    <div class="info col-md-8">
                        <ul>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                <p>
                                    <span class="heading">Opening Hours</span>
                                    <span>Mon - Sat: 09.00 - 17.00</span>
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p>
                                    <span class="heading">Call Us</span>
                                    <span>(064) 234 54876</span>
                                </p>
                            </li>
                            <li class="last">
                                <i class="fa fa-envelope"></i>
                                <p>
                                    <span class="heading">Email Us</span>
                                    <span>logitrans@domain.com</span>
                                </p>
                            </li>
                        </ul>
                    </div>

                    <div class="slide-buttons">
                        <button id="slide-buttons" class="slide-button icon icon-navicon"></button>
                    </div>
                </div>

                <div class="navigation">
                    <div class="main-menu">
                        <ul class="menu">
                            <li ><a href="{{url('/')}}">Home</a>
                            </li>
                            <li><a href="{{url('about')}}">About Us</a></li>
                            <li ><a href="{{url('services')}}">Services</a>
                            </li>
                            <li><a href="{{url('contact')}}">Contact</a></li>
                        </ul>

                        <div class="right-section">
                            
                            <div class="quote-link">
                                <a href="{{url('login')}}">Login/Register</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Mobile
    ============================================= -->
    <nav id="c-menu--slide-right" class="c-menu c-menu--slide-right">
        <button class="c-menu__close icon icon-close"></button>

        <ul class="slide-menu-items">
            <li ><a href="{{url('/')}}">Home</a>
            </li>
            <li><a href="{{url('about')}}">About Us</a></li>
            <li ><a href="{{url('services')}}">Services</a>
            </li>
            <li><a href="{{url('contact')}}">Contact</a></li>
        </ul>

        <div class="info">
            <ul>
                <li>
                    <p>
                        <span class="heading">Opening Hours</span>
                        <span>Mon - Sat: 09.00 - 17.00</span>
                    </p>
                </li>
                <li>
                    <p>
                        <span class="heading">Call Us</span>
                        <span>(064) 234 54876</span>
                    </p>
                </li>
                <li class="last">
                    <p>
                        <span class="heading">Email Us</span>
                        <span>logitrans@domain.com</span>
                    </p>
                </li>
            </ul>
        </div>
    </nav>

    <div id="slide-overlay" class="slide-overlay"></div>
    <!-- Menu Mobile End -->
</header>
            