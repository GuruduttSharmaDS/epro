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
											<th>Price</th>
											<td width="40px" align="Center">:</td>
											<td> $ {{$user->price}}</td>
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
											<th>Category</th>
											<td width="40px" align="Center">:</td>
											<td>
											@if(isset($user->category_detail->category_name) && !empty($user->category_detail->category_name)
											)
												{{$user->category_detail->category_name}}
											@else
											N/A
											@endif
											</td>
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
										<tr>
											<th>Date of non-Availability</th>
											<td width="40px" align="Center">:</td>
											<td>{{$user->non_availability_dates}}</td>
										</tr>
										<tr>
											<th>Travel Pincode</th>
											<td width="40px" align="Center">:</td>
											<td>{{$user->available_pincodes}}</td>
										</tr>
										<tr>
											<th>Skills</th>
											<td width="40px" align="Center">:</td>
											<td>
												<?php
											 $Skills = user_skill_data($user->id);
											 $count = count($Skills);
										     $k = 1;
											 foreach($Skills as $skill){
												 if($k== $count){
													echo $skill->skill_data->skill;

												 }else{
													echo $skill->skill_data->skill.", ";

												 }
												$k++;
												}
										
											?>
											</td>
										</tr>
										<tr>
											<th>Weapon:</th>
											<td width="40px" align="Center">:</td>
											<td>{{ $user->weapon_detail->weapon_name}}</td>
										</tr>
									</table>
									<h3>About me</h3>
									<p>{{ $user->about}}</p>
								</div>
							</div>

						</div>

						<!--<div class="col-12 col-md-8 col-lg-8 col-sm-7">
							 <a href="{{route('user-edit-profile')}}">Edit Profile</a>
							<div class="hire_companies">
								<label>Name : {{ $user->first_name.' '.$user->last_name }}</label>
								<label>Email : {{ $user->email}}</label>
								<label>Category : @if(!empty($user->category_detail)){{ $user->category_detail->category_name }}@endif</label>
								<label>Price : ${{ $user->price}}/hr</label>
								<label>Pincode : ${{ $user->pincode}}/hr</label>
								<label>Price : ${{ $user->price}}/hr</label>
								<label>About me : ${{ $user->about}}/hr</label>

							</div>
						</div>-->
					</div>
				</div>
			</div>

@endsection
