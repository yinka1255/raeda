<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>RaedaXpress - Admin</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

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
                                <h4 class="page-title">New Dispatch</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('customers/dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('customers/new_dispatch')}}">New disatch</a></li>
                                    <li class="breadcrumb-item active">New Dispatch</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->


                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <form class="form-horizontal m-t-30"  method="POST" action="{{url('customers/place_dispatch_order1')}}">
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group">
                                            <div class="col-12">
                                                <label>Vehicle type</label>
                                                <select class="form-control" name="vehicle_type_id" required placeholder="">
                                                    @foreach($vehicle_types as $vehicle_type)
                                                    <option value="{{$vehicle_type->id}}">{{$vehicle_type->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <h5>Pickup information</h5>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Sender's Name</label>
                                                    <input class="form-control" name="sender_name" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Sender's Phone</label>
                                                    <input class="form-control" type="number" name="sender_phone" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label>Pickup city</label>
                                                    <select class="form-control" name="pickup_city_id" required placeholder="">
                                                        @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->state_name}} - {{$city->city_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Pickup address</label>
                                                    <input class="form-control" name="pickup_address" required placeholder="">
                                                </div>
                                            </div>
                                            <h5>Delivery information</h5>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Receiver's Name</label>
                                                    <input class="form-control" name="receiver_name" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Receiver's Phone</label>
                                                    <input class="form-control" type="number" name="receiver_phone" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label>Delivery city</label>
                                                    <select class="form-control" name="delivery_city_id" required placeholder="">
                                                        @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->state_name}} - {{$city->city_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Delivery address</label>
                                                    <input class="form-control" name="delivery_address" required placeholder="">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group text-center m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card m-b-30">
                                <div class="card-body" style="min-height: 530px;">

                                    <h4 class="mt-0 header-title mb-4">Items you want to dispatch</h4>
                                    <div class="friends-suggestions">
                                    @foreach ($carts as $key=>$cart)
                                        <a href="{{url('customer/dispatch_details')}}" class="friends-suggestions-list">
                                            <div class="border-bottom position-relative">
                                                <div class="suggestion-icon float-right mt-2 pt-1">
                                                <p class="text-muted">{{$cart->weight}}Kg</p>
                                                </div>

                                                <div class="desc">
                                                    <h5 class="font-14 mb-1 pt-2 text-dark">{{$cart->item_description}} X {{$cart->quantity}}</h5>
                                                    <p class="text-muted" style="margin-top: 10px;">{{$cart->created_at}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                    @if(count($carts) < 1)
                                    <p style="color: brown">You have not added any item at the moment</p>
                                    @else
                                                     @endif
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function(){
        $('select').select2({
            maximumInputLength: 20 // only allow terms up to 20 characters long
        });
    })
    </script>
</body>

</html>