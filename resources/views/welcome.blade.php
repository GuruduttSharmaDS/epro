@extends('frontend.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')
<div class="banner">
   
<div id="id_checking" class="carousel slide" data-ride="carousel"> 
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{!! asset('assets/frontend/img/banne') !!}r.jpg" alt="banner" class="img-fluid">
            <div class="carousel-caption container">           
                <h3>Hire expert freelancers<br> 
                    <b>for any job, Onlines</b> </h3>
                    <p>Consectetur adipisicing elit sed dotem eiusmod tempor incuntes ut labore etdolore maigna aliqua enim.</p>
                    <div class="adv_filter">
                        <span><img src="{!! asset('assets/frontend/img/filte') !!}r.png" width="15px" class="img-fluid" ></span>
                        <!-- <select class="form-control" id="sel1">
                            <option>Advance Filter</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>-->
                    </div>

                    <div class="keyword_location">
                        <!-- <form action="{{route('search-result')}}" method="GET"> -->
                        <form action="" method="GET">
                            <span class="locate"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" placeholder="Find location">
                            <input type="text" placeholder="Type your Keyword...">
                            <button class="submit_btn" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="gards_clients">
                        <ul>
                            <li>
                                <span>
                                    <img src="{!! asset('assets/frontend/img/total') !!}_gard.png" alt="total guards">               
                                </span>
                                <h4>{{$gaurd_count}}</h4>
                                <h5>Total Guards</h5>
                            </li>
                            <li>
                                <span>
                                    <img src="{!! asset('assets/frontend/img/clien') !!}ts.png" alt="total client">                  
                                </span>
                                <h4>{{$client_count}}</h4>
                                <h5>Happy Clientss</h5>
                            </li>
                        </ul>
                    </div>
                </div>   
            </div>      
        </div>  
    </div>
