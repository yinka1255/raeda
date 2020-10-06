<!-- Top Bar Start -->
<div class="topbar hidden-print">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{url('admin/index')}}" class="logo">
            <span class="logo-light">
                    <i class="mdi mdi-camera-control"></i> RaedaXpress
                </span>
            <span class="logo-sm">
                    <i class="mdi mdi-camera-control"></i>
                </span>
        </a>
    </div>
    <nav class="navbar-custom">
        <ul class="navbar-right list-inline float-right mb-0">
            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('public/customer/images/users/user-4.jpg')}}" alt="user" class="rounded-circle">
                        @if(Auth::user())
                        {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <a class="dropdown-item" href="{{url('admin/profile')}}"><i class="mdi mdi-account-circle"></i> Profile</a>
                        <a class="dropdown-item" href="{{url('admin/transactions')}}"><i class="mdi mdi-wallet"></i> Wallet</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{url('logout')}}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
        </ul>
    </nav>
    
    </div>
    
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu hidden-print">
        <div class="slimscroll-menu" id="remove-scroll">
    
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="{{url('admin/index')}}" class="waves-effect">
                            <i class="icon-accelerator"></i> <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/roles')}}" class="waves-effect"><i class="fa fa-tasks"></i><span> Roles</span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/users')}}" class="waves-effect"><i class="fa fa-user"></i><span> Users</span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/customers')}}" class="waves-effect"><i class="fa fa-user"></i><span> Customers</span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/states')}}" class="waves-effect"><i class="fa fa-map"></i><span> States</span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/dispatches')}}" class="waves-effect"><i class="fa fa-file"></i><span> All orders </span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/state_dispatches')}}" class="waves-effect"><i class="fa fa-file"></i><span> My state orders </span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/my_dispatches')}}" class="waves-effect"><i class="fa fa-file"></i><span> My orders </span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/new_dispatch')}}" class="waves-effect"><i class="fa fa-car"></i><span> Book A Dispatch </span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/transactions')}}" class="waves-effect"><i class="fa fa-credit-card"></i><span> Transactions</span></a>
                    </li>
                </ul>
    
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>
    
        </div>
        <!-- Sidebar -left -->
    
    </div>
    <!-- Left Sidebar End -->
    