<!-- sidebar menu area start -->
<div class="sidebar-menu">

    <!-- App Logo -->
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('dashboard') }}"><img src="{!! asset('assets/frontend/img/logo.png') !!}" alt="logo"></a>
        </div>
    </div>

    <!-- App Navigation -->
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    
                    <li class="active">
                        <a href="{{ route('dashboard') }}"> <i class="ti-dashboard"></i> <span> Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('skills') }}"> <i class="ti-palette"></i> <span> Manage Skills</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('category') }}"> <i class="ti-palette"></i> <span> Manage Categories</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('weapons') }}"> <i class="ti-palette"></i> <span> Manage Weapons</span> </a>
                    </li>
                    
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"> <i class="ti-user"></i> <span> Manage Users </span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('adduser') }}"> Add New </a></li>
                            <li><a href="{{ route('listuser') }}"> List </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-briefcase"></i><span> Manage Clients </span> </a>
                        <ul class="collapse">
                            <li><a href="{{ route('addclient') }}"> Add New </a></li>
                            <li><a href="{{ route('listclient') }}"> List </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('listquery') }}"> <i class="ti-email"></i> <span> Manage Contact Query </span></a>
                    </li>  
                    <li>
                        <a href="{{ route('countries') }}"> <i class="ti-email"></i> <span> Manage Country </span></a>
                    </li> 
                    <li>
                        <a href="{{ route('state') }}"> <i class="ti-email"></i> <span> Manage State </span></a>
                    </li>
                    <li>
                        <a href="{{ route('cities') }}"> <i class="ti-email"></i> <span> Manage City </span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->

