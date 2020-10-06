<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>RaedaXpress - Admin</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    
    @include('customers.includes.head')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        
        <!-- Top Bar End -->
        @include('customers.includes.sidemenu')
        
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
                                    @foreach ($recent_dispatches as $key=>$recent_dispatch)
                                        <a href="{{url('customers/dispatch_details/'.$recent_dispatch->id)}}" class="friends-suggestions-list">
                                            <div class="border-bottom position-relative">
                                                <div class="float-left mb-0 mr-3" style="width: 30px;height: 70px;padding-top: 15px;">
                                                    {{$key+1}}
                                                </div>
                                                <div class="suggestion-icon float-right mt-2 pt-1">
                                                @if($recent_dispatch->payment_status == "Pending")
                                                <span class="badge badge-primary">Click here to pay now</span>
                                                @elseif($recent_dispatch->status == "Pending")
                                                <span class="badge badge-warning">Pending</span>
                                                @elseif($recent_dispatch->status == "Transit")
                                                <span class="badge badge-warning">In Transit</span>
                                                @elseif($recent_dispatch->status == "Completed")
                                                <span class="badge badge-success">Completed</span>
                                                @endif
                                                <p class="text-muted">₦{{number_format($recent_dispatch->delivery_fee)}}</p>
                                                </div>

                                                <div class="desc">
                                                    <h5 class="font-14 mb-1 pt-2 text-dark">#{{$recent_dispatch->order_number}}</h5>
                                                    <p class="text-muted">{{$recent_dispatch->created_at}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
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
    @include('customers.includes.script')

</body>

</html>