@extends('frontend.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')

<div class="banner_search">
	<h1>Search Result</h1>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
		<li class="breadcrumb-item active">Freelancers</li>
		
	</ul>
</div>	
<div class="search_main">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4 col-lg-4 col-sm-5">

				<div class="filters">
					<h2>Categories</h2>
					<!--<form class="form-inline">
						<input class="form-control" type="search" placeholder="Search Categories" aria-label="Search">
						<a class="submit_btn"><img src="{!! asset('assets/frontend/img/search.png') !!}" width="18px"></a>
					</form>-->
					<?php 
						if(!empty($category_list)){
					?>
					<form class="form-inline" id="searchgaurd" onsubmit="searchgaurd(this, event)">
						<input type="hidden" name="action" value="search_gaurd">
						<input type="hidden" name="page" value="1" id="page">

						{!!csrf_field()!!}
					<ul>
						<?php 
							foreach($category_list as $key=>$val){
							?>
							<li>
								<div class="filt_name">
									<input type="checkbox" id="{{$val}}" name="category[]" 
									value="{{$key}}" class="searchressub">
									<label for="{{$val}}">{{$val}}</label>
								</div>
							</li>
							<?php	
							}
						?>
					</ul>
					<?php	
						}
					?>
				</div>	<!-- filters -->
				<div class="filters">
					<h2>Hourly Rate</h2>								
					<ul>
						<li>
							<div class="filt_name">
								<input type="checkbox" id="ten_below" name="price[]" value="0-10" class="searchressub">
								<label for="ten_below">$10 and Below</label>
							</div>
						</li>
						<li>										
							<div class="filt_name">
								<input type="checkbox" id="10_30" name="price[]" value="10-30"class="searchressub" class="searchressub">
								<label for="10_30">$10-$30</label>
							</div>
						</li>
						<li>										
							<div class="filt_name">
								<input type="checkbox" id="30_60" name="price[]" value="30-60" class="searchressub">
								<label for="30_60">$30-$60</label>
							</div>
						</li>
						<li>										
							<div class="filt_name">
								<input type="checkbox" id="60_90" name="price[]" value="60-90" class="searchressub">
								<label for="60_90">$60-$90</label>
							</div>
						</li>
						<li>										
							<div class="filt_name">
								<input type="checkbox" id="90_above" name="price[]" value="90-90000000" class="searchressub">
								<label for="90_above">$90 & Above</label>
							</div>
						</li>
					</ul>
				</div>	<!-- filters -->					
				<div class="filters">
					<h2>Gender</h2>								
					<ul>
						<li>
							<div class="filt_name">
								<input type="checkbox" id="male" name="gender[]" value="Male" class="searchressub">
								<label for="male">Male</label>
							</div>
						</li>
						<li>										
							<div class="filt_name">
								<input type="checkbox" id="female" name="gender[]" value="Female" class="searchressub">
								<label for="female">Female</label>
							</div>
						</li>
					</ul>
				</div>	<!-- filters -->
				<div class="filters">
					<h2>Armor</h2>	
					<?php 
						if(!empty($weapon_list)){
					?>
					<ul>
						<?php 
							foreach($weapon_list as $key=>$val){
							?>
							<li>
							<div class="filt_name">
								<input type="checkbox" id="{{$val}}" name="weapon[]" value="{{$key}}" class="searchressub">
								<label for="{{$val}}">{{$val}}</label>
							</div>
						</li>
							<?php	
							}
						?>
					</ul>
					<?php	
						}
					?>
				</div>	<!-- filters -->	
				<!--<div class="filters">
					<h2>Duration</h2>								
					<ul>
						<li>
							<div class="filt_name">
								<input type="checkbox" id="one_day" name="duration[]" value="One Day" class="searchressub">
								<label for="one_day">One Day</label>
							</div>
						</li>
						<li>										
							<div class="filt_name">
								<input type="checkbox" id="one_week" name="duration[]" value="One Week" class="searchressub">
								<label for="one_week">One Week</label>
							</div>
						</li>
						<li>										
							<div class="filt_name">
								<input type="checkbox" id="one_month" name="duration[]" value="One Month" class="searchressub">
								<label for="one_month">One Month</label>
							</div>
						</li>
						<li>										
							<div class="filt_name">
								<input type="checkbox" id="one_year" name="duration[]" value="One Year" class="searchressub">
								<label for="one_year">One Year</label>
							</div>
						</li>									
					</ul>
					<a href="#">Customize Duration...</a>
				</div>-->
					
				</form>											
			</div>
			<div class="col-12 col-md-8 col-lg-8 col-sm-7">
				<div class="search-gaurd-data">
				@include('ajax_gaurd_view')
				</div>	
			</div>
		</div>
	</div>
</div>

@endsection

<style type="text/css">
	.page-item.active .page-link {
		color: #fff !important;
	}

</style>

