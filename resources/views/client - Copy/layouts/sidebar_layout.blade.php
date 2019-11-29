				<!--Sidebar Start-->
				<div id="wt-sidebarwrapper" class="wt-sidebarwrapper">
					<div id="wt-btnmenutoggle" class="wt-btnmenutoggle">
						<span class="menu-icon">
							<em></em>
							<em></em>
							<em></em>
						</span>
					</div>
					<div id="wt-verticalscrollbar" class="wt-verticalscrollbar">
						<div class="wt-companysdetails wt-usersidebar">
							<figure class="wt-companysimg">
								<img src="{!! asset('assets/client') !!}/images/sidebar/img-03.jpg" alt="img description">
							</figure>
							<div class="wt-companysinfo">
								<figure><img src="{{ (!empty( Session::get('img')))?Session::get('img'):asset('/uploads/no-img.png')}}" alt="img description"></figure>
								<div class="wt-title">
									<h2><a href="javascript:void(0);"> Louanne Mattioli</a></h2>
									<span>{{ (!empty( Session::get('first_name')))?Session::get('first_name'):'Client'}}</span>
								</div>
								<div class="wt-btnarea"><a href="{{route('client-job-create')}}" class="wt-btn">Post a Job</a></div>
							</div>
						</div>
						<nav id="wt-navdashboard" class="wt-navdashboard">
							<ul>
								<li>
									<a href="{{route('client-dashboard')}}">
										<i class="ti-dashboard"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li>
									<a href="{{route('client-dashboard')}}">
										<i class="ti-briefcase"></i>
										<span>My Profile</span>
									</a>
								</li>
								<li class="menu-item-has-children">
									<a href="javascript:void(0);">
										<i class="ti-package"></i>
										<span>Manage Jobs</span>
									</a>
									<ul class="sub-menu">
										<li><hr><a href="{{route('client-dashboard')}}">Completed Jobs</a></li>
										<li><hr><a href="{{route('client-dashboard')}}">Cancelled Jobs</a></li>
										<li><hr><a href="{{route('client-dashboard')}}">Ongoing Jobs</a></li>
									</ul>
								</li>
								<li>
									<a href="{{route('client-dashboard')}}">
										<i class="ti-bookmark-alt"></i>
										<span>Manage Proposals</span>
									</a>
								</li>
								<li>
									<a href="{{route('logoutfront')}}">
										<i class="ti-shift-right"></i>
										<span>Logout</span>
									</a>
								</li>
							</ul>
						</nav>
						<div class="wt-navdashboard-footer">
							<span>Freelancep. © {{date('Y')}} All Rights Reserved.</span>
						</div>
					</div>
				</div>
				<!--Sidebar Start-->