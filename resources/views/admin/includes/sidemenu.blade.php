<div class="sidebar-menu">

    <div class="sidebar-menu-inner">
        
        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="{{url('/')}}">
                    <img src="{{asset('public/main/images/logo.png')}}" width="80px" style="padding: 15px;background: #fff;"/>
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

                            
            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>
        
                                
        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li @if(Request::segment(2) == "index") class="active" @endif>
                <a href="{{url('admin/index')}}">
                    <i class="entypo-gauge"></i>
                    <span class="title">Dashboard </span>
                </a>
            </li>
            
            <li @if(Request::segment(2) == "admins") class="active" @endif>
                <a href="{{url('admin/admins')}}">
                    <i class="entypo-users"></i>
                    <span class="title">Manage admin Users </span>
                </a>
            </li>
            <li @if(Request::segment(2) == "customers") class="active" @endif>
                <a href="{{url('admin/customers')}}">
                    <i class="entypo-users"></i>
                    <span class="title">Customers </span>
                </a>
            </li>
            <li @if(Request::segment(2) == "bonuses") class="active" @endif>
                <a href="{{url('admin/bonuses')}}">
                    <i class="entypo-tag"></i>
                    <span class="title">Mng Bonus </span>
                </a>
            </li>
            <li @if(Request::segment(2) == "transactions") class="active" @endif>
                <a href="{{url('admin/transactions')}}">
                    <i class="entypo-credit-card"></i>
                    <span class="title">Transactions </span>
                </a>
            </li>
            
            
            
        </ul>
        
    </div>
</div>
