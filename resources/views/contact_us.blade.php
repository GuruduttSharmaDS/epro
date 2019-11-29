@extends('frontend.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')
 <div class="banner_search">
                <h1>Contact Us</h1>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>                 
                </ul>
            </div>
            <div class="contact_form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
						@if(session("msg"))
                                        <div class="alert-dismiss">
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <span>{{session("msg")}}</span><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span> </button><br/>
                                            </div>
                                        </div>
                            @endif
							 @if(session("errormsg"))
                                        <div class="alert-dismiss">
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <span>{{session("errormsg")}}</span><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span> </button><br/>
                                            </div>
                                        </div>
                            @endif
                            <div class="cntct_us">
                                <h4><strong>Any questions? </strong>Feel free to contact us!</h4>
                            </div>
                            <form id="contact-form" novalidate="" name="contact-form" action="{{route('contact-us')}}" method="POST">
								{!!csrf_field()!!}
                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                                            <label for="name" class="l_icons"><i class="far fa-user"></i></label>
											{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" id="contactemail" name="contactemail" class="form-control" placeholder="Your Email">
                                            <label for="contactemail" class="l_icons"><i class="far fa-envelope"></i></label>
											{!! $errors->first('contactemail', '<p class="help-block">:message</p>') !!}
										</div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <!--<div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" id="lname" name="email" class="form-control" placeholder="Last Name">
                                            <label for="lname" class="l_icons"><i class="far fa-user"></i></label>
                                        </div>
                                    </div>-->
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">
                                    <!--Grid column-->
                                    
									  <div class="col-md-8">
                                        <div class="md-form">
                                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Your subject">
                                            
											{!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
										</div>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <textarea type="text" id="message" name="message" rows="7" class="form-control md-textarea" placeholder="Your Message"></textarea>                      
											{!! $errors->first('message', '<p class="help-block">:message</p>') !!}
										</div>

                                    </div>
                                </div>
                                <!--Grid row-->
										
                            </form>
                            <div class="text-center text-md-left">
                                <h5 class="name_desg"><a href="javascript:void(0);" class="btn btn-primary contact-us-button" style="outline: none; border: 0">Send</a></h5>                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li>
                                    <h3>Address:</h3>
                                    <h4>55 Crummit Lane Tobias, NE 68453</h4>
                                </li>
                                <li>
                                    <h3>Phone:</h3>
                                    <h4>(844) 707 -0574</h4>
                                </li>
                                <li>
                                    <h3>Email:</h3>
                                    <h4>info@freelanceep.com</h4>
                                </li>
                                <li>
                                    <h3>Get Social:</h3>
                                    <h4>
                                        <a href="" class="social fb"><i class="fab fa-facebook-f"></i></a>
                                        <a href="" class="social tw"><i class="fab fa-twitter"></i></a>
                                        <a href="" class="social ld"><i class="fab fa-linkedin"></i></a>
                                        <a href="" class="social gp"><i class="fab fa-google-plus-g"></i></a>
                                    </h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="map">
                <img src="{{asset('assets/frontend/img/map.jpg')}}" class="img-fluid" alt="location">
            </div>

@endsection
