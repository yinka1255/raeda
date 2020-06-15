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
                                  <h2>{{$loggedInUser->name}}</h2>
                              </div>
                              <div class="breadcrumbs">
                                  <ul>
                                      <li><a href="{{url('/')}}">Home</a></li>
                                      <li>Profile</li>
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
                  <h4>Programs you have registered for</h4>
                  @php ($f1 = 0)
                  @php ($f2 = 0)
                  @if(count($my_programs) < 1)
                  <p style="color: red;">You have not registered for any program</p>
                  @endif
                @foreach($my_programs as $key=>$program)
                    @if($key == 0 && $program->id == 1) 
                    <div class="col-md-6" style="margin-top: 20px;">
                        <h6>Program status: <span class="price">Paid</span></h6>
                        <p style="margin-top: 0px;"><b>Tuition: </b>N{{number_format($program->category_student_price)}}</p>
                        <p><b>Duration: </b>{{$program->category_duration}}</p>
                        <p><b>Method of delivery: </b>{{$program->category_method_of_delivery}}</p>
                        <p><b>Days of lecture: </b>{{$program->category_days_of_lecture}}</p>
                        <p style="margin-bottom: 80px;"><b>Sessions: </b>{!! $program->category_sessions !!}</p>
                    
                    
                    </div>
                    @endif
                    <div class="col-md-6">
                        <div class="wrap-toggle flat-pl31">
                        @if($key == 0 && $program->id == 1) 
                            <h6 class="title-living">{{$program->name}} ({{$program->category_name}})</h6>
                            @endif
                            @if($program->id == 1)
                            @if($program->category_id != 3 &&  $program->category_id != 6)
                            <div class="flat-accordion">
                                <ol style="list-style-type: disc !important;">
                                    <li style="height: 35px;">{{$program->course_name}} 
                                        
                                        <span class="price">Paid</span>
                                    </li>
                                </ol>
                            </div>
                            @else
                            <div class="flat-accordion">
                                <ol style="list-style-type: disc !important;">
                                    @foreach($flexi_reg_courses1 as $flexi_reg_course1)
                                    @if(count($flexi_reg_courses1) > $f1)
                                    @php ($f1 = $f1 + 1)
                                    <li style="height: 35px;">{{$flexi_reg_course1->name}} 
                                        
                                        <span class="price">Paid</span>
                                    </li>
                                    @endif
                                    @endforeach
                                </ol>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div> 
                    @endforeach                         
                </div>
              
                <div class="row" style="margin-top: 40px;">
                @foreach($my_programs as $key=>$program)
                    @if($f2 == 0 && $program->id == 2) 
                    <div class="col-md-6" >
                        <h6>Program status: <span class="price">Paid</span></h6>
                        <p style="margin-top: 30px;"><b>Tuition: </b>N{{number_format($program->category_student_price)}}</p>
                        <p><b>Duration: </b>{{$program->category_duration}}</p>
                        <p><b>Method of delivery: </b>{{$program->category_method_of_delivery}}</p>
                        <p><b>Days of lecture: </b>{{$program->category_days_of_lecture}}</p>
                        <p style="margin-bottom: 80px;"><b>Sessions: </b>{{$program->category_sessions}}</p>
                    
                    
                    </div>
                    @endif
                    @if($f2 == 0 && $program->id == 2) 
                    <div class="col-md-6">
                        <div class="wrap-toggle flat-pl31">
                       
                            <h6 class="title-living">{{$program->name}} ({{$program->category_name}})</h6>
                            @endif
                            @if($program->id == 2) 
                            @if($program->category_id != 3 &&  $program->category_id != 6)
                            <div class="flat-accordion">
                                <ol style="list-style-type: disc !important;">
                                    <li style="height: 35px;">{{$program->course_name}} 
                                        
                                        <span class="price">Paid</span>
                                    </li>
                                </ol>
                                
                            </div>
                            @else
                            <div class="flat-accordion">
                                <ol style="list-style-type: disc !important;">
                                    @foreach($flexi_reg_courses2 as $flexi_reg_course2)
                                    @if(count($flexi_reg_courses2) > $f2)
                                    @php ($f2 = $f2 + 1)
                                    <li style="height: 35px;">{{$flexi_reg_course2->name}} 
                                        
                                        <span class="price">Paid</span>
                                    </li>
                                    @endif
                                    @endforeach
                                </ol>
                            </div>
                            @endif
                            
                        </div>
                    </div> 
                    @endif
                    @endforeach                         
                </div>
                
                <div class="divider h53"></div>
        </section>
        <section class="flat-row v19 home1">
          <div class="container">
          <h4>Courses you should registered for</h4>
            <div class="row">
              <div class="col-md-12">
                <div class="wrap-iconbox">
                  @foreach($programs as $program) 
                  @if($my_programs_count == 0)
                      
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
                                <a href="{{url('register/'.$program->category_id)}}" class="flat-button bg-gray box-shaw-hover">Register</a>
                            </div>
                        </div>
                      @endif
                    
                    @if($my_programs_count == 1)
                      @if($program->id == 2)
                        <div class="iconbox style2 text-left">
                            <div class="box-header">
                                <div class="box-icon">
                                    <i class="icon_globe"></i>
                                </div>
                            </div>
                            <div class="box-content">
                            <div class="box-title">{{$program->name}}</div>   
                                    {{--<div class="box-title">{{$program->category_name}}</div>    --}}
                                    <p><b>{{$program->category_name}}</b><br/>{{$program->category_method_of_delivery}} <br/> 
                                {{$program->category_duration}} <br/> {{$program->category_days_of_lecture}}
                                </p> 
                            </div>
                            <div class="readmore">
                                <a href="{{url('register/'.$program->category_id)}}" class="flat-button bg-gray box-shaw-hover">Register</a>
                            </div>
                        </div>
                      @endif
                    @endif
                  @endforeach
                    
                </div>
              </div>
            </div>
            <div class="divider h80">
                
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
    
    <script src="https://js.paystack.co/v1/inline.js"></script>
<form>
  <script>
    function payWithPaystack(amount){
      var d = new Date();
      var n = d.getTime();
    var handler = PaystackPop.setup({
      key: "pk_live_909a56bc8530faad43bb9a15331bd33555f301b1",
      email: document.getElementById('email').value,
      amount: amount * 100,
      ref: n,
      currency: "NGN",
      metadata: {
        custom_fields: [
        { display_name: "Full Names", variable_name: "name", value: document.getElementById('name').value },
        { display_name: "Email Address", variable_name: "email_address", value: document.getElementById('email').value },
        
        ]
      },
      callback: function(response){
        alert('Payment was success. transaction ref is ' + response.reference);
        //$("#amount").val(amount);
        document.getElementById("paymentForm").submit();
        
      },
      onClose: function(){
        alert('Transaction Cancelled');
        
      }
    });
    handler.openIframe();
    }
  </script>
</form>
</body>
</html>
