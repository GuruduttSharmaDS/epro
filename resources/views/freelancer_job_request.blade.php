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
										</h3>
										
										<time class="calen"><img src="{!! asset('assets/frontend/img/cal.svg') !!}" alt="">{{date('d/m/y', strtotime($job->job_start_on))}} - {{date('d/m/y', strtotime($job->job_end_on))}}
										
										</time>
										<h5>
										<?php
										if($job->job_status == 0){
											echo "Pending";
										}else if($job->job_status == 1){
											echo "Accepted";
										}else{
											echo "Declined";
										}
										?>
										</h5>
										

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
