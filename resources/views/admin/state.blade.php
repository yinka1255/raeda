<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, city-scalable=0, minimal-ui">
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
                                <h4 class="page-title">Cities in {{$state->name}}</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Cities</li>
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
                                    <h4 class="mt-0 header-title mb-4">Cities</h4>
                                    <div class="friends-suggestions">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @foreach ($cities as $key=>$city)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{$city->name}} </td>
                                                    <td>₦{{number_format($city->price)}}</td>
                                                    <td>@if($city->status == "Active")
                                                        <span class="badge badge-primary">Active</span>
                                                        @elseif($city->status == "Inactive")
                                                        <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$city->created_at}}</td>
                                                    <td>
                                                        <a href="javascript:void(0)" onclick='openModal("{{$city->id}}", "{{$city->price}}")' class="btn btn-warning waves-effect waves-light">Update price</a>
                                                        @if($city->status == "Active")
                                                        <a href="{{url('admin/deactivate_city/'.$city->id)}}" class="btn btn-danger waves-effect waves-light">Deactivate</a>
                                                        @elseif($city->status == "Inactive")
                                                        <a href="{{url('admin/activate_city/'.$city->id)}}" class="btn btn-success waves-effect waves-light">Activate</a>
                                                        @endif
                                                    </td>
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

<script>
    function openModal(city_id, price){
        console.log(price)
        $("#city_id").val(city_id);
        $("#price").val(price);
        $("#update").modal("toggle");
    }

</script>
</body>

<div class="modal fade bs-example-modal-sm" id="update" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">Update price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal m-t-30"  method="POST" action="{{url('admin/update_city_price')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="city_id" id="city_id" />
                    <div class="form-group">
                        <div class="col-12">
                            <label>Price(N)</label>
                            <input class="form-control" type="number" id="price" name="price" required >
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>