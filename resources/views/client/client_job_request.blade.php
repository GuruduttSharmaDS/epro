@extends('client.layouts.client_dashboard_layout')

@section('title', 'FreelanceEP')
@section('body')

<div class="banner_search">
				<h1><?php echo $pageTitle; ?></h1>				
			</div>	
			<div class="search_main">
				<div class="container">
					<div class="row">
						 @include("client.layouts.client_dashboard_sidebar")
						 <div class="col-12 col-md-8 col-lg-8 col-sm-7">
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
							<div class="hire_companies work_history current_task">
								<h2><span><i class="flaticon-task-complete black"></i></span>Job Request</h2>
								<ul>
								<?php
									if(isset($jobs) && !empty($jobs)){
										foreach($jobs as $job){
									?>
									<li>
										<div class="posted">
										<h3><b><a href="{{asset('/client/job/job-detail/'.$job->job_id)}}">{{$job->title}}</a></b>{{$job->address}},
										{{$job->city}}, {{$job->state}}, {{$job->country}}
										<b>Job Status: </b>
										<?php
										if($job->job_status == 0){
											echo "Pending";
										}else if($job->job_status == 1){
											echo "Accepted";
										}else{
											echo "Declined";
										}
										?>
										</h3>
										
										<time class="calen"><img src="{!! asset('assets/frontend/img/cal.svg') !!}" alt="">{{date('d/m/y', strtotime($job->job_start_on))}} - {{date('d/m/y', strtotime($job->job_end_on))}}
										
										</time>
										</div>
										<div class="pending-button" id="pending-button_{{$job->job_req_id}}">
											<?php
											if($job->job_status == 1 && $job->is_payment != 1){
												?>
												<form method="POST" action="{{ route('payment') }}">
												{!!csrf_field()!!}
												<input type="hidden" name="job_req_id" value="{{$job->job_req_id}}">
											    <input type="hidden" name="price" value="{{$job->price}}">
												<input type="hidden" name="job_id" value="{{$job->job_id}}">
												<input type="hidden" name="user_id" value="{{$job->user_id}}">
												<input type="hidden" name="client_id" value="{{$job->client_id}}">
												<button>Pay Now</button>
												</form>
											<?php	
											}
											?>
											</div>
										<p>
										{{$job->description}}
										</p>
									</li>
									<?php
										}
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

@endsection
