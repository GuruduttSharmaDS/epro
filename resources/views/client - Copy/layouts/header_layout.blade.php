
      <header id="wt-header" class="wt-header wt-headervtwo wt-haslayout">
        <div class="wt-navigationarea">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <strong class="wt-logo"><a href="{{route('home')}}"><img src="{!! asset('assets/frontend/img/logo.') !!}png" alt="Freelancep" style="max-width: 70%;"></a></strong>
                <div class="wt-rightarea">
                  <nav id="wt-nav" class="wt-nav navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="lnr lnr-menu"></i>
                    </button>
                    <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item">
                          <a href="{{route('home')}}">Take me to website</a>
                        </li>
                      </ul>
                    </div>
                  </nav>
                  <div class="wt-loginarea">
                    <figure class="wt-userimg">
                      <img src="images/user-login.png" alt="img description">
                    </figure>
                    <div class="wt-loginoption">
                      <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn">Login</a>
                      <div class="wt-loginformhold">
                        <div class="wt-loginheader">
                          <span>Login</span>
                          <a href="javascript:;"><i class="fa fa-times"></i></a>
                        </div>
                        <form class="wt-formtheme wt-loginform do-login-form">
                          <fieldset>
                            <div class="form-group">
                              <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                              <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="wt-logininfo">
                              <a href="javascript:;" class="wt-btn do-login-button">Login</a>
                              <span class="wt-checkbox">
                                <input id="wt-login" type="checkbox" name="rememberme">
                                <label for="wt-login">Keep me logged in</label>
                              </span>
                            </div>
                          </fieldset>
                          <div class="wt-loginfooterinfo">
                            <a href="javascript:;" class="wt-forgot-password">Forgot password?</a>
                            <a href="register.html">Create account</a>
                          </div>
                        </form>
                          <form class="wt-formtheme wt-loginform do-forgot-password-form wt-hide-form">
                              <fieldset>
                                <div class="form-group">
                                      <input type="email" name="email" class="form-control get_password" placeholder="Email">
                                  </div>
                                 
                                  <div class="wt-logininfo">
                                      <a href="javascript:;" class="wt-btn do-get-password">Get Pasword</a>
                                  </div>     
                              </fieldset>
                              <div class="wt-loginfooterinfo">
                                  <a href="javascript:void(0);" class="wt-show-login">Login</a>
                                  <a href="register.html">Create account</a>
                              </div>
                          </form>
                      </div>
                    </div>
                    <a href="register.html" class="wt-btn">Join Now</a>
                  </div>

                  <div class="wt-userlogedin">
                    <figure class="wt-userimg">
                      <img src="{{ (!empty( Session::get('img')))?Session::get('img'):asset('/uploads/no-img.png')}}" alt="image description">
                    </figure>
                    <div class="wt-username">
                      <h3>@if(session::get('first_name')) {{ Session::get('first_name') }} @endif</h3>
                      <span>Client</span>
                    </div>
                    <nav class="wt-usernav">
                      <ul>
                        <li>
                          <a href="{{route('client-dashboard')}}">
                            <span>My Profile</span>
                          </a>
                        </li>

                        <li>
                          <a href="{{route('logoutfront')}}">
                            <span>Logout</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
