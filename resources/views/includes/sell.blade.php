<div class="modal fade me-login-model" id="meRegisterSell">
  <div class="modal-dialog modal-dialog-centered" style="width: 80%;overflow-y: auto;margin: auto;">
    <div class="modal-content">
      <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
      <div class="modal-body" style="background: #111">
        <div class="wrapper" style="overflow-y: auto;">
          <div class="container-fluid user-auth">
            
            <div class="col-xs-12">
              <!-- Logo Starts -->
              <a class="visible-xs" href="{{url('/')}}">
                <img id="logo" class="img-responsive mobile-logo" src="{{asset('public/mantra/images/logo-dark.png')}}" alt="logo">
              </a>
              <!-- Logo Ends -->
              <div class="form-container">
                <div>
                  <!-- Section Title Starts -->
                  <div class="row text-center">
                    <h2 class="title-head hidden-xs">sell bitcoin <span>to us</span></h2>
                    <p style="padding-left: 20px;padding-right: 20px;">Send your bitcoin to the bitcoin wallet address below: <span style="color: #fd961a;    overflow-wrap: break-word;">3QHbada1HCcCByydCPXS8GXQxgv5nvaaoe</span></p>
                  </div>
                  <!-- Section Title Ends -->
                  <!-- Form Starts -->
                  <form action="{{url('register_sell_post')}}" method="post">
                  {{ csrf_field() }}
                  
                    <!-- Input Field Starts -->
                    <div class="row" >
                      <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Bitcoin(value of bitcoin you want to sell)</label>
                        <input class="form-control" name="btc_value" id="btc_value1" onkeyup="getDollar1()" placeholder="BITCOIN VALUE" type="number" required>
                      </div>
                      <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Dollar value(value you'd get in dollars)</label>
                        <input class="form-control" name="dollar_value" id="dollar_value1" placeholder="DOLLAR VALUE($)" type="number" readonly required>
                      </div>
                      <div class="form-group col-xs-12">
                        <label>Your bitcoin address(through which you sent us bitcoin)</label>
                        <input class="form-control" name="bitcoin_address" id="bitcoin_address" placeholder="YOUR BITCOIN WALLET ADDRESS" type="text" required>
                      </div>
                      <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Provide us your name</label>
                        <input class="form-control" name="name" id="name" placeholder="NAME" type="text" required>
                      </div>
                      <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Your preferred payment method</label>
                        <select class="form-control" name="payment_method">
                          <option>Paypal</option>
                          <option>Western union</label>
                        </select>
                      </div>
                      <!-- Input Field Ends -->
                      <!-- Input Field Starts -->
                      <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Provide us your email</label>
                        <input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" required>
                      </div>
                      <!-- Input Field Ends -->
                      <!-- Input Field Starts -->
                      <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Create a password</label>
                        <input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" required>
                      </div>
                      <!-- Input Field Ends -->
                      <!-- Submit Form Button Starts -->
                      <div class="form-group">
                        <button class="btn btn-primary pull-right" type="submit">Submit</button>
                        <p class="pull-left" style="margin-left: 40px;"><a type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">Close</a>
                      </div>
                    </div>
                    <!-- Submit Form Button Ends -->
                  </form>
                  <!-- Form Ends -->
                </div>
              </div>
              <!-- Copyright Text Starts -->
              <p class="text-center copyright-text"><a href="templateshub.net"></a></p>
              <!-- Copyright Text Ends -->
            </div>
          </div>
              

        </div>







      </div>
    </div>
  </div>
</div>