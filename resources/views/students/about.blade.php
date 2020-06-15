<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Yasha university of life | Home page
</title>

   

    @include('includes.main-css')
    <!--[if lt IE 9]>
        <script src="{{asset('public/main/javascript/html5shiv.js')}}"></script>
        <script src="{{asset('public/main/javascript/respond.min.js')}}"></script>
    <![endif]-->
</head>                                 
<body class="header-sticky v3"> 
    <!-- Preloader -->
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading</h2>
        </div>
    </section>    

    <!-- Boxed -->
    <div class="boxed">

        <div class="site-wrapper parallax parallax1" style="height: 430px;">
            <div class="top bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 top-reponsive">                      
                            <ul class="flat-information">
                                <li class="phone"><a href="#">+234 704 183 9094</a></li>
                                <li class="email"><a href="#">contact@yul.ng</a></li>
                            </ul>           
                        </div><!-- /.col-md-6 -->       
                        <div class="col-md-6 col-sm-6 top-reponsive">
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                            <div class="flat-dropdown flat-sign-in">                        
                                <ul class="unstyled">
                                    <li class="current"><a href="{{url('login')}}">Sign In</a>
                                     </li>
                                </ul>
                            </div> 
                            <div class="flat-dropdown flat-language">                        
                                <ul class="unstyled">
                                    <li class="current"><a href="#">English</a></li>
                                </ul>
                            </div>
                        </div>        
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.top -->

            <!-- Header -->            
            <header id="header" class="header clearfix">
                <div class="flat-header clearfix">
                    <div class="container">
                        <div class="row">                 
                            <div class="header-wrap clearfix">
                                <div class="col-md-3">
                                    <div >
                                        <h1><a href="{{url('/')}}" rel="home">
                                        <img src="{{asset('public/main/images/logo.jpg')}}" width="70px"/>
                                        </a></h1>
                                    </div><!-- /.logo -->
                                    <div class="btn-menu">
                                        <span></span>
                                    </div><!-- //mobile menu button -->
                                </div>
                                <div class="col-md-9">
                                    <div class="nav-wrap">                            
                                        <nav id="mainnav" class="mainnav">
                                            <ul class="menu"> 
                                            @include('includes.main-links')
                                                           
                                            </ul><!-- /.menu -->
                                        </nav><!-- /.mainnav -->

                                    </div><!-- /.nav-wrap -->
                                    
                                </div>                      
                            </div><!-- /.header-inner -->                 
                        </div><!-- /.row -->
                    </div>
                </div>
            </header><!-- /.header -->
            <div class="wrap-slider">
              <div class="container">
                  <div class="row" style="margin-top: 100px;">
                      <div class="col-md-12">
                          <div class="page-title">
                              <div class="page-content">
                                  <h2>About us</h2>
                              </div>
                              <div class="breadcrumbs">
                                  <ul>
                                      <li><a href="{{url('/')}}">Home</a></li>
                                      <li>About us</li>
                                  </ul>
                              </div><!-- breadcrumb -->
                          </div><!-- page-title -->
                      </div>
                  </div>
              </div><!-- container -->
          </div><!-- wrap-slider -->
        </div><!-- /.site-wrapper -->
            
        
        <section class="flat-row v19 home1" style="margin-top: 40px;">
            <div class="container">
              {{--
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-iconbox">
                            @foreach($programs as $program) 
                            <div class="iconbox style2 text-left">
                                <div class="box-header">
                                    <div class="box-icon">
                                        <i class="icon_globe"></i>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="box-title">{{$program->category_name}}</div>    
                                    <p>{{$program->category_method_of_delivery}} <br/> 
                                    {{$program->category_duration}} <br/> {{$program->category_days_of_lecture}}
                                    </p> 
                                </div>
                                <div class="readmore">
                                    <a href="{{url('students/register/'.$program->category_id)}}" class="flat-button bg-gray box-shaw-hover">Register</a>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="divider h80">
                    
                </div>
                --}}
                <div class="row style-ove">
                    <div class="col-md-7 section-reponsive col-sm-6">
                        <div class="divider h50">
                        </div>
                        <div class="profile flat-pl101">
                            <h2 class="pro-title">Hi, I’m Evang. Innocent</h2>
                            <ul>
                            <li>Founder Yasha University of Life</li>
                            </ul>
                            <div class="pro-content">
                            <h6><a href="#">I've inspired and transformed many lives!</a></h6>
                                <p style="text-align: justify;">I’m owner and founder of Yasha University of Life and author of the international best-selling book Receive your healing for Reaching Your Goals in Life and in Work. I'm also the author of Attracting suitors amongs others.</p><br/>
                                <p style="text-align: justify;">YUL's vision is to educate man to become successful in every area of life. YUL believes in the reality of a complete man made up of spirit, soul and body. Hence YUL seeks to provide solutions in those areas of life that are lacking in the ordinary educational system such as Purpose, Leadership, art of marrying et ceter.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-5 section-reponsive col-sm-6">
                        <div class="feature-about-us">
                            <img src="{{asset('public/main/images/staff/1.jpg')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="flat-row pdb0 sec-progress" style="margin-bottom: 100px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section center">
                            <h1 class="title">My Experiences</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="comment-steps flat-list home-about">
                            <h6 class="title-step">A brief about us</h6>
                            <p style="word-wrap: break-word; text-align: justify;"> The Yasha University of Life (YUL) is an online/offline bible-based institution with a vision of educating man to become successful in every area of life. YUL believes in the reality of a complete man made up of spirit, soul and body. Hence YUL seeks to provide solutions in those areas of life that are lacking in the ordinary educational system such as Purpose, Leadership, art of marrying et cetera. Yul has all the requisite facilities and resources to turn her vision into concrete reality. The Yasha University of Life is a brainchild of Bro. Innocent Nwawuike. Our Motto is transforming lives. </p>
                            {{--
                            <ul class="list-steps">
                                <li>Improve personal and professional relationships</li>
                                <li>Get on the path to financial independence</li>
                                <li>Work less while making more money</li>
                                <li>Stop struggling and start enjoying life</li>
                                <li>Have more time to enjoy life and family</li>
                                <li>Find the love of your life (if you haven’t already)</li>
                            </ul>
                            --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="progres">
                            <div class="flat-progress ">
                                <div class="name">Introspection & Self-Awareness</div>
                                <div class="perc show">99%</div>
                                <div class="progress-bar" data-percent="99" data-waypoint-active="yes">
                                    <div class="progress-animate" data-duration="1200"></div>
                                </div>
                            </div>

                            <div class="flat-progress ">
                                <div class="name">Confidence</div>
                                <div class="perc show">99%</div>
                                <div class="progress-bar" data-percent="99" data-waypoint-active="yes">
                                    <div class="progress-animate" data-duration="1200"></div>
                                </div>
                            </div>
                            <div class="flat-progress ">
                                <div class="name">The Ability to Teach The Gospel </div>
                                <div class="perc show">99%</div>
                                <div class="progress-bar" data-percent="99" data-waypoint-active="yes">
                                    <div class="progress-animate" data-duration="1200"></div>
                                </div>
                            </div>
                            <div class="flat-progress ">
                                <div class="name">Generosity</div>
                                <div class="perc show">99%</div>
                                <div class="progress-bar" data-percent="99" data-waypoint-active="yes">
                                    <div class="progress-animate" data-duration="1200"></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="divider h56"></div>
                
            </div>
        </section> 
        

        <!-- Bottom -->
        <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-6 bottom-reponsive">
                        <div class="copyright">
                           <p>© 2020 <a href="#">yul</a>. All rights reserved.</p>                   
                        </div>                 
                    </div> 
                    <div class="col-md-3 col-sm-6 bottom-reponsive">
                        <ul class="link-bottom">
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>                  
            </div><!-- /.container -->
        </div><!-- bottom -->

         <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>  
    

    </div>
    
    <!-- Javascript -->
    @include('includes.main-scripts')

</body>
</html>
