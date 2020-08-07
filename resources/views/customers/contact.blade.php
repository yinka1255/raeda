<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Andora | Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('includes.main-css')

</head>

<body>
    <!-- SVG Preloader Starts -->
    <div id="preloader">
        <div id="preloader-content">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="150px" viewBox="100 100 400 400" xml:space="preserve">
                <filter id="dropshadow" height="130%">
                <feGaussianBlur in="SourceAlpha" stdDeviation="5"/>
                <feOffset dx="0" dy="0" result="offsetblur"/>
                <feFlood flood-color="red"/>
                <feComposite in2="offsetblur" operator="in"/>
                <feMerge>
                <feMergeNode/>
                <feMergeNode in="SourceGraphic"/>
                </feMerge>
                </filter>          
                <path class="path" fill="#000000" d="M446.089,261.45c6.135-41.001-25.084-63.033-67.769-77.735l13.844-55.532l-33.801-8.424l-13.48,54.068
                    c-8.896-2.217-18.015-4.304-27.091-6.371l13.568-54.429l-33.776-8.424l-13.861,55.521c-7.354-1.676-14.575-3.328-21.587-5.073
                    l0.034-0.171l-46.617-11.64l-8.993,36.102c0,0,25.08,5.746,24.549,6.105c13.689,3.42,16.159,12.478,15.75,19.658L208.93,357.23
                    c-1.675,4.158-5.925,10.401-15.494,8.031c0.338,0.485-24.579-6.134-24.579-6.134l-9.631,40.468l36.843,9.188
                    c8.178,2.051,16.209,4.19,24.098,6.217l-13.978,56.17l33.764,8.424l13.852-55.571c9.235,2.499,18.186,4.813,26.948,6.995
                    l-13.802,55.309l33.801,8.424l13.994-56.061c57.648,10.902,100.998,6.502,119.237-45.627c14.705-41.979-0.731-66.193-31.06-81.984
                    C425.008,305.984,441.655,291.455,446.089,261.45z M368.859,369.754c-10.455,41.983-81.128,19.285-104.052,13.589l18.562-74.404
                    C306.28,314.65,379.774,325.975,368.859,369.754z M379.302,260.846c-9.527,38.187-68.358,18.781-87.442,14.023l16.828-67.489
                    C327.767,212.14,389.234,221.02,379.302,260.846z"/>       
            </svg>
        </div>
    </div>
    <!-- SVG Preloader Ends -->
	<!-- Live Style Switcher Starts - demo only -->
    <div id="switcher" class="">
        <div class="content-switcher">
            <h4>STYLE SWITCHER</h4>
            <ul>
                <li>
                    <a id="orange-css" href="#" title="orange" class="color"><img src="{{asset('public/mantra/images/styleswitcher/colors/orange.png')}}" alt="" width="30" height="30" /></a>
                </li>
                <li>
                    <a id="green-css" href="#" title="green" class="color"><img src="{{asset('public/mantra/images/styleswitcher/colors/green.png')}}" alt="" width="30" height="30" /></a>
                </li>
                <li>
                    <a id="blue-css" href="#" title="blue" class="color"><img src="{{asset('public/mantra/images/styleswitcher/colors/blue.png')}}" alt="" width="30" height="30" /></a>
                </li>
            </ul>

            <p>BODY SKIN</p>
			
			<label><input class="dark_switch" type="radio" name="color_style" id="is_dark" value="dark" checked="checked" /> Dark</label>
            <label><input class="dark_switch" type="radio" name="color_style" id="is_light" value="light" /> Light</label>

            <hr />

            <p>LAYOUT STYLE</p>
            <label><input class="boxed_switch" type="radio" name="layout_style" id="is_wide" value="wide" checked="checked" /> Wide</label>
            <label><input class="boxed_switch" type="radio" name="layout_style" id="is_boxed" value="boxed" /> Boxed</label>

            <hr />

            <a href="#" class="custom-button purchase">Purchase</a>
            <div id="hideSwitcher">&times;</div>

        </div>
    </div>
    <div id="showSwitcher" class="styleSecondColor"><i class="fa fa-cog fa-spin"></i></div>
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <!-- Header Starts -->
        @include('includes.main-header')
        <!-- Header Ends -->
		<!-- Banner Area Starts -->
		<section class="banner-area">
			<div class="banner-overlay">
				<div class="banner-text text-center">
					<div class="container">
						<!-- Section Title Starts -->
						<div class="row text-center">
							<div class="col-xs-12">
								<!-- Title Starts -->
								<h2 class="title-head">get <span>in touch</span></h2>
								<!-- Title Ends -->
								<hr>
								<!-- Breadcrumb Starts -->
								<ul class="breadcrumb">
									<li><a href="{{url('/')}}"> home</a></li>
									<li>contact</li>
								</ul>
								<!-- Breadcrumb Ends -->
							</div>
						</div>
						<!-- Section Title Ends -->
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Area Ends -->
		<!-- Section Services Starts -->
        <section class="contact">
			<div class="container">
				<div class="row">
				<div class="col-xs-12 col-md-8 contact-form">
						<h3 class="col-xs-12">feel free to drop us a message</h3>
                        <p class="col-xs-12">Need to speak to us? Do you have any queries or suggestions? Please contact us about all enquiries including membership and volunteer work using the form below.</p>
                        <!-- Contact Form Starts -->
                        <form class="form-contact" method="post" action="{{url('post_contact')}}">
												{{ csrf_field() }}
                            <!-- Input Field Starts -->
                            <div class="form-group col-md-12">
                                <input class="form-control" name="name" id="name" placeholder="NAME" type="text" required>
                            </div>
                            <!-- Input Field Ends -->
                            
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            <div class="form-group col-md-6">
                                <input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" required>
                            </div>
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            <div class="form-group col-md-6">
                                <input class="form-control" name="text" id="phone" placeholder="PHONE" type="text" required>
                            </div>
                            <!-- Input Field Ends -->
                            <!-- Input Field Starts -->
                            <div class="form-group col-xs-12">
                                <textarea class="form-control" id="message" name="message" placeholder="MESSAGE" required></textarea>
                            </div>
                            <!-- Input Field Ends -->
                            <!-- Submit Form Button Starts -->
                            <div class="form-group col-xs-12 col-sm-4">
                                <button class="btn btn-primary btn-contact" type="submit">send message</button>
                            </div>
                            <!-- Submit Form Button Ends -->
                            <!-- Form Submit Message Starts -->
                            <div class="col-xs-12 text-center output_message_holder d-none">
								<p class="output_message"></p>
                            </div>
                             <!-- Form Submit Message Ends -->
                        </form>
						<!-- Contact Form Ends -->
                    </div>
					<!-- Contact Widget Starts -->
                    <div class="col-xs-12 col-md-4">
                        <div class="widget">
                            <div class="contact-page-info">
								<!-- Contact Info Box Starts -->
                                <div class="contact-info-box">
                                    <i class="fa fa-home big-icon"></i>
                                    <div class="contact-info-box-content">
                                        <h4>Address</h4>
                                        <p>1019 Market Street San Francisco, CA 94103 USA</p>
                                    </div>
                                </div>
								<!-- Contact Info Box Ends -->
								<!-- Contact Info Box Starts -->
                                <div class="contact-info-box">
                                    <i class="fa fa-phone big-icon"></i>
                                    <div class="contact-info-box-content">
                                        <h4>Phone Numbers</h4>
                                        <p>+1 888-670-4887</p>
                                    </div>
                                </div>
								<!-- Contact Info Box Ends -->
								<!-- Contact Info Box Starts -->
                                <div class="contact-info-box">
                                    <i class="fa fa-envelope big-icon"></i>
                                    <div class="contact-info-box-content">
                                        <h4>Email Addresses</h4>

                                        <p>info@andora-mfg.com<br>contact@andora-mfg.com</p>
                                    </div>
                                </div>
								<!-- Contact Info Box Ends -->
								<!-- Social Media Icons Starts -->
                                <div class="contact-info-box">
                                    <i class="fa fa-share-alt big-icon"></i>
                                    <div class="contact-info-box-content">
                                        <h4>Social Profiles</h4>
                                        <div class="social-contact">
                                            <ul>
                                                <li class="facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                <li class="google-plus"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
								<!-- Social Media Icons Starts -->
                            </div>
                        </div>
                    </div>
					<!-- Contact Widget Ends -->
					
				</div>
			</div>
		</section>
		<!-- Section Services Ends -->
        <!-- Call To Action Section Starts -->
        <section class="call-action-all">
			<div class="call-action-all-overlay">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<!-- Call To Action Text Starts -->
							<div class="action-text">
								<h2>Get Started Today With Bitcoin</h2>
								<p class="lead">Open account for free and start trading Bitcoins!</p>
							</div>
							<!-- Call To Action Text Ends -->
							<!-- Call To Action Button Starts -->
							<p class="action-btn"><a class="btn btn-primary" href="javascript:void(0)"  data-toggle="modal" data-target="#meRegister">Register Now</a></p>
							<!-- Call To Action Button Ends -->
						</div>
					</div>
				</div>
			</div>
        </section>
        <!-- Call To Action Section Ends -->
        <!-- Footer Starts -->
        
        <!-- Footer Ends -->
	
        <!-- Template JS Files -->
        @include('includes.footer')
        @include('includes.login')
        @include('includes.register')
        <a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up"></a>
		<!-- Back To Top Ends  -->
		
       

    </div>
    <!-- Wrapper Ends -->
    @include('includes.main-scripts')
    <!-- Wrapper Ends -->
</body>

</html>