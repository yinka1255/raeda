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
                                <h4 class="page-title">New Role</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">New Role</li>
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
                                    <form class="form-horizontal m-t-30"  method="POST" action="{{url('admin/add_role')}}">
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label>Name</label>
                                                    <input class="form-control" name="name" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-3">
                                                    <label>Manage roles</label>
                                                    <input type="checkbox" value="Yes" name="manage_roles" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Manage states</label>
                                                    <input type="checkbox" value="Yes" name="manage_states" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Manage cities</label>
                                                    <input type="checkbox" value="Yes" name="manage_cities" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Manage user</label>
                                                    <input type="checkbox" value="Yes" name="manage_user" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-3">
                                                    <label>Manage customers</label>
                                                    <input type="checkbox" value="Yes" name="manage_customers" >
                                                </div>
                                                <div class="col-3">
                                                    <label>View all orders</label>
                                                    <input type="checkbox" value="Yes" name="view_all_orders" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Assign all order to riders</label>
                                                    <input type="checkbox" value="Yes" name="assign_all_orders_to_rider" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Manage all orders status</label>
                                                    <input type="checkbox" value="Yes" name="manage_all_orders_status" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-3">
                                                    <label>View state orders</label>
                                                    <input type="checkbox" value="Yes" name="view_state_orders" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Assign state orders to rider</label>
                                                    <input type="checkbox" value="Yes" name="assign_state_orders_to_rider" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Manage state orders status</label>
                                                    <input type="checkbox" value="Yes" name="manage_state_orders_status" >
                                                </div>
                                                
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-3">
                                                    <label>View all transactions</label>
                                                    <input type="checkbox" value="Yes" name="view_all_transactions" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Create_transactions</label>
                                                    <input type="checkbox" value="Yes" name="create_transactions" >
                                                </div>
                                                <div class="col-3">
                                                    <label>View state transactions</label>
                                                    <input type="checkbox" value="Yes" name="view_state_transactions" >
                                                </div>
                                                <div class="col-3">
                                                    <label>Create state transactions</label>
                                                    <input type="checkbox" value="Yes" name="create_state_transactions" >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group text-center m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Add role</button>
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