<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en-US"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en-US"> <![endif]-->
<!--[if gte IE 8]><html class="ie ie8" lang="en-US"> <![endif]-->

<html dir="ltr" lang="en-US">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Google Fonts
        ============================================= -->
        <link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <!-- Stylesheets
        ============================================= -->
        @include('includes.main-css')

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <title>RaedaXpress | Best Logistics Company In Nigeria</title>
    </head>

    <body onload="hideTotal()">
        <div id="preloader">
            <div id="status">
                <img src="{{asset('public/main/img/logo.png')}}" alt="" />
            </div>
        </div>

        <!-- MAIN WRAPPER
        ============================================= -->
        <div id="main-wrapper" class="clearfix">

            <!-- HEADER
            ============================================= -->
            @include('includes.main-header')
            <!-- HEADER END -->

            <!-- SLIDER START
            ============================================= -->
            <section id="slider" class="home-slider clearfix">
                <div class="slider-wrapper">
                    <div class="flexslider clearfix">
                        <ul class="slides">
                            <li class="slide-item clearfix" style="background-image: url({{asset('public/main/img/slider/hero-slider1.jpg')}});">   
                                <div class="flex-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="caption-wrap">
                                                <div class="caption wow fadeInUp" data-wow-delay="0.5s">
                                                    <h1>We are always on the move</h1>
                                                </div> 
                                                <div class="caption wow fadeIn" data-wow-delay="1s">
                                                    <p>You've got something to deliver? Let us do it for you. We are fast efficient and reliable. You'd get the best price here!</p>
                                                </div>
                                                <div class="caption wow fadeInUp" data-wow-delay="1.5s">
                                                    <a href="#" class="button-normal">Get started</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            
                        </ul>
                    </div>
                </div>
            </section>
            <!-- SLIDER END -->

            <!-- CONTENT START
            ============================================= -->
            <section id="content" class="clearfix">

                <!-- SERVICES START
                ============================================= -->
                <div class="services" style="background-color: #fff !important;margin-top: 40px;">
                    <div class="section-title text-center wow fadeIn"  style="margin-top: 40px;">
                        <h2>Our Services</h2>
                    </div>

                    <div class="services-wrap-carousel">
                        <div class="item">
                            <div class="services-content">
                                <div class="services-image" style="background-image: url({{asset('public/main/img/content/services-item-1.webp')}});"></div>
                                <div class="services-text">
                                    <h3 class="title">Bus Network</h3>
                                    <p>As a leader in Nationwide dispatch service, RaedaXpress excels in providing tailored transportation</p>
                                    <a href="#" class="button-normal with-icon">
                                        Read More
                                        <i class="icon icon-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="services-content">
                                <div class="services-image" style="background-image: url({{asset('public/main/img/content/service-item-2.jpg')}});"></div>
                                <div class="services-text">
                                    <h3 class="title">Bike Network</h3>
                                    <p>As a leader in Nationwide dispatch service, RaedaXpress excels in providing tailored transportation</p>
                                    <a href="#" class="button-normal with-icon">
                                        Read More
                                        <i class="icon icon-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="services-content">
                                <div class="services-image" style="background-image: url({{asset('public/main/img/content/services-item-3.jpg')}});"></div>
                                <div class="services-text">
                                    <h3 class="title">Car Network</h3>
                                    <p>As a leader in Nationwide dispatch service, RaedaXpress excels in providing tailored transportation</p>
                                    <a href="#" class="button-normal with-icon">
                                        Read More
                                        <i class="icon icon-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>


                    </div>        
                </div>
                <!-- SERVICES END -->

                <!-- FEATURES START
                ============================================= -->
                <div class="features wrapper" style="margin-top: -80px;">
                    <div class="container">
                        <div class="row">
                            <div class="section-title text-center wow fadeIn">
                                <h2>Why Choose Us</h2>
                            </div>
                            
                            <div class="features-wrap row">
                                <div class="col-md-4">
                                    <div class="features-item wow fadeInUp" data-wow-delay="0.5s">
                                        <div class="icon-wrap">
                                            <i class="icon icon-delivery"></i>
                                        </div>
                                        <div class="text">
                                            <h4>Ground Shipping</h4>
                                            <p>We provide excellent pickup and delivery service nationwide at the cheapes rate.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="features-item wow fadeInUp" data-wow-delay="0.8s">
                                        <div class="icon-wrap">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <div class="text">
                                            <h4>Security</h4>
                                            <p>Your items are secured with us and we put topmost priority on security.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="features-item wow fadeInUp" data-wow-delay="1.2s">
                                        <div class="icon-wrap">
                                            <i class="fa fa-support"></i>
                                        </div>
                                        <div class="text">
                                            <h4>Customer happyness</h4>
                                            <p>Our customer care personell are always ready to assist you with all information.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- FEATURES END -->

                <!-- SERVICES CALCULATOR START
                ============================================= 
                <div class="services-calculator bg-color">
                    <div class="container">
                        <div class="row">
                            <div class="services-calculator-wrap row">
                                <div class="intro-section col-md-6">
                                    <h3 class="title">Services Calculator</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <div class="image">
                                        <img src="{{asset('public/main/img/content/service-calculator-img.png')}}" alt="" />
                                    </div>
                                </div>

                                <div class="form-section col-md-6">
                                    <form id="calculationform" onsubmit="return false;">
                                        <p class="intro">* Please fill all inquiry to get your total price</p>
                                        <fieldset>
                                            <label>Services</label>
                                            <select id="services_type" name='services_type' onchange="calculateTotal()">
                                                <option value="None">Select Services</option>
                                                <option value="Overland">Overland Network</option>
                                                <option value="Ocean">Ocean Network</option>
                                                <option value="Air">Air Freight</option>
                                                <option value="Cargo">Cargo</option>
                                                <option value="Storage">Storage</option>
                                                <option value="Warehousing">Warehousing</option>
                                            </select>

                                            <label>Type of Goods</label>
                                            <select id="goods_type" name='goods_type' onchange="calculateTotal()">
                                                <option value="None">Type of Goods</option>
                                                <option value="General">General Merchandise</option>
                                                <option value="Fragile">Fragile Goods</option>
                                                <option value="Fine">Fine Arts</option>
                                                <option value="Hazardous">Hazardous Goods</option>
                                            </select>

                                            <p class="extra-services">
                                                <label>Extra Services</label>
                                                <span>
                                                    <label for='expressdelivery'>Express Delivery</label>
                                                    <input type="checkbox" id="expressdelivery" name='expressdelivery' onclick="calculateTotal()" />
                                                </span>
                                                <span>
                                                    <label for='insurance'>Add Insurance</label>
                                                    <input type="checkbox" id="insurance" name='insurance' onclick="calculateTotal()" />
                                                </span>
                                                <span>
                                                    <label for='packaging'>Packaging</label>
                                                    <input type="checkbox" id="packaging" name='packaging' onclick="calculateTotal()" />
                                                </span>
                                            </p>

                                            <p class="fragile clearfix">
                                                <label>Fragile</label>
                                                <span>
                                                    <label for='fragileyes'>Yes</label>
                                                    <input type="checkbox" id="fragileyes" name='fragileyes' onclick="calculateTotal()" />
                                                </span>
                                            </p>
                                            
                                            <div id="totalPrice">
                                                Total Price = $
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 SERVICE CALCULATOR END -->

                <!-- TESTIMONIAL START
                ============================================= -->
                <div class="testimonial wrapper with-bg">
                    <div class="container">
                        <div class="row">
                            <div class="section-title text-center wow fadeIn">
                                <h2>Testimonials</h2>
                            </div>
                            
                            <div class="owl-carousel wow fadeIn" data-wow-delay="0.5s">
                                <div class="testimonial-item">
                                    <p>We use RaedaXpress every day for our deliveries and they have never dissapointed us. We are so confident to refer you to them.</p>

                                    <div class="client-info">
                                        <img src="{{asset('public/main/img/content/user.png')}}" style="width: 70px;" alt="" />
                                        <div class="client-details">
                                            <h3>John Benson</h3>
                                            <p>CEO of Candy's Heaven</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="testimonial-item">
                                    <p>As far as pickup and delivery service is concerened, RaedaXpress is the very best n Nigeria as we speak. Thier services is second to none in the industry.</p>

                                    <div class="client-info">
                                        <img src="{{asset('public/main/img/content/user.png')}}" style="width: 70px;" alt="" />
                                        <div class="client-details">
                                            <h3>Carol Linda</h3>
                                            <p>Branch Manager of KLM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
                <!-- TESTIMONIAL END -->

                <!-- LATEST NEWS START
                ============================================= 
                <div class="latest-post wrapper bg-color">
                    <div class="container">
                        <div class="row">
                            <div class="section-title text-center wow fadeIn">
                                <h2>Latest News</h2>
                            </div>

                            <div class="post-wrap wow fadeIn" data-wow-delay="0.5s">
                                <div class="post-item">
                                    <div class="post-thumb">
                                        <a href="single-post.html">
                                            <img src="{{asset('public/main/img/content/latest-post-thumb-1.jpg')}}" alt="" />
                                            <div class="overlay"></div>
                                        </a>
                                    </div>

                                    <div class="post-content">
                                        <div class="date">
                                            <span>20</span>
                                            <span>May</span>
                                        </div>
                                        <div class="content-wrap">
                                            <h4>Transformtive Donation For Main Philanthropy</h4>
                                            <div class="meta">
                                                <span class="author"><i class="fa fa-user"></i> mochreza</span>
                                                <span class="views"><i class="fa fa-eye"></i> 95 Views</span>
                                                <span class="comments last"><i class="fa fa-comment"></i> 2 Comments</span>
                                            </div>
                                            <p class="excerpt">Etiamt vehicula elit.Vivauedaus rutrum mi ut aliquam In hac habitasse platore dictum will Integer sagittis neque in porta semes.</p>
                                            <a href="single-post.html" class="button-normal with-icon">
                                                Read More
                                                <i class="icon icon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="post-item">
                                    <div class="post-thumb">
                                        <a href="single-post.html">
                                            <img src="{{asset('public/main/img/content/latest-post-thumb-2.jpg')}}" alt="" />
                                            <div class="overlay"></div>
                                        </a>
                                    </div>

                                    <div class="post-content">
                                        <div class="date">
                                            <span>26</span>
                                            <span>May</span>
                                        </div>
                                        <div class="content-wrap">
                                            <h4>Corporate Meeting Turns Into a Photo Shooting</h4>
                                            <div class="meta">
                                                <span class="author"><i class="fa fa-user"></i> mochreza</span>
                                                <span class="views"><i class="fa fa-eye"></i> 95 Views</span>
                                                <span class="comments last"><i class="fa fa-comment"></i> 2 Comments</span>
                                            </div>
                                            <p class="excerpt">Etiamt vehicula elit.Vivauedaus rutrum mi ut aliquam In hac habitasse platore dictum will Integer sagittis neque in porta semes.</p>
                                            <a href="single-post.html" class="button-normal with-icon">
                                                Read More
                                                <i class="icon icon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="post-item">
                                    <div class="post-thumb">
                                        <a href="single-post.html">
                                            <img src="{{asset('public/main/img/content/latest-post-thumb-3.jpg')}}" alt="" />
                                            <div class="overlay"></div>
                                        </a>
                                    </div>

                                    <div class="post-content">
                                        <div class="date">
                                            <span>30</span>
                                            <span>May</span>
                                        </div>
                                        <div class="content-wrap">
                                            <h4>Statistics and Analysis The Key To Success</h4>
                                            <div class="meta">
                                                <span class="author"><i class="fa fa-user"></i> mochreza</span>
                                                <span class="views"><i class="fa fa-eye"></i> 95 Views</span>
                                                <span class="comments last"><i class="fa fa-comment"></i> 2 Comments</span>
                                            </div>
                                            <p class="excerpt">Etiamt vehicula elit.Vivauedaus rutrum mi ut aliquam In hac habitasse platore dictum will Integer sagittis neque in porta semes.</p>
                                            <a href="single-post.html" class="button-normal with-icon">
                                                Read More
                                                <i class="icon icon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 LATEST NEWS END -->

                <!-- COUNTER NUMBER START
                ============================================= -->
                <div class="counter-section wrapper">
                    <div class="container">
                        <div class="row">

                            <div class="counter-wrap row">
                                <div class="counter-item col-md-15 wow fadeInUp" data-wow-delay="0.2s">
                                    <h2 class="counter">1,273</h2>
                                    <div class="counter-details">
                                        <p class="heading">Delivered Packages</p>
                                        <p>The core values are the guiding principles that dictate behavior and action.</p>
                                    </div>
                                </div>

                                <div class="counter-item col-md-15 wow fadeInUp" data-wow-delay="0.4s">
                                    <h2 class="counter">473,754</h2>
                                    <div class="counter-details">
                                        <p class="heading">KM Per Year</p>
                                        <p>The core values are the guiding principles that dictate behavior and action.</p>
                                    </div>
                                </div>

                                <div class="counter-item col-md-15 wow fadeInUp" data-wow-delay="0.6s">
                                    <h2 class="counter">25</h2>
                                    <div class="counter-details">
                                        <p class="heading">Years of Experience</p>
                                        <p>The core values are the guiding principles that dictate behavior and action.</p>
                                    </div>
                                </div>

                                <div class="counter-item col-md-15 wow fadeInUp" data-wow-delay="0.8s">
                                    <h2 class="counter">719</h2>
                                    <div class="counter-details">
                                        <p class="heading">Happy Clients</p>
                                        <p>The core values are the guiding principles that dictate behavior and action.</p>
                                    </div>
                                </div>

                                <div class="counter-item col-md-15 wow fadeInUp" data-wow-delay="1s">
                                    <h2 class="counter">4,234</h2>
                                    <div class="counter-details">
                                        <p class="heading">Tons of Goods</p>
                                        <p>The core values are the guiding principles that dictate behavior and action.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COUNTER NUMBER END -->

            </section>
            <!-- CONTENT END -->
            
            <!-- FOOTER START
            ============================================= -->
            @include('includes.footer')
            <!-- FOOTER END -->

        </div>
        <!-- MAIN WRAPPER END -->

        <!-- Footer Scripts
        ============================================= -->
        <!-- External -->
        @include('includes.main-scripts')
    </body>
</html>