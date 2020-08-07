<div class="modal fade me-login-model" id="meLogin">
  <div class="modal-dialog modal-dialog-centered" style="width: 80%;overflow-y: hidden;margin: auto;">
    <div class="modal-content">
      <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
      <div class="modal-body">
        <div class="wrapper">
          <div class="container-fluid user-auth">
            <div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
              <!-- Logo Starts -->
              <a class="logo" href="index-2.html">
                <img id="logo-user" class="img-responsive" src="{{asset('public/mantra/images/logo-dark.png')}}" alt="logo">
              </a>
              <!-- Logo Ends -->
              <!-- Slider Starts -->
              <div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators Starts -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
                </ol>
                <!-- Indicators Ends -->
                <!-- Carousel Inner Starts -->
                <div class="carousel-inner">
                  <!-- Carousel Item Starts -->
                  <div class="item active item-1">
                    <div>
                      <blockquote>
                        <p>This is a realistic program for anyone looking for site to invest. Paid to me regularly, keep up good work!</p>
                        <footer><span>Lucy Smith</span>, England</footer>
                      </blockquote>
                    </div>
                  </div>
                  <!-- Carousel Item Ends -->
                  <!-- Carousel Item Starts -->
                  
                  <!-- Carousel Item Ends -->
                </div>
                <!-- Carousel Inner Ends -->
              </div>
              <!-- Slider Ends -->
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
              <!-- Logo Starts -->
              <a class="visible-xs" href="index-2.html">
                <img id="logo" class="img-responsive mobile-logo" src="{{asset('public/mantra/images/logo-dark.png')}}" alt="logo">
              </a>
              <!-- Logo Ends -->
              <div class="form-container">
                <div>
                  <!-- Section Title Starts -->
                  <div class="row text-center">
                    <h2 class="title-head hidden-xs">member <span>login</span></h2>
                    <p class="info-form">Send, receive and securely store your coins in your wallet</p>
                  </div>
                  <!-- Section Title Ends -->
                  <!-- Form Starts -->
                  <form action="{{url('authenticate')}}" method="post">
                  {{ csrf_field() }}
                    <!-- Input Field Starts -->
                    <div class="form-group">
                      <input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" required>
                    </div>
                    <!-- Input Field Ends -->
                    <!-- Input Field Starts -->
                    <div class="form-group">
                      <input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" required>
                    </div>
                    <!-- Input Field Ends -->
                    <!-- Submit Form Button Starts -->
                    <div class="form-group">
                      <button class="btn btn-primary" type="submit">login</button>
                      <p class="text-center">don't have an account ? <a href="javascript:void(0)" onclick="openRegister()">register now</a>
                    </div>
                    <!-- Submit Form Button Ends -->
                  </form>
                  <!-- Form Ends -->
                </div>
              </div>
              <!-- Copyright Text Starts -->
              <p class="text-center copyright-text"></p>
              <!-- Copyright Text Ends -->
            </div>
          </div>
              

        </div>








      </div>
    </div>
  </div>
</div>