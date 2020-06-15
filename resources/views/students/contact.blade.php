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
            

        <section class="flat-row v23">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 section-reponsive">
                        <div class="iconbox style3">
                            <div class="box-header">
                                <div class="box-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                            <div class="box-content">  
                                <a href="#" rel="alternate">+234 704 183 9094, +234 706 530 1087</a> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 section-reponsive">
                        <div class="iconbox style3">
                            <div class="box-header">
                                <div class="box-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                            <div class="box-content pdl">  
                                <a href="#" rel="alternate">contact@yul.ng</a> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 section-reponsive">
                        <div class="iconbox style3">
                            <div class="box-header">
                                <div class="box-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                            </div>
                            <div class="box-content">  
                                <a href="#" rel="alternate">No 6 Chika Odimara Crescent MCC Uratta road, Owerri, Imo State, Nigeria.</a> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 section-reponsive">
                        <div class="iconbox style3">
                            <div class="box-header">
                                <div class="box-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                            <div class="box-content pdl2">  
                                <a href="#" rel="alternate">Open hours: 06.00 - 21.00 Mon - Fri</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider h51"></div>
                {{--
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-maps" data-images="images/map.png">
                            <div id="maps" data-images="images/map.png"></div>
                        </div>
                    </div>
                </div>
                --}}
                <div class="divider h53"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-contact">
                            <h2>Get in touch with us</h2>
                        </div>
                    </div>
                    <form id="contactform" class="contactform" method="post" action="{{url('post_contact')}}">
                            <div class="col-md-6">
                                <p class="contact-name">                                      
                                    <input type="text" placeholder="Name" size="30" value="" name="name" id="name" required>
                                </p>
                                <p class="contact-form-email">          
                                    <input type="email" placeholder="Email" size="30" value="" name="email" id="email" required>
                                </p>  
                                <p class="contact-form-url">          
                                    <input type="url" placeholder="Phone" size="30" value="" name="phone" id="url" required>
                                </p> 
                            </div>
                            <div class="col-md-6">
                                <p class="contact-form-comment">
                                    <textarea id="message-contact" class="comment-messages" tabindex="4" placeholder="Messages" name="message" required></textarea>
                                </p>  
                            </div>
                            <div class="divider h10"></div>
                            <div class="col-md-12">
                                <div class="btn-contact">
                                    <p class="form-contact">                 
                                        <button class="flat-button font-poppins">Send messages</button>
                                    </p>
                                </div>
                            </div>          
                    </form>
                </div>      
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
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeAiGODJM6KVeD_K6od2b5hMvq869_1cg&region=GB"></script>
    <script type="text/javascript" src="{{asset('public/main/javascript/gmap3.min.js')}}"></script>
    
</body>
</html>
