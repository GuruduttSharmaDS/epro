@extends('frontend.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')
 <div class="banner_search">
                <h1>About Us</h1>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">about-us</li>                 
                </ul>
            </div>  
            <div class="about_us">
                <div class="container">
                    <div class="row">      
                        <div class="col-md-7">
                            <div class="abt_content">
                                <h2>About Us</h2>
                                <h4>Roam Around With Your Business</h4>
                                <p>Duis in ex dapibus ipsum mollis consectetur. Nulla enim felis, lobortis nec elit ut, semper commodo ligula. Morbi a mi id nisi sollicitudin imperdiet. Quisque volutpat pretium est sed auctor. Vivamus facilisis, magna vitae sodales posuere, odio tortor dictum nunc, vel tempor mauris erat dapibus nunc. Duis semper arcu ut dapibus ultrices. Suspendisse potenti. In eleifend a felis vitae tincidunt.</p>

                                <p>Sed semper vulputate porta. Vestibulum ac ipsum quis nulla malesuada consequat. Nam eget tincidunt nulla. Proin quis mi arcu. Ut quis quam sit amet quam aliquet tempus sed ut nisl. Duis sed eleifend metus. Nullam bibendum imperdiet diam, quis dictum dui. Curabitur et auctor sem. Vivamus sit amet ullamcorper nulla, ac sagittis justo. Quisque auctor, nisl in semper condimentum, nunc ex dapibus lorem, quis finibus neque eros non sem. Duis volutpat erat eget mi tempor vestibulum. Phasellus pharetra sapien vel condimentum porta. In eget convallis risus, non ullamcorper tellus.</p>
                            <h5 class="name_desg"><a href="#">Work With Us</a></h5>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="abt_img">
                            <img src="{!! asset('assets/frontend/img/abt.png') !!}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="how_it_works">
            <div class="container">
                <div class="row">  
                    <div class="col-12">
                        <h2>How it Works</h2>
                    </div>
                    <div class="col-md-3">
                        <div class="work_process">
                            <span><img src="{!! asset('assets/frontend/img/signup.png') !!}" alt="Signup(it's free)"></span>
                            <h3>Signup(it's free)</h3>
                            <p>The Love Boat promises something for the beat every of just one drum.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="work_process">
                            <span><img src="{!! asset('assets/frontend/img/rate.png') !!}" alt="client come to you"></span>
                            <h3>client come to you</h3>
                            <p>The Love Boat promises something for the beat every of just one drum.</p>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="work_process">
                            <span><img src="{!! asset('assets/frontend/img/collab.png') !!}" alt="collaborate easily"></span>
                            <h3>collaborate easily</h3>
                            <p>The Love Boat promises something for the beat every of just one drum.</p>            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="work_process">
                            <span><img src="{!! asset('assets/frontend/img/pay.png') !!}" alt="payment simplyfied"></span>
                            <h3>payment simplyfied</h3>
                            <p>The Love Boat promises something for the beat every of just one drum.</p>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="best_security">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>We are the leader of the <br> security and bodyguard services industry.</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="our_vision"><img src="{!! asset('assets/frontend/img/leader-security2.jpg') !!}" alt="leader-security"></div>
                        <h3>Our Vision</h3>
                        <p>Duis in ex dapibus ipsum mollis consectetur. Nulla enim felis, lobortis nec elit ut, semper commodo ligula. Morbi a mi id nisi sollicitudin imperdiet. Quisque volutpat pretium est sed auctor. Vivamus facilisis, magna vitae sodales posuere, odio tortor dictum nunc, vel tempor mauris erat dapibus nunc. Duis semper arcu ut dapibus ultrices. Suspendisse potenti. In eleifend a felis vitae tincidunt.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="our_vision"><img src="{!! asset('assets/frontend/img/leader-security1.jpg') !!}" alt="leader-security"></div>
                        <h3>Our Goals</h3>
                        <p>Duis in ex dapibus ipsum mollis consectetur. Nulla enim felis, lobortis nec elit ut, semper commodo ligula. Morbi a mi id nisi sollicitudin imperdiet. Quisque volutpat pretium est sed auctor. Vivamus facilisis, magna vitae sodales posuere, odio tortor dictum nunc, vel tempor mauris erat dapibus nunc. Duis semper arcu ut dapibus ultrices. Suspendisse potenti. In eleifend a felis vitae tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="how_it_works best_services">
            <div class="container">
                <div class="row">  
                    <div class="col-12">
                        <h2>Our Best Services</h2>
                        <p>The Love Boat promises something for the beat every of just one drum.</p>
                    </div>
                    <div class="col-md-3">
                        <div class="work_process flip-card-inner">
                            <div class="flip-card-front">
                                <span><img src="{!! asset('assets/frontend/img/personal.png') !!}" alt="Signup(it's free)"></span>
                                <h3>Personal Security</h3>

                            </div>
                            <div class="flip-card-back">
                                <h3>Personal Security</h3>
                                <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.</p>
                                <a href="#">Explore <span><i class="fas fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="work_process flip-card-inner">
                            <div class="flip-card-front">
                                <span><img src="{!! asset('assets/frontend/img/home.png') !!}" alt="client come to you"></span>
                                <h3>Home Security</h3>
                            </div>
                            <div class="flip-card-back">
                                <h3>Home Security</h3>
                                <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.</p>
                                <a href="#">Explore <span><i class="fas fa-arrow-right"></i></span></a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="work_process flip-card-inner">
                            <div class="flip-card-front">
                                <span><img src="{!! asset('assets/frontend/img/office.png') !!}" alt="collaborate easily"></span>
                                <h3>office Security</h3>
                            </div>
                            <div class="flip-card-back">
                                <h3>office Security</h3>
                                <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.</p>
                                <a href="#">Explore <span><i class="fas fa-arrow-right"></i></span></a>
                            </div>          
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="work_process flip-card-inner">
                            <div class="flip-card-front">
                                <span><img src="{!! asset('assets/frontend/img/corporate.png') !!}" alt="payment simplyfied"></span>
                                <h3>Corporate Security</h3>
                            </div>
                            <div class="flip-card-back">
                                <h3>Corporate Security</h3>
                                <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.</p>
                                <a href="#">Explore <span><i class="fas fa-arrow-right"></i></span></a>
                            </div>                  
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="work_process flip-card-inner">
                            <div class="flip-card-front">
                                <span><img src="{!! asset('assets/frontend/img/atm.png') !!}" alt="Signup(it's free)"></span>
                                <h3>ATMs Security</h3>

                            </div>
                            <div class="flip-card-back">
                                <h3>ATMs Security</h3>
                                <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.</p>
                                <a href="#">Explore <span><i class="fas fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="work_process flip-card-inner">
                            <div class="flip-card-front">
                                <span><img src="{!! asset('assets/frontend/img/multinations.png') !!}" alt="client come to you"></span>
                                <h3>multinationals Companies Security</h3>
                            </div>
                            <div class="flip-card-back">
                                <h3>multinationals Companies Security</h3>
                                <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.</p>
                                <a href="#">Explore <span><i class="fas fa-arrow-right"></i></span></a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="work_process flip-card-inner">
                            <div class="flip-card-front">
                                <span><img src="{!! asset('assets/frontend/img/residance.png') !!}" alt="collaborate easily"></span>
                                <h3>Residances Security</h3>
                            </div>
                            <div class="flip-card-back">
                                <h3>Residances Security</h3>
                                <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.</p>
                                <a href="#">Explore <span><i class="fas fa-arrow-right"></i></span></a>
                            </div>          
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="work_process flip-card-inner">
                            <div class="flip-card-front">
                                <span><img src="{!! asset('assets/frontend/img/hotel.png') !!}" alt="payment simplyfied"></span>
                                <h3>Hotels Security</h3>
                            </div>
                            <div class="flip-card-back">
                                <h3>Hotels Security</h3>
                                <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.</p>
                                <a href="#">Explore <span><i class="fas fa-arrow-right"></i></span></a>
                            </div>                  
                        </div>
                    </div>
                </div>
            </div>
        </div>      

@endsection
