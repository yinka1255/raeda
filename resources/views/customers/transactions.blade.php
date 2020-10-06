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
                                <h4 class="page-title">Transactions</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('customers/dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Transactions</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->
                    <div class="row">
                        <div class="col-sm-12 col-xl-12">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Wallet balance</h5>
                                    </div>
                                    <h3 class="mt-4">₦{{number_format($balance)}}</h3>
                                    <div class="progress mt-4" style="height: 4px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Recent transactions</h4>
                                    <div class="friends-suggestions">
                                        @foreach ($transactions as $key=>$transaction)
                                            <a href="#" class="friends-suggestions-list">
                                                <div class="border-bottom position-relative">
                                                    <div class="float-left mb-0 mr-3" style="width: 30px;height: 70px;padding-top: 15px;">
                                                        {{$key+1}}
                                                    </div>
                                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                                    @if($transaction->type == "Debit")
                                                    <span class="badge badge-danger">Debit</span>
                                                    @elseif($transaction->type == "Credit")
                                                    <span class="badge badge-success">Credit</span>
                                                    @endif
                                                    <p class="text-muted">₦{{number_format($transaction->amount)}}</p>
                                                    </div>

                                                    <div class="desc">
                                                        <h5 class="font-14 mb-1 pt-2 text-dark">#{{$transaction->trn_ref}}</h5>
                                                        <p class="text-muted">{{$transaction->created_at}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                        <div style="padding-top: 20px; margin: 0 auto;width: 100%" class="pull-right">{{ $transactions->links() }}</div>
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