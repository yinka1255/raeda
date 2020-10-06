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
                                <h4 class="page-title">New Dispatch</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('customers/dashboard')}}">Dashboard</a></li>
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
                                    <form class="form-horizontal m-t-30"  method="POST" action="{{url('customers/save_item_to_cart')}}">
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Item descripiton</label>
                                                    <input class="form-control" name="item_description" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Width(cm)</label>
                                                    <input class="form-control" name="width" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Length(cm)</label>
                                                    <input class="form-control" name="length" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Height(cm)</label>
                                                    <input class="form-control" name="height" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Weight(g)</label>
                                                    <input class="form-control" name="weight" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Quantity</label>
                                                    <input class="form-control" name="quantity" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                        <label>Category</label>
                                                    <select class="form-control" name="dispatch_item_category_id" required placeholder="">
                                                        @foreach($dispatch_item_categories as $dispatch_item_category)
                                                        <option value="{{$dispatch_item_category->id}}">{{$dispatch_item_category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group text-center m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Add item</button>
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
                                                <a class="danger" href="{{url('customers/delete_cart_item/'.$cart->id)}}"> <i class="fa fa-trash"></i> </a>
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
                                    <a href="{{url('customers/new_dispatch_address')}}" class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Continue</a>
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

</body>

</html>