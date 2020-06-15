<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Yasha university of life | Register
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
        .price1{
            /*background: green;*/
            color: #a94442;
            padding: 0px 1px;
            border-radius: 4px;
            float: right;
            min-width: 50px;
            font-size: 12px;
            margin-left: 20px;
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
                                  <h2>Register</h2>
                              </div>
                              <div class="breadcrumbs">
                                  <ul>
                                      <li><a href="{{url('/')}}">Home</a></li>
                                      <li>Register</li>
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
                    <div class="col-md-6" style="margin-top: 50px;">
                        <h3>Program Info</h3>
                        <p style="margin-top: 30px;"><b>Tuition: </b>Pay per course {{--N{{number_format($total_fee)}}--}}</p>
                        <p><b>Duration: </b>{{$program->category_duration}}</p>
                        <p><b>Method of delivery: </b>{{$program->category_method_of_delivery}}</p>
                        <p><b>Days of lecture: </b>{{$program->category_days_of_lecture}}</p>
                        <p><b>Sessions: </b>{!! $program->category_sessions !!}</p>
                    
                    
                    </div>
                    <div class="col-md-6">
                        <div class="wrap-toggle flat-pl31">
                            <h3 class="title-living">{{$program->name}} ({{$program->category_name}})</h3>
                            <div class="flat-accordion">
                                <ol style="list-style-type: decimal !important;">
                                    @foreach($courses as $course)
                                    <li style="height: 35px;">{{$course->name}} 
                                        @if($course->price == 0)
                                        <span class="price">Free</span>
                                        @else
                                        <span class="price">Paid {{--N{{number_format($course->price)}}--}}</span>
                                        @endif
                                    </li>
                                    @endforeach
                                </ol>
                                
                            </div>
                        </div>
                    </div>                          
                </div>
                    
                <div class="divider h53"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-contact">
                            <h2>Register for this program</h2>
                        </div>
                    </div>
                    <form  method="post" id="paymentForm" action="{{url('register')}}">
                    {{ csrf_field() }}
                            <input type="hidden" name="category_id" value="{{$program->category_id}}" />
                            <input type="hidden" name="program_id" value="{{$program->id}}" />
                            <input type="hidden" name="amount" id="amount" />
                            <div class="col-md-6">
                                <p class="contact-name">Name                                
                                    <input type="text" placeholder="Name" size="30" @if($loggedInUser != null) value="{{$loggedInUser->name}}" @endif  name="name" id="name" required>
                                </p>
                                <p class="contact-form-email">Email    
                                    <input type="email" placeholder="Email" size="30" @if($loggedInUser != null) value="{{$loggedInUser->email}}" @endif  name="email" id="email" required>
                                </p>  
                                <p class="contact-form-url">Phone         
                                    <input type="text" placeholder="Phone" size="30" @if($loggedInUser != null) value="{{$loggedInUser->phone}}" @endif  name="phone" id="phone" required>
                                </p>
                                @if($loggedInUser == null) 
                                <p class="contact-form-url">Password 
                                    <input type="password" placeholder="Password" size="30"  name="password" id="password" required>
                                </p>
                                @else
                                <p class="contact-form-url">Password 
                                    <input type="hidden" placeholder="Password" size="30" value="password"  name="password" id="password" required>
                                </p> 
                                @endif

                            </div>
                            <div class="col-md-6">
                                <p class="contact-form-url">Gender        
                                    <select  name="sex" required>
                                    @if($loggedInUser != null) 
                                        <option>{{$loggedInUser->sex}}</option>
                                    @else
                                        <option>Male</option>
                                        <option>Female</option>
                                    @endif
                                    </select>
                                </p> 
                                <p class="contact-form-url">Marital status          
                                    <select  name="marital_status" required>
                                    @if($loggedInUser != null) 
                                        <option >{{$loggedInUser->marital_status}}</option>
                                    @else
                                        <option>Single</option>
                                        <option>Married</option>
                                    @endif
                                    </select>
                                </p> 
                                <p class="contact-form-url">Country          
                                    <select  name="country" required>
                                    @if($loggedInUser != null) 
                                        <option >{{$loggedInUser->country}}</option>
                                    @else
                                        <option>Nigeria</option>
                                        <option>South africa</option>
                                        <option>Usa</option>
                                        @endif
                                    </select>
                                </p> 
                            </div>
                            <div class="col-md-12">
                                <p class="contact-form-url">Courses   
                                    <div class="row">
                                        @foreach($courses as $key=>$course)
                                        <div class="col-md-4">       
                                            <input type="checkbox" id="{{$key + 1}}" name="{{$course->id}}" @if($course->id == 19 || $course->id == 41) checked onclick="return false;" @endif onchange='addPrice(this, "{{$course->price}}")'   />
                                            <label for="{{$key + 1}}">{{$course->name}}
                                                @if($course->price == 0)
                                                <span class="price1">(Free)</span>
                                                @else
                                                <span class="price1">(Paid {{--N{{number_format($course->price)}}--}})</span>
                                                @endif </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </p> 
                            </div>
                            <div class="divider h10"></div>
                            <div class="col-md-12" style="margin-top: 20px;">
                                <div class="btn-contact">
                                    <p class="form-contact">                 
                                        <button class="flat-button font-poppins" type="button" onclick='payWithPaystack()'>Register now</button>
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
    
    <script src="https://js.paystack.co/v1/inline.js"></script>
<form>
  <script>
      var tAmount = {{$program->category_registration_fee}};
    function addPrice(checkbox, price){
        if(checkbox.checked == true && price != 0){
            tAmount = parseFloat(tAmount) + parseFloat(price);
        }
        if(checkbox.checked == false && price != 0){
            tAmount =  parseFloat(tAmount) -  parseFloat(price);
        }
        console.log(tAmount);
    }

    function payWithPaystack(){
        if(document.getElementById('name').value == ""){
            alert("Sorry! Kindly provide a name.");
          return;
        }else if(document.getElementById('phone').value == ""){
            alert("Sorry! Kindly provide a phone no.");
          return;
        }
        else if(document.getElementById('password').value == ""){
            alert("Sorry! Kindly input password");
          return;
        }else if(document.getElementById('email').value == ""){
            alert("Sorry! Kindly provide an email.");
          return;
        }
        else if(document.getElementById(6).checked != true && document.getElementById(7).checked != true) {
            if(document.getElementById(8) !== null){
                if(document.getElementById(8).checked != true){
                    alert("Sorry! You must select atleaset one paid course.");
                    return;
                }
            }else{
                alert("Sorry! You must select atleaset one paid course.");
                    return;
            }
        }
      var d = new Date();
      var n = d.getTime();
    var handler = PaystackPop.setup({
      key: "pk_live_909a56bc8530faad43bb9a15331bd33555f301b1",
      email: document.getElementById('email').value,
      amount: tAmount * 100,
      ref: n,
      currency: "NGN",
      metadata: {
        custom_fields: [
        { display_name: "Full Names", variable_name: "name", value: document.getElementById('name').value },
        { display_name: "Email Address", variable_name: "email_address", value: document.getElementById('email').value },
        
        ]
      },
      callback: function(response){
        alert('Payment was successful. Transaction ref is ' + response.reference);
        $("#amount").val(tAmount);
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
