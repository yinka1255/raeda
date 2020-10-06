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
            <section class="page-title wrapper clearfix" style="background-image: url({{asset('public/main/img/about-page-bg.jpg')}});">
                <div class="container">
                    <div class="row">
                        <div class="title-wrap wow fadeIn" data-wow-delay="1s">
                            <h1>Contact us</h1>
                            <div class="breadcrumbs">
                                <p>You Are Here : 
                                <span><a href="{{url('/')}}">Home</a></span>
                                <span class="arrow"><i class="icon icon-arrow-right"></i></span>
                                <span>Contact us</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- SLIDER END -->

            <!-- CONTENT START
            ============================================= -->
            <section id="content" class="clearfix">

            <div class="contact-page wrapper bg-color">
                    <div class="container">
                        <div class="row">
                            <div class="contact-wrap row">
                                <div class="contact-details col-md-4">
                                    <div class="address wow fadeInLeft" data-wow-delay="0.3s">
                                        <h4 class="title">Our Office Address</h4>
                                        <p>Boulevard des Capucines</p>
                                        <p>356, Coffee Street</p>
                                        <p>Paris, France</p>
                                        <p>Telephone : + 1 555 356 876</p>
                                        <p>Email : info@themesawesome.com</p>
                                    </div>
                                    <div class="hours wow fadeInLeft" data-wow-delay="0.6s">
                                        <h4 class="title">Our Office Hours</h4>
                                        <p>Monday : <span>08.00 - 16.00</span></p>
                                        <p>Tuesday : <span>08.00 - 16.00</span></p>
                                        <p>Wednesday : <span>08.00 - 16.00</span></p>
                                        <p>Thursday : <span>08.00 - 16.00</span></p>
                                        <p>Friday : <span>08.00 - 16.00</span></p>
                                        <p>Saturday : <span>08.00 - 16.00</span></p>
                                    </div>
                                </div>

                                <div class="contact-form col-md-8">
                                    <form method="post" class="row"> 
                                        <p class="name col-md-6">
                                            <label>Name</label>
                                            <input type="text" name="name">
                                        </p>
                                        <p class="email col-md-6">
                                            <label>Email</label>
                                            <input type="text" name="email">
                                        </p>
                                        <p class="telephone col-md-6">
                                            <label>Telephone</label>
                                            <input type="text" name="telephone">
                                        </p>
                                        <p class="subject col-md-6">
                                            <label>Subject</label>
                                            <input type="text" name="subject">
                                        </p>
                                        <p class="message col-md-12">
                                            <label>Message</label>
                                            <textarea name="message" cols="45" rows="7"></textarea>
                                        </p>

                                        <p class="col-md-12">
                                            <a href="#" class="button-normal">Send Message</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.211728581471!2d107.636263!3d-6.937619!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e86e2acbf353%3A0x68e3efb164a5f3de!2sJl.+Aries%2C+Batununggal%2C+Kota+Bandung%2C+Jawa+Barat+40275%2C+Indonesia!5e0!3m2!1sen!2sid!4v1449826718370" allowfullscreen></iframe>
                </div><!-- SERVICES END -->



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