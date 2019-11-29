@extends('frontend.layouts.layout')
@section('title', 'FreelanceEP')
@section('body')
<div class="banner_search">
				<h1><?php echo $pageTitle; ?></h1>				
			</div>	
			<div class="search_main">
				<div class="container">
					<div class="row">
						@yield('body')
					</div>
				</div>
			</div>

@endsection
