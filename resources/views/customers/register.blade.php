<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>RaedaXpress - Responsive Admin & Dashboard Template | Themesdesign</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        @include('customers.includes.head')
    </head>

    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="home-btn d-none d-sm-block">
            </div>
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
                        </div>
                        <h5 class="font-18 text-center">Become a member of RaedaXpress.</h5>
    
                        <form class="form-horizontal m-t-30"  method="POST" action="{{url('save_customer')}}">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-12">
                                        <label>First name</label>
                                    <input class="form-control" name="first_name" required placeholder="John">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Last name</label>
                                    <input class="form-control" name="last_name" required placeholder="Doe">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Phone</label>
                                    <input class="form-control" name="phone" required placeholder="08012345678">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Email</label>
                                    <input class="form-control" name="email" type="email" required placeholder="john.doe@mail.com">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                </div>
                            </div>
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>
    
                            <div class="form-group row m-t-30 m-b-0">
                                
                                <div class="col-sm-12 text-right">
                                    <a href="{{url('login')}}" class="text-muted">Already a member? Login here</a>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->
        @include('customers.includes.script')
    </body>

</html>