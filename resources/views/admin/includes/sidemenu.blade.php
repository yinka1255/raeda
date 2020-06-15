<div class="sidebar-menu">

    <div class="sidebar-menu-inner">
        
        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="{{url('/')}}">
                    <img src="{{asset('public/main/images/logo.jpg')}}" width="70px"/>
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
            <li @if(Request::segment(2) == "student") class="active" @endif>
                    <a href="{{url('admin/students')}}">
                        <i class="entypo-users"></i>
                        <span class="title">Students </span>
                    </a>
                </li>
            <li @if(Request::segment(2) == "programs") class="active" @endif>
                <a href="{{url('admin/programs')}}">
                    <i class="entypo-folder"></i>
                    <span class="title">Manage Programs </span>
                </a>
            </li>
            <li @if(Request::segment(2) == "books") class="active" @endif>
                <a href="{{url('admin/books')}}">
                    <i class="entypo-book"></i>
                    <span class="title">Manage E-books </span>
                </a>
            </li>
            {{--
            <li @if(Request::segment(2) == "videos") class="active" @endif>
                <a href="{{url('admin/videos')}}">
                    <i class="entypo-picture"></i>
                    <span class="title">Manage Gallery(Videos) </span>
                </a>
            </li>
            --}}
            <li @if(Request::segment(2) == "pictures") class="active" @endif>
                <a href="{{url('admin/pictures')}}">
                    <i class="entypo-picture"></i>
                    <span class="title">Manage Gallery(Pictures) </span>
                </a>
            </li>
            
            
        </ul>
        
    </div>
</div>
