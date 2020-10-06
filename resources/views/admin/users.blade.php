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
                                <h4 class="page-title">Users</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Users</li>
                                </ol>
                                <a href="{{url('admin/new_user')}}" class="btn btn-primary waves-effect waves-light">New user</a>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Users</h4>
                                    <div class="friends-suggestions">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name</th>
                                                    <th>State</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach ($users as $key=>$user)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                                                    <td>{{$user->state_name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->phone1}}</td>
                                                    <td>{{$user->role_name}}</td>
                                                    <td>@if($user->status == "Active")
                                                        <span class="badge badge-primary">Active</span>
                                                        @elseif($user->status == "Inactive")
                                                        <span class="badge badge-warning">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td><a href="#" class="btn btn-primary waves-effect waves-light">Details</a></td>
                                                </tr>
                                                 @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
<!-- Required datatable js -->
<script src="{{asset('public/customer/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('public/customer/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('public/customer/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/datatables/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('public/customer/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/customer/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('public/customer/pages/datatables.init.js')}}"></script>   

</body>

</html>