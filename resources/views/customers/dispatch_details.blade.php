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
    <script src="https://js.paystack.co/v1/inline.js"></script>
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
                                <h4 class="page-title">Dispatch details</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('customers/dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dispatch details</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="invoice-title">
                                                <h4 class="float-right font-16"><strong>Order # {{$dispatch[0]->order_number}}</strong></h4>
                                                <h3 class="m-t-0">
                                                    <img src="assets/images/logo-dark.png" alt="logo" height="24"/>
                                                </h3>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <address>
                                                        <strong>Pickup details:</strong><br>
                                                        {{$dispatch[0]->sender_name}}<br>
                                                        {{$dispatch[0]->sender_phone}}<br>
                                                        {{$dispatch[0]->pickup_address}}<br/>
                                                        {{$dispatch[0]->pickup_city_name}}, {{$dispatch[0]->pickup_state_name}}<br>
                                                        
                                                    </address>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <address>
                                                        <strong>Delivery details:</strong><br>
                                                        {{$dispatch[0]->receiver_name}}<br>
                                                        {{$dispatch[0]->receiver_phone}}<br>
                                                        {{$dispatch[0]->delivery_address}}<br/>
                                                        {{$dispatch[0]->delivery_city_name}}, {{$dispatch[0]->delivery_state_name}}<br>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 m-t-30">
                                                    <address>
                                                        <strong>Payment Method:</strong><br>
                                                        {{$dispatch[0]->payment_method}}
                                                    </address>
                                                </div>
                                                <div class="col-6 m-t-30 text-right">
                                                    <address>
                                                        <strong>Order Date:</strong><br>
                                                        {{$dispatch[0]->created_at}}<br><br>
                                                    </address>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="panel panel-default">
                                                <div class="p-2">
                                                    <h3 class="panel-title font-20"><strong>Dispatch items</strong></h3>
                                                </div>
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <td><strong>Item</strong></td>
                                                                <td class="text-center"><strong>Dimessions</strong></td>
                                                                <td class="text-center"><strong>Quantity</strong>
                                                                </td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($dispatch as $key=>$dispatch_item)
                                                            <tr>
                                                                <td>{{$dispatch_item->order_detail_description}}</td>
                                                                <td class="text-center">{{$dispatch_item->length}}cm, {{$dispatch_item->width}}cm, {{$dispatch_item->height}}cm, {{$dispatch_item->weight}}Kg </td>
                                                                <td class="text-center">{{$dispatch_item->order_detail_quantity}}</td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="no-line text-right"><strong>Total</strong><h4 class="m-0">₦{{number_format($dispatch[0]->delivery_fee)}}</h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td class="no-line text-right"><strong>Order status</strong><h4 class="m-0">@if($dispatch[0]->status == "Completed")<span class="badge badge-success">Delivered</span> @elseif($dispatch[0]->status == "Pending") <span class="badge badge-warning">Pending</span> @elseif($dispatch[0]->status == "In transit") <span class="badge badge-warning">In transit</span>@endif</h4></td>
                                                                <td class="no-line text-right"><strong>Payment status</strong><h4 class="m-0">@if($dispatch[0]->payment_status == "Completed")<span class="badge badge-success">Paid</span> @else <span class="badge badge-warning">Awaiting payment</span> @endif</h4></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
    
                                                    <div class="d-print-none mo-mt-2">
                                                        <div class="float-right">
                                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>

                                                            @if($dispatch[0]->payment_status == "Pending")
                                                            <a href="javascript:void(0)" onclick="payWithWallet()" class="btn btn-primary waves-effect waves-light">Pay with wallet</a>
                                                            <a href="javascript:void(0)" onclick="payWithCard()" class="btn btn-success waves-effect waves-light">Pay with card</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div> <!-- end row -->
    
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->   
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
    
    <script>
        function payWithWallet(){
            $("#pay_wallet_form").submit();
        }
    </script>
    <form>
        <script>
            function payWithCard(){
                var d = new Date();
                var n = d.getTime();
                $("#trn_ref_input").val(n);
                var handler = PaystackPop.setup({
                    key: "pk_test_b1f00843f8c3d01ee3c16317fc6d72c542e04157",
                    email: document.getElementById('email').value,
                    amount: document.getElementById('amount').value * 100,
                    
                    ref: n,
                    
                    currency: "NGN",
                    metadata: {
                        custom_fields: [
                        { display_name: "Full Names", variable_name: "name", value: document.getElementById('name').value },
                        { display_name: "Email Address", variable_name: "email_address", value: document.getElementById('email').value },
                        
                        ]
                    },
                    callback: function(response){
                        document.getElementById("pay_card_form").submit();
                        
                    },
                    onClose: function(){
                        alert('Transaction Cancelled');
                        
                    }
                });
                handler.openIframe();
            }
        </script>
    </form>

    <form class="form-horizontal m-t-30" id="pay_wallet_form" method="POST" action="{{url('customers/pay_dispatch')}}">
        {{ csrf_field() }}
        <input type="hidden" name="order_number" value="{{$dispatch[0]->order_number}}"/>
        <input type="hidden" name="amount" value="{{$dispatch[0]->delivery_fee}}"/>
        <input type="hidden" name="payment_method" value="Pay with wallet"/>
    </form>

    <form class="form-horizontal m-t-30" id="pay_card_form" method="POST" action="{{url('customers/pay_dispatch_card')}}">
        {{ csrf_field() }}
        <input type="hidden" name="order_number" value="{{$dispatch[0]->order_number}}"/>
        <input type="hidden" name="amount" id="amount" value="{{$dispatch[0]->delivery_fee}}"/>
        <input type="hidden" name="payment_method" value="Pay with card"/>
        <input type="hidden" name="trn_ref" id="trn_ref_input" />
        <input type="hidden" value="{{Auth::user()->first_name}}" id="name" />
        <input type="hidden" value="{{Auth::user()->email}}" id="email" />
    </form>
</body>

</html>