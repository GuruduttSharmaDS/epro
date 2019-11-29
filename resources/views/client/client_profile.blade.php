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
							<?php //echo  "<pre>";print_r($user);?>
							<div class="edit_user_profile">
								<div class="profile_inner_section">
									<table class="table view_profile_table">
										<tr>
											<th>Your Name</th>
											<td width="40px" align="Center">:</td>
											<td>{{ $user->first_name.' '.$user->last_name }}</td>
										</tr>
										
										<tr>
											<th>Mobile Number</th>
											<td width="40px" align="Center">:</td>
											<td>{{$user->phone}}</td>
										</tr>
										<tr>
											<th>Email ID</th>
											<td width="40px" align="Center">:</td>
											<td>{{ $user->email}}</td>
										</tr>
										<tr>
											<th>Gender</th>
											<td width="40px" align="Center">:</td>
											<td>{{$user->gender}}</td>
										</tr>
										<tr>
											<th>Address</th>
											<td width="40px" align="Center">:</td>
											<td>{{$user->address_line_1}}  {{$user->address_line_2}}</td>
										</tr>
										<tr>
											<th>Country</th>
											<td width="40px" align="Center">:</td>
											<td>{{$user->country}}</td>
										</tr>
										<tr>
											<th>City</th>
											<td width="40px" align="Center">:</td>
											<td>{{$user->city}}</td>
										</tr>
										<tr>
											<th>Pincode</th>
											<td width="40px" align="Center">:</td>
											<td>{{$user->pincode}}</td>
										</tr>
									</table>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

@endsection
