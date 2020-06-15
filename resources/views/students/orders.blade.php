<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Yasha university of life | Orders page
</title>

   

    @include('includes.main-css')
    <style>
        .price{
            background: green;
            color: #fff;
            padding: 0px 6px;
            border-radius: 4px;
            float: right;
            min-width: 80px;
            text-align: center;
        }
    </style>
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
                                  <h2>Orders</h2>
                              </div>
                              <div class="breadcrumbs">
                                  <ul>
                                      <li><a href="{{url('/')}}">Home</a></li>
                                      <li>Your orders</li>
                                  </ul>
                              </div><!-- breadcrumb -->
                          </div><!-- page-title -->
                      </div>
                  </div>
              </div><!-- container -->
          </div><!-- wrap-slider -->
        </div><!-- /.site-wrapper -->
            

        <section class="flat-row v18 ">
            <div class="overlay-parallax"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section center ">
                            <h1 class="title">Your orders</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($sales as $book)
                    <div class="col-md-3 col-sm-6 section-reponsive">
                        <article class="post style3 clearfix">
                            <div class="entry">
                                <div class="featured-post">
                                    <a href="javascript:void(0)" onclick='download("{{$book->id}}")' ><img src="{{asset('public/main/images/product/'.$book->image)}}" alt="image"></a>
                                </div><!-- /.feature-post -->
                                <div class="entry-post">
                                    
                                    <h6 class="entry-title"><a href="javascript:void(0)"  onclick='download("{{$book->id}}")'>{{$book->name}}</a></h6>
                                    <div class="entry-number">
                                        <div class="entry-price">
                                            <span >N{{number_format($book->price)}}</span>
                                        </div>
                                        <ul class="">
                                            <li><a href="#" class="price" style="color: #fff;">Paid </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                        </article>
                    </div>
                    @endforeach
                </div>
                <div class="divider h50"></div>   
                <div class="row">
                   <div class="btn-sec-course">
                       
                   </div>
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

</body>
</html>
