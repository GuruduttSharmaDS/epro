<header>
    <nav class="navbar navbar-expand-md navbar-light">

        <div class="toggle_logo">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{!! asset('assets/frontend/img/logo.') !!}png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        
        <div class="call_service">
            <h3><span>
                <!-- <img src="{!! asset('assets/frontend/img/call.') !!}png" alt="call service"> --> <i class="far fa-clock"></i></span>On-Call Service 24/7</h3>
                <h2><b>(844) 707-0574</b><br>
                24/7 Hour Business Line</h2>
            </div>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about-us') }}">About us</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#">Events Security</a>
                    </li> -->   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('security-service') }}">Security Services</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faq') }}">Faq</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                    </li>
                    </ul>
                   </div>

                   <div class=" login_dashboard {{ (!empty(Session::get('roleId')))?'':'hide'}}">

                    <div class="dropdown">
                      <button type="button" class=" dropdown-toggle" data-toggle="dropdown">
                        <h4> <b class="login_user_name">@if(session::get('first_name')) {{ Session::get('first_name') }} @endif</b></h4>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item view-profile" href="{{(Session::get('role') == 'client')?route('client-dashboard'):route('user-dashboard')}}">View Profile</a>
                        <a class="dropdown-item" href="{{route('logoutfront')}}">Logout</a>
                      </div>
                    </div>
                  </div>

                   <div class="login_regis">
                    <div class="login_action">
                      <ul> 
                   
                        <li class="register {{ ( !empty(Session::get('roleId'))?'hide':'')}}"><a href="javascript:" data-toggle="modal" data-target="#login_signin">Log in / Register</a></li></ul>
                      </div>



                      <!-- <form class="form-inline search_form">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <a class="submit_btn"><img src="{!! asset('assets/frontend/img/searc') !!}h.png" width="18px"></a>
                      </form> -->
                    </div>
            </div>
        </nav>
    </header>