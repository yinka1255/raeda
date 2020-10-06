<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>RaedaXpress - Admin</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    
    @include('admin.includes.head')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        
        <!-- Top Bar End -->
        @include('admin.includes.sidemenu')
        
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4 class="page-title">New user</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">User</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->
                    


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <form class="form-horizontal m-t-30"  method="POST" action="{{url('admin/add_user')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="col-12">
                                                <label>Role</label>
                                                <select class="form-control" name="role_id" required placeholder="">
                                                    @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-12">
                                                <label>State</label>
                                                <select class="form-control" name="state_id" required placeholder="">
                                                    @foreach($states as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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
                                                <input class="form-control" name="phone1" required placeholder="08012345678">
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
                                                    <label>Passsword</label>
                                                <input class="form-control" name="password"  required placeholder="********">
                                            </div>
                                        </div>
                
                                        <div class="form-group text-center m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Create</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END ROW -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- content -->
            <footer class="footer">
                © 2019 - 2020 RaedarXpress <span class="d-none d-sm-inline-block"><a href="https://imperial.com.ng"> Developed by Imperial soft services</a></span>.
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    @include('admin.includes.script')

</body>

</html>