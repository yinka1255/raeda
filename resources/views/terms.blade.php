<!DOCTYPE html>
<!-- 
Template Name: Trade Coin - Digital Exchange HTML Template 
Version: 1.0.0
Author: Kamleshyadav
Website: 
Purchase: 
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AirTnd | About</title>
    <meta name="description" content="Online Airtime Recharge In Nigeria. Extremely fast airtime recharge. Pay with your debit card. Prefund your wallet">
    <meta name="keywords" content="Online Airtime Recharge In Nigeria">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('includes.main-css')
    
</head>
<body>
<div class="me-main-wraper">
    <!-- top header -->
    <div class="me-top-header">
        <div class="container">
            <div class="me-top-head">
                <div class="me-top-header-left">
                    <ul>
                        <li>Follow Us :</li>
                        <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="me-top-header-right">
                    <ul>
                        <li>
                            <i class="far fa-envelope-open"></i> info@airtnd.com</li>
                        <li>
                            <i class="fas fa-mobile-alt"></i> +234 817 351 9531
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header -->
    <div class="me-main-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-7">
                    <div class="me-logo">
                        <a href="{{url('/')}}"><img src="{{asset('public/main/images/logo.png')}}" alt="logo" class="img-fluid"/></a>
                    </div>
                </div>
                <div class="col-sm-9 col-5">
                    <div class="me-menu">
                        
                         @include('includes.main-links')
                         @if(Auth::user() == null)
                        <a href="javascript:void(0)" class="me-login-menu" data-toggle="modal" data-target="#meLogin">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="me-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="me-breadcrumb-box">
                        <h1>Terms</h1>
                        <p><a href="{{url('/')}}">Home</a>Terms and conditions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about -->
    <div class="me-about me-about-single" style="margin-bottom: 180px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="me-about-img">
                        <img src="{{asset('public/main/images/service.jpg')}}" alt="about" class="img-fluid" />
                    </div>
                </div>   
                <div class="col-lg-6">
                    <div class="me-heading">
                        <h4>Terms and conditions</h4>
                        <h1>Our terms</h1>
                    </div>
                    <div class="me-about-text">
                        <p>AirTnd is part of the Creative Group, which was launched in 2020. Out of their entrepreneurship and hard work, the AirTnd brand was born. Since then, a lot has changed.</p>

                        <p>We’ve grown from a small group of enthusiasts that could fit in a single room to a team of 100+ people from all over the world, spread across our offices in Nigeria.</p>

                        <p>Ever since day one, we’ve been bound together by our passion to help people help others, regardless of distance. However much we grow, that’s the one thing that’s never going to change.</p>
                        <a href="{{url('about')}}" class="me-btn">Know more</a>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    
    
    
    @include('includes.footer')
    
    
@include('includes.main-scripts')

</body>
</html>