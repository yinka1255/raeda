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
                                <h4 class="page-title">Dispatches</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('customers/dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dispatches</li>
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
                                    <h4 class="mt-0 header-title mb-4">Recent dispatches</h4>
                                    <div class="friends-suggestions">
                                    @foreach ($dispatches as $key=>$dispatch)
                                        <a href="{{url('customers/dispatch_details/'.$dispatch->id)}}" class="friends-suggestions-list">
                                            <div class="border-bottom position-relative">
                                                <div class="float-left mb-0 mr-3" style="width: 30px;height: 70px;padding-top: 15px;">
                                                    {{$key+1}}
                                                </div>
                                                <div class="suggestion-icon float-right mt-2 pt-1">
                                                @if($dispatch->payment_status == "Pending")
                                                <span class="badge badge-primary">Click here to pay now</span>
                                                @elseif($dispatch->status == "Pending")
                                                <span class="badge badge-warning">Pending</span>
                                                @elseif($dispatch->status == "Transit")
                                                <span class="badge badge-warning">In Transit</span>
                                                @elseif($dispatch->status == "Completed")
                                                <span class="badge badge-success">Completed</span>
                                                @endif
                                                <p class="text-muted">₦{{number_format($dispatch->delivery_fee)}}</p>
                                                </div>

                                                <div class="desc">
                                                    <h5 class="font-14 mb-1 pt-2 text-dark">#{{$dispatch->order_number}}</h5>
                                                    <p class="text-muted">{{$dispatch->created_at}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                    <div style="padding-top: 20px; margin: 0 auto;width: 100%" class="pull-right">{{ $dispatches->links() }}</div>
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