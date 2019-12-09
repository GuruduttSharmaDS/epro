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
							<div class="hire_companies work_history task-details">
								<h2> {{$job_detail->title}}</h2>
								<h3>Category Name : {{$job_detail->category_name}}</h3>
								<p>{{$job_detail->address}}, {{$job_detail->city}},
								{{$job_detail->state}}, 
								{{$job_detail->country}}</p>
								<p>Pincode:  {{$job_detail->pincode}}</p>
								<time class="calen"><img src="{!! asset('assets/frontend/img/cal.svg') !!}" alt="">{{date('d/m/Y', strtotime($job_detail->job_start_on))}} - {{date('d/m/Y', strtotime($job_detail->job_end_on))}}</time>
								<p>Working Hour : {{$job_detail->working_hour}} hour
								</p>
								<p>Offer Type: @if($job_detail->price_type == 0)
								{{'Fixed'}}
								@else
								{{'Open'}}
								@endif
								</p>
								<p>Price : {{Config::get('app.site_currency')}} {{$job_detail->price}}</p>
								<p>Job Status : <?php
										if($job_detail->job_status == 0){
											echo "Pending";
										}else if($job_detail->job_status == 1){
											echo "Accepted";
										}else{
											echo "Declined";
										}
										?></p>

								<p>Payment Status : @if($job_detail->is_payment == 1)
								{{'Done'}}
								@else
								{{"Pending"}}
								@endif
								</p>
								<p class="discription">
								{{$job_detail->description}}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

@endsection
