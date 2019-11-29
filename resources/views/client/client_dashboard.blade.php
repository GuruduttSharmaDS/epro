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
							<div class="total_tasks">
								<div class="jobs">
									<h3>complete Jobs</h3>
									<h4> <span><img src="{!! asset('assets/frontend/img/job.svg') !!}"></span></h4>
								</div>
								<div class="jobs reviews">
									<h3>Reviews</h3>
									<h4><span><img src="{!! asset('assets/frontend/img/reviews.svg') !!}"></span></h4>
								</div>
								<div class="jobs views">
									<h3>This Month Views</h3>
									<h4><span><img src="{!! asset('assets/frontend/img/views.svg') !!}"></span></h4>
								</div>
							</div>
							<!--<div class="revenue">
								<img src="{!! asset('assets/frontend/img/revenue.svg') !!}" class="img-fluid">
							</div>
							<!--<div class="hire_companies">
								<h2><img src="{!! asset('assets/frontend/img/hire.svg') !!}" alt=" Hire Companies"> Hire Companies</h2>

								<ul>
									<?php
									if(isset($HireComapny) && !empty($HireComapny)){
										foreach($HireComapny as $company){
									?>
									<li><span><img src="{!! asset('assets/frontend/img/hire.svg') !!}" alt=" Hire Companies"></span>
										<h3><b>{{$company->client_detail->first_name.' '.$company->client_detail->last_name}}</b>
										 	{{$company->client_detail->address_line_1}},
										 	{{$company->client_detail->pincode}}
										 	 {{$company->client_detail->city}}, {{$company->client_detail->country}}
										</h3>
									</li>
										<?php	
										}
									?>
										
                                    <?php
									}
									?>
								</ul>

								<?php 
								if(isset($HireComapny) && !empty($HireComapny)){
									?>
									 <ul class="pagination">
                                        {{ $HireComapny->links()}}
                                 	</ul>

								<?php
								}	
								?>
							</div>
							<div class="hire_companies work_history">
								<h2><img src="{!! asset('assets/frontend/img/w_history.svg') !!}" alt="work history and feedback">work history and feedback</h2>
								<ul>

									<?php 
									if(isset($reviews) && !empty($reviews)){
										foreach($reviews as $review){
									?>
									<li>
										<div class="posted">
										<h3><b>InterContinental Hotels Group</b>www.ihg.com / Denham,
										 	South East England, England, United Kingdom
										</h3>
										<time class="calen"><img src="{!! asset('assets/frontend/img/cal.svg') !!}" alt="">{{$review->created_at}}</time>
										</div>
										<div class="rating">
												<h3>{{$review->rating}}</h3>
											<ul>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
											</ul>
										</div>
										<p>{{$review->review}}
										</p>
									</li>
									<?php	
									}

									}

									?>
								</ul>
								<?php 
								if(isset($reviews) && !empty($reviews)){
									?>
									 <ul class="pagination">
                                        {{ $reviews->links()}}
                                 	</ul>

								<?php
								}	
								?>
							</div>-->
						</div>
					</div>
				</div>
			</div>

@endsection
