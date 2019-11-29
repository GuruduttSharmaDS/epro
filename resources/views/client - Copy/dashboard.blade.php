@extends('client.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')

				<!--Register Form Start-->
				<section class="wt-haslayout wt-dbsectionspace wt-insightuser">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
							<div class="wt-dashboardbox">
								<div class="wt-dashboardboxtitle wt-yeartag">
									<h2>Total Earnings</h2>
									<div class="wt-tag wt-widgettag">
										<a href="javascript:void(0);">2019</a>
										<a href="javascript:void(0);">2018</a>
										<a href="javascript:void(0);">2017</a>
									</div>
								</div>
								<div class="wt-dashboardboxcontent">
									<div class="wt-jobchartholder">
										<canvas id="wt-jobchart" class="wt-jobchart"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="ccol-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
							<div class="row">
								<div class="wt-dashboardsaveholder wt-dashboardsave">
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 float-left">
										<div class="wt-proposalsr wt-box-shadow mb-2">
											<div class="wt-proposalsrcontent wt-repostjob">
												<figure>
													<img src="{!! asset('assets/client') !!}/images/thumbnail/img-15.png" alt="image">
												</figure>
												<div class="wt-title">
													<h3>{{isset($statisticsData['totaljobs'])?$statisticsData['totaljobs']:0}}</h3>
													<span>Total Jobs</span>
												</div>
											</div> 
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 float-left">
										<div class="wt-proposalsr wt-box-shadow mb-2">
											<div class="wt-proposalsrcontent wt-repostjob">
												<figure>
													<img src="{!! asset('assets/client') !!}/images/thumbnail/img-16.png" alt="image">
												</figure>
												<div class="wt-title">
													<h3>{{isset($statisticsData['pendingbids'])?$statisticsData['pendingbids']:0}}</h3>
													<span>Total Pending Bids</span>
												</div>
											</div> 
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 float-left">
										<div class="wt-proposalsr wt-box-shadow mb-2">
											<div class="wt-proposalsrcontent wt-repostjob">
												<figure>
													<img src="{!! asset('assets/client') !!}/images/thumbnail/img-17.png" alt="image">
												</figure>
												<div class="wt-title">
													<h3>334</h3>
													<span>Total Repost Jobs</span>
												</div>
											</div> 
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 float-left">
										<div class="wt-proposalsr wt-box-shadow mb-2">
											<div class="wt-proposalsrcontent wt-repostjob">
												<figure>
													<img src="{!! asset('assets/client') !!}/images/thumbnail/img-18.png" alt="image">
												</figure>
												<div class="wt-title">
													<h3>334</h3>
													<span>Total Repost Jobs</span>
												</div>
											</div> 
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 float-left">
										<div class="wt-proposalsr wt-box-shadow mb-2">
											<div class="wt-proposalsrcontent wt-repostjob">
												<figure>
													<img src="{!! asset('assets/client') !!}/images/thumbnail/img-19.png" alt="image">
												</figure>
												<div class="wt-title">
													<h3>334</h3>
													<span>Total Repost Jobs</span>
												</div>
											</div> 
										</div>
									</div>	
								</div>							
							</div>						
						</div>												
					</div>
				</section>
				<!--Register Form End-->	


@endsection
