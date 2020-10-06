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
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">RaedaXpress</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Completed dispatch</h5>
                                    </div>
                                    <h3 class="mt-4">{{$completed_dispatches}}</h3>
                                    <div class="progress mt-4" style="height: 4px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">In Transit</h5>
                                    </div>
                                    <h3 class="mt-4">{{$transit_dispatches}}</h3>
                                    <div class="progress mt-4" style="height: 4px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-buffer bg-danger text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Awaiting payment</h5>
                                    </div>
                                    <h3 class="mt-4">{{$awaiting_payment_dispatches}}</h3>
                                    <div class="progress mt-4" style="height: 4px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Recent dispatches</h4>
                                    <div class="friends-suggestions">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Trn Ref</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach ($recent_dispatches as $key=>$recent_dispatch)
                                                
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>#{{$recent_dispatch->order_number}}</td>
                                                    <td>{{$recent_dispatch->user_first_name}} {{$recent_dispatch->user_last_name}}</td>
                                                    <td>₦{{number_format($recent_dispatch->delivery_fee)}}</td>
                                                    <td>@if($recent_dispatch->payment_status == "Pending")
                                                        <span class="badge badge-primary">Awaiting payment</span>
                                                        @elseif($recent_dispatch->status == "Pending")
                                                        <span class="badge badge-warning">Pending</span>
                                                        @elseif($recent_dispatch->status == "Transit")
                                                        <span class="badge badge-warning">In Transit</span>
                                                        @elseif($recent_dispatch->status == "Completed")
                                                        <span class="badge badge-success">Completed</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$recent_dispatch->created_at}}</td>
                                                    <td><a class="btn btn-primary" href="{{url('admin/dispatch_details/'.$recent_dispatch->id)}}" >See details</a>
                                                </tr></a>
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