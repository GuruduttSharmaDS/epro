@extends('frontend.layouts.user_dashboard_layout')

@section('title', 'FreelanceEP')
@section('body')

<div class="banner_search">
				<h1><?php echo $pageTitle; ?></h1>				
			</div>	
			<div class="search_main">
				<div class="container">
					<div class="row">
					@include("frontend.layouts.user_dashboard_sidebar")
						 <div class="col-12 col-md-8 col-lg-8 col-sm-7">
						 <div class="alert alert-danger" style="display:none"></div>
			    		<div class="alert alert-success" style="display:none"></div>
							<div class="hire_companies work_history current_task">
								<h2><span><i class="flaticon-task-complete black"></i></span>Job Request</h2>
								<ul>
								<?php
									if(isset($jobs) && !empty($jobs)){
										foreach($jobs as $job){
									?>
									<li>
										<div class="posted">
										<h3><b>{{$job->title}}</b>{{$job->address}},
										{{$job->city}}, {{$job->state}}, {{$job->country}}
										<b>Job Status: </b> 
										<span id="jobstatus_{{$job->job_req_id}}">
										<?php
										if($job->job_status == 0){
											echo 'Pending';
											
										}else if($job->job_status == 1){
											echo 'Accepted';
										
										}else{
											echo 'Declined';
										}
										?>
										</span>
										</h3>
										<h3>
										</h3>
										
							<time class="calen"><img src="{!! asset('assets/frontend/img/cal.svg') !!}" alt="">{{date('d/m/y', strtotime($job->job_start_on))}} - {{date('d/m/y', strtotime($job->job_end_on))}}
									</time>
										</div>
											<div class="pending-button" id="pending-button_{{$job->job_req_id}}">
											<?php
											if($job->job_status == 0){
												?>
												<a class="green" href="javascript:void(0)" onclick="change_status('1',{{$job->job_req_id}})">Accept</a>
												<a class="yello" href="javascript:void(0)" onclick="change_status('2',{{$job->job_req_id}})">Decline</a>
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
