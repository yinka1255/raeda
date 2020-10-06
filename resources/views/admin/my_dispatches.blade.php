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
                                <h4 class="page-title">My Dispatches</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">{{$state->name}} My Dispatches</li>
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
                                    <form class="form-horizontal row"  method="POST" action="{{url('admin/my_dispatches')}}">
                                        {{ csrf_field() }}
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status" required placeholder="">
                                                    <option>All</option>
                                                    <option>Awaiting payment</option>
                                                    <option>Pending</option>
                                                    <option>In Transit</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>From</label>
                                                    <input class="form-control" value="2019-01-01" type="date" id="example-date-input" name="from" required placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>To</label>
                                                    <input class="form-control" value="2030-01-01" type="date" id="example-date-input" name="to" required placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label> </label>
                                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Sort</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">My dispatches</h4>



                                    <div class="friends-suggestions">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Customer</th>
                                                    <th>Trn Ref</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach ($dispatches as $key=>$dispatch)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td><a href="{{url('admin/customer/'.$dispatch->user_id)}}">{{$dispatch->user_first_name}} {{$dispatch->user_last_name}}</a></td>
                                                    <td>#{{$dispatch->order_number}}</td>
                                                    <td>₦{{number_format($dispatch->delivery_fee)}}</td>
                                                    <td>@if($dispatch->payment_status == "Pending")
                                                        <span class="badge badge-primary">Awaiting payment</span>
                                                        @elseif($dispatch->status == "Pending")
                                                        <span class="badge badge-warning">Pending</span>
                                                        @elseif($dispatch->status == "Transit")
                                                        <span class="badge badge-warning">In Transit</span>
                                                        @elseif($dispatch->status == "Completed")
                                                        <span class="badge badge-success">Completed</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$dispatch->created_at}}</td>
                                                    <td><a class="btn btn-primary" href="{{url('admin/dispatch_details/'.$dispatch->id)}}" >See details</a>
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