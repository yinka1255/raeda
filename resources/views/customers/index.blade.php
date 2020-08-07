<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Andora | We buy bitcoin at rates you can never get elsewhere.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Andora buys bitcoin at rates you can never get elsewhere on the internet. We also ensure your money is sent as early as possible usually less than 2hrs of initiating the transaction. You can either choose to get your payment through paypal or western union" />

    <!-- Favicon -->
    @include('includes.main-css')
<style>
  @media only screen and (max-width: 600px) {
    .carousel-inner{
      min-height: 460px;
    }
  }
    #dollar_value1{
    box-shadow: none !important;
    border: 1px solid #333 !important;
    padding: 0px 0px 4px 20px !important;
    height: 46px !important;
    color: #fff !important;
    background: #222 !important;
    font-size: 14px !important;
    border-radius: 0 !important;
    outline: 0 !important;
    transition: .1s !important;

    }
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

</style>
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
        <!-- Slider Starts -->
        <div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Indicators Starts -->
            <ol class="carousel-indicators visible-lg visible-md">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!-- Indicators Ends -->
            <!-- Carousel Inner Starts -->
            <div class="carousel-inner">
                <!-- Carousel Item Starts -->
                <div class="item active bg-parallax item-1">
                    <div class="slider-content" style="margin-top: -190px !important;">
                        <div class="container">
                            <div class="slider-text text-center" style="padding-top: 0 !important;margin-top:">
                            <div class="row">
                    <!-- Section Heading Starts -->
                    <div class="col-md-12">
                    <h3 class="slide-title"><span>Bitcoin</span> Exchange <br/>You can <span>Trust</span> </h3>
                        <p class="message text-center">We buy bitcoin at rates you can't get elsewhere</p>
                    </div>
                    <!-- Section Heading Ends -->
                    <!-- Bitcoin Calculator Form Starts -->
                    <div class="col-md-12 text-center">
                        <form class="bitcoin-calculator" id="">
                            <!-- Input #1 Starts -->
                            <input class="form-input" id="btc_value" onkeyup="getDollar()" name="btc_value" value="1">
                            <!-- Input #1 Ends -->
                            <div class="form-info"><i class="fa fa-bitcoin"></i></div>
                            <div class="form-equal">=</div>
                            <!-- Input/Result Starts -->
                            <input class="form-input form-input-result" id="dollar_value" name="dollar_value">
                            <div class="form-info"><i class="fa fa-dollar"></i></div>
                            <!-- Input/Result Ends -->
                            
                        </form>
                        <p class="info" style="margin-top: 20px;">
                          <a class="btn btn-primary" href="javascript:void(0)"  data-toggle="modal" data-target="#meRegisterSell" > Sell now</a>
                        </p>
                    </div>
                    <!-- Bitcoin Calculator Form Ends -->
                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
                
                <!-- Carousel Item Ends -->
            </div>
            <!-- Carousel Inner Ends -->
            <!-- Carousel Controlers Starts -->
            <a class="left carousel-control" href="index-2.html#main-slide" data-slide="prev">
				<span><i class="fa fa-angle-left"></i></span>
			</a>
            <a class="right carousel-control" href="index-2.html#main-slide" data-slide="next">
				<span><i class="fa fa-angle-right"></i></span>
			</a>
            <!-- Carousel Controlers Ends -->
        </div>
        <!-- Slider Ends -->
        <!-- Features Section Starts -->
        <section class="features">
            <div class="container">
                <div class="row features-row">
                    <!-- Feature Box Starts -->
                    <div class="feature-box col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="download-bitcoin" src="{{asset('public/mantra/images/icons/orange/download-bitcoin.png')}}" alt="download bitcoin">
						</span>
                        <div class="feature-box-content">
                            <h3>Click on sell</h3>
                            <p>Type in the value you want to sell above and click sell</p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
                    <div class="feature-box two col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="add-bitcoins" src="{{asset('public/mantra/images/icons/orange/add-bitcoins.png')}}" alt="add bitcoins">
						</span>
                        <div class="feature-box-content">
                            <h3>Transfer to us</h3>
                            <p>Send the value of bitcoin you want to sell to our bitcoin address</p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
                    <div class="feature-box three col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img id="buy-sell-bitcoins" src="{{asset('public/mantra/images/icons/orange/buy-sell-bitcoins.png')}}" alt="buy and sell bitcoins">
						</span>
                        <div class="feature-box-content">
                            <h3>Finish transaction</h3>
                            <p>Upload screenshot of transaction and your preferred payment method, then click submit</p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                </div>
            </div>
        </section>
        <!-- Features Section Ends -->
        <!-- About Section Starts -->
        <section class="about-us">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">About <span>Us</span></h2>
                    <div class="title-head-subtitle">
                        <p>a website solely for buying of bitcoins at rates you can never get elsewhere</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row about-content">
                    <!-- Image Starts -->
                    <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                        <img id="about-us" class="img-responsive img-about-us" src="{{asset('public/mantra/images/about-us.png')}}" alt="about us">
                    </div>
                    <!-- Image Ends -->
                    <!-- Content Starts -->
                    <div class="col-sm-12 col-md-7 col-lg-6">
                        <h3 class="title-about">WE ARE ANDORA</h3>
                        <p class="about-text">A place for everyone who wants to simply sell Bitcoins. Simply transfer bitcoin to our wallet address and upload screenshot of your tansaction. Then we pay you immediately your transaction is confirmed typically within 2 hrs, either through paypal or western union depending on which of the two you choose. Nothing extra. Join over 700,000 users from all over the world satisfied with our services.</p>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#menu1">Our Mission</a></li>
                            <li><a data-toggle="tab" href="#menu2">Our advantages</a></li>
                            <li><a data-toggle="tab" href="#menu3">Our guarantees</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <p>Our mission is to provide bitcoin traders the avenue to sell bitcoin at the best rate possible within the shortest period of time possible. We pay our customers either through paypal or western union depending on which you selected. </p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <p>Andora provides the best rate you can ever get on the internet. We also ensure your money is sent as early as possible usually less than 2hrs of initiating the transaction.</p>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <p>We are here because we are passionate about open, transparent markets and aim to be a major driving force in widespread adoption, we are the first and the best in cryptocurrency. </p>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{url('about')}}">Read More</a>
                    </div>
                    <!-- Content Ends -->
                </div>
                <!-- Section Content Ends -->
            </div>
        </section>
        <!-- About Section Ends -->
        <!-- Features and Video Section Starts -->
        <section class="image-block">
            <div class="container-fluid">
                <div class="row">
                    <!-- Features Starts -->
                    <div class="col-md-8 ts-padding img-block-left">
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="strong-security" src="{{asset('public/mantra/images/icons/orange/strong-security.png')}}" alt="strong security"/>
									</span>
                                    <h3 class="feature-title">Strong Security</h3>
                                    <p>Protection against DDoS attacks, <br>full data encryption</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="world-coverage" src="{{asset('public/mantra/images/icons/orange/world-coverage.png')}}" alt="world coverage"/>
									</span>
                                    <h3 class="feature-title">World Coverage</h3>
                                    <p>Providing services in 99% countries<br> around all the globe</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="payment-options" src="{{asset('public/mantra/images/icons/orange/payment-options.png')}}" alt="payment options"/>
									</span>
                                    <h3 class="feature-title">Payment Options</h3>
                                    <p>Popular methods: Paypal, Western union <br>Skrill</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="mobile-app" src="{{asset('public/mantra/images/icons/orange/mobile-app.png')}}" alt="mobile app"/>
									</span>
                                    <h3 class="feature-title">Mobile App</h3>
                                    <p>Trading via our Mobile App, Available<br> in Play Store & App Store</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="cost-efficiency" src="{{asset('public/mantra/images/icons/orange/cost-efficiency.png')}}" alt="cost efficiency"/>
									</span>
                                    <h3 class="feature-title">Cost efficiency</h3>
                                    <p>Higher rates for transaction above 5 bitcoin<br> 20% percentage on all referral.</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
							<div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img id="high-liquidity" src="{{asset('public/mantra/images/icons/orange/high-liquidity.png')}}" alt="high liquidity"/>
									</span>
                                    <h3 class="feature-title">High Liquidity</h3>
                                    <p>Fast access to high liquidity orderbook<br> for top currency pairs</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                    </div>
                    <!-- Features Ends -->
                    <!-- Video Starts -->
                    <div class="col-md-4 ts-padding bg-image-1">
                        <div>
                            <div class="text-center">
                                <a class="button-video mfp-youtube" href="https://www.youtube.com/watch?v=0gv7OC9L2s8"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Video Ends -->
                </div>
            </div>
        </section>
        <!-- Features and Video Section Ends -->
        
        <!-- Quote and Chart Section Starts -->
        <section class="image-block2">
            <div class="container-fluid">
                <div class="row">
                    <!-- Quote Starts -->
                    <div class="col-md-4 img-block-quote bg-image-2">
                        <blockquote>
                            <p>Bitcoin is one of the most important inventions in all of human history. For the first time ever, anyone can send or receive any amount of money with anyone else, anywhere on the planet, conveniently and without restriction. It’s the dawn of a better, more free world.</p>
                            <footer><img src="{{asset('public/mantra/images/ceo.jpg')}}" alt="ceo" /> <span>Marc Smith</span> - CEO</footer>
                        </blockquote>
                    </div>
                    <!-- Quote Ends -->
                    <!-- Chart Starts -->
                    <div class="col-md-8 bg-grey-chart">
                        <div class="chart-widget dark-chart chart-1">
                            <div>
                                <div class="btcwdgt-chart" data-bw-theme="dark"></div>
                            </div>
                        </div>
						<div class="chart-widget light-chart chart-2">
                            <div>
                                <div class="btcwdgt-chart" bw-theme="light"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Chart Ends -->
                </div>
            </div>
        </section>
        <!-- Quote and Chart Section Ends -->
        <!-- Blog Section Starts -->
        <section class="blog">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">Bitcoin <span>Resources</span></h2>
                    <div class="title-head-subtitle">
                        <p>Learn more about Bitcoin</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row latest-posts-content">
                    <!-- Article Starts -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a href="blog-post.html"><img class="img-responsive" src="{{asset('public/mantra/images/blog/blog-post-small-1.jpg')}}" alt="img"></a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="blog-post.html">How Cryptocurrency Begun and Its Impact To Financial Transactions</a>
                                </h4>
                                <div class="post-text">
                                    <p>Bitcoin, first released as open-source software in 2009, is the first decentralized cryptocurrency...</p>
                                </div>
                            </div>
                            <div class="post-date">
                                <span>01</span>
                                <span>JAN</span>
                            </div>
							<a href="https://en.wikipedia.org/wiki/Cryptocurrency" class="btn btn-primary">read more</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Starts -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a href="blog-post.html"><img class="img-responsive" src="{{asset('public/mantra/images/blog/blog-post-small-2.jpg')}}" alt="img"></a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="blog-post.html">Cryptocurrency - Who Are Involved With It? Words about members</a>
                                </h4>
                                <div class="post-text">
                                    <p>One of the most enduring mysteries of bitcoin is the identity of its founder, Satoshi Nakamoto...</p>
                                </div>
                            </div>
                            <div class="post-date">
                                <span>17</span>
                                <span>MAR</span>
                            </div>
							<a href="https://www.investopedia.com/tech/three-people-who-were-supposedly-bitcoin-founder-satoshi-nakamoto/" class="btn btn-primary">read more</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                    <!-- Article Ends -->
                    <!-- Article Start -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a href="blog-post.html"><img class="img-responsive" src="{{asset('public/mantra/images/blog/blog-post-small-3.jpg')}}" alt="img"></a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="blog-post.html">Risks & Rewards Of Investing In Bitcoin. Pros and Cons</a>
                                </h4>
                                <div class="post-text">
                                    <p>Despite bitcoin’s recent popularity, there are some risks when it comes to investing in cryptocurrency...</p>
                                </div>
                            </div>
                            <div class="post-date">
                                <span>25</span>
                                <span>FEB</span>
                            </div>
							<a href="https://www.forbes.com/sites/forbesfinancecouncil/2018/12/05/the-top-10-risks-of-bitcoin-investing-and-how-to-avoid-them/" class="btn btn-primary">read more</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                </div>
				<!-- Section Content Ends -->
            </div>
        </section>
        <!-- Blog Section Ends -->
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
        @include('includes.footer')
        @include('includes.login')
        @include('includes.register')
        @include('includes.sell')
        <!-- Footer Ends -->
		<!-- Back To Top Starts  -->
        <a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up"></a>
		<!-- Back To Top Ends  -->
		

    

    </div>
    @include('includes.main-scripts')
    
<script>
  $(document).ready(function(){
    $("#btc_value").keyup();
  })
  function openLogin(){
    $("#meRegister").modal('hide');
    $("#meRegisterSell").modal('hide');
    $("#meLogin").modal('show');
  }
  function openRegister(){
    $("#meLogin").modal('hide');
    $("#meRegister").modal('show');
  }

  function getDollar(){
    var btc = $("#btc_value").val();
    $("#btc_value1").val(btc);
    var dollar = btc * 12226.68;
    $("#dollar_value").val(dollar.toFixed(2));
    $("#dollar_value1").val(dollar.toFixed(2));
  }
  function getDollar1(){
    var btc = $("#btc_value1").val();
    $("#btc_value").val(btc);
    var dollar = btc * 12226.68;
    $("#dollar_value").val(dollar.toFixed(2));
    $("#dollar_value1").val(dollar.toFixed(2));
  }
</script>
    <!-- Wrapper Ends -->
</body>

</html>