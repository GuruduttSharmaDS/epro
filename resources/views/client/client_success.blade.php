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
							<div class="hire_companies work_history current_task">
						
								
							</div>
						</div>
					</div>
				</div>
			</div>

@endsection