</div>
<div class="about_us">
    <div class="container">
        <div class="row">      
            <div class="col-md-7">
                <div class="abt_content">
                    <h2>About Us</h2>
                    <h4>Roam Around With Your Business</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    <h5><img src="{!! asset('assets/frontend/img/sign.') !!}png" alt="sign"></h5>
                </div>
            </div>
            <div class="col-md-5">
                <div class="abt_img">
                    <img src="{!! asset('assets/frontend/img/abt.p') !!}ng" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="start_as">
    <div class="container-fluid">
        <div class="row mx-0">
            <div class="col-md-2 px-0">
                <span class="as_img">
                    <img src="{!! asset('assets/frontend/img/clien') !!}t.jpg" alt="as client" class="img-fluid">
                </span>
            </div>
            <div class="col-md-4 px-0">
                <div class="as_client">
                <h3>Start As Client</h3>
                <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.Consectetur adipisicing elitaed eiusmod </p>
                
                <a href="javascript:void(0)" class="homeJoinNow" data-toggle="modal" data-target="#login_regis" data-id="client">Join Now</a>
            </div>
                </div>
            <div class="col-md-4 px-0">
                <div class="as_f_lancer">
                    <h3>Start As Freelancer</h3>
                    <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.Consectetur adipisicing elitaed eiusmod.</p>
                    <a href="javascript:void(0)" class="homeJoinNow" data-toggle="modal" data-target="#login_regis" data-id="cliuserent">Join Now</a>
                </div>
            </div>
            <div class="col-md-2 px-0">
                <span class="as_img">
                    <img src="{!! asset('assets/frontend/img/freel') !!}ancer.jpg" alt="freelancer" class="img-fluid">
                </span>
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
                    <span><img src="{!! asset('assets/frontend/img/signu') !!}p.png" alt="Signup(it's free)"></span>
                    <h3>Signup(it's free)</h3>
                    <p>The Love Boat promises something for the beat every of just one drum.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="work_process">
                    <span><img src="{!! asset('assets/frontend/img/rate.') !!}png" alt="client come to you"></span>
                    <h3>client come to you</h3>
                    <p>The Love Boat promises something for the beat every of just one drum.</p>
                </div>

            </div>
            <div class="col-md-3">
                <div class="work_process">
                    <span><img src="{!! asset('assets/frontend/img/colla') !!}b.png" alt="collaborate easily"></span>
                    <h3>collaborate easily</h3>
                    <p>The Love Boat promises something for the beat every of just one drum.</p>            
                </div>
            </div>
            <div class="col-md-3">
                <div class="work_process">
                    <span><img src="{!! asset('assets/frontend/img/pay.p') !!}ng" alt="payment simplyfied"></span>
                    <h3>payment simplyfied</h3>
                    <p>The Love Boat promises something for the beat every of just one drum.</p>                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="highrated_freelancer">
    <div class="container">
        <div class="row">  
            <div class="col-12">
                <h2>Highest Rated Freelancers</h2>
                <p>The Love Boat promises something for the beat every of just one drum. <a href="javascript:void(0);">View All Guards</a></p>
                <div class="highrate slider">

                        @foreach ($users as $user)
                    <div class="FL_slide">
                        <?php
                            if(!empty($user->image)){
                                $img = $user->image;
                            }else{
                                $img = 'no-img.png';

                            } ?>
                        <span class="slick_img"><img src="{{asset('/uploads/'.$img)}}" alt="Signup(it's free)"></span>
                        <h3>{{ $user->first_name.' '.$user->last_name }}<span class="flag"><img src="{!! asset('assets/frontend/img/flag.') !!}png" alt="country"></span></h3>
                        <p>@if(!empty($user->category_detail)){{ $user->category_detail->category_name }}@endif</p>
                        <div class="star_rate">
                            <h3>5.0</h3>
                            <ul>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                        <div class="gray_bg">
                            <div class="location">
                                <h4>
                                    <span><i class="fas fa-map-marker-alt"></i>Locationd</span>
                                    <b>{{ $user->country }}</b>
                                </h4>
                                <h4>
                                    <span>Rate</span>
                                    <b>${{ $user->price}}/hr</b>
                                </h4>
                                <h4>
                                    <span>Success</span>
                                    <b>95%</b>
                                </h4>
                            </div>
                            <div class="view_profile">
                                <a class="checkuserLogin" href="{{asset('/gaurd-detail/'.$user->id)}}">View Profile</a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
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
                        <span><img src="{!! asset('assets/frontend/img/perso') !!}nal.png" alt="Signup(it's free)"></span>
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
                        <span><img src="{!! asset('assets/frontend/img/home.') !!}png" alt="client come to you"></span>
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
                        <span><img src="{!! asset('assets/frontend/img/offic') !!}e.png" alt="collaborate easily"></span>
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
                        <span><img src="{!! asset('assets/frontend/img/corpo') !!}rate.png" alt="payment simplyfied"></span>
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
                        <span><img src="{!! asset('assets/frontend/img/atm.p') !!}ng" alt="Signup(it's free)"></span>
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
                        <span><img src="{!! asset('assets/frontend/img/multi') !!}nations.png" alt="client come to you"></span>
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
                        <span><img src="{!! asset('assets/frontend/img/resid') !!}ance.png" alt="collaborate easily"></span>
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
                        <span><img src="{!! asset('assets/frontend/img/hotel') !!}.png" alt="payment simplyfied"></span>
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
<div class="how_it_works featured_cities">
    <div class="container">
        <div class="row">  
            <div class="col-12">
                <h2>Our Best Services</h2>
                <p>The Love Boat promises something for the beat every of just one drum.</p>
            </div>  
            <div class="col-md-3">
                <div class="img_hold">
                    <span><img src="{!! asset('assets/frontend/img/count') !!}ry1.jpg" alt="" class="img-fluid"></span>
                    <h4>New York</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="img_hold">
                    <span><img src="{!! asset('assets/frontend/img/count') !!}ry2.jpg" alt="" class="img-fluid"></span>
                    <h4>New York</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="img_hold">
                    <span><img src="{!! asset('assets/frontend/img/count') !!}ry3.jpg" alt="" class="img-fluid"></span>
                    <h4>New York</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="img_hold">
                    <span><img src="{!! asset('assets/frontend/img/count') !!}ry4.jpg" alt="" class="img-fluid"></span>
                    <h4>New York</h4>
                </div>
            </div>              
        </div>
    </div>
</div>

@endsection
<style type="text/css">
    .slick_img img {
    width: 100%;
}
</style>
