@extends('frontend.layouts.user_dashboard_layout')

@section('title', 'FreelanceEP')
@section('body')
<!-- comma seperated input css -->
	<link rel="stylesheet" href="{!! asset('assets/frontend/css/bootstrap-tagsinput.css') !!}">
	 <script type="text/javascript" src= "{!! asset('assets/frontend/js/bootstrap-tagsinput.min.js') !!}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <!-- comma seperated input css -->
<div class="banner_search">
				<h1><?php echo $pageTitle; ?></h1>				
			</div>	
			<div class="search_main">
				<div class="container">
					<div class="row">
						 @include("frontend.layouts.user_dashboard_sidebar")
						<div class="col-12 col-md-8 col-lg-8 col-sm-7">
							@if(session("msg"))
                                        <div class="alert-dismiss">
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <span>{{session("msg")}}</span><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span> </button><br/>
                                            </div>
                                        </div>
                            @endif
							 @if(session("errormsg"))
                                        <div class="alert-dismiss">
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <span>{{session("errormsg")}}</span><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span> </button><br/>
                                            </div>
                                        </div>
                            @endif						
							@if(count($errors)>0)
                                        <div class="alert-dismiss">
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                @foreach($errors->all()  as $k=>$error)
                                                    <span>{{$error}}</span><br/>
                                                @endforeach
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span class="fa fa-times"></span>
                                                </button>
                                            </div>
                                        </div>
                                        @endif
							<div class="edit_user_profile">
								<div class="form_inner_section">
									<form class="needs-validation" novalidate="" id="my-form" method="post" action="{{route('saveuserdata')}}" enctype = "multipart/form-data">
										{!!csrf_field()!!}
										<div class="row">
											<div class="col-md-12">
												<h3>Edit Your Info</h3>
												<?php
								                $UserSkillData = array();
								                if(isset($user->skill_detail) && !empty($user->skill_detail)){
								                    foreach($user->skill_detail as $key=>$obj) {
								                      $UserSkillData[] = $obj->skill_id;
								                    }
								                }
                							?>
											</div>
											<div class="col-md-6">
												<label for="place">First Name</label>
												<div class="form-group">
													<input type="text" name="first_name" placeholder="Your First Name" value="{{$user->first_name}}" class="form-control">
													{!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-6">
												<label for="place">Last Name</label>
												<div class="form-group">
													<input type="text" name="last_name" placeholder="Your Last Name" value="{{$user->last_name}}" class="form-control">
													{!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-6">
												<label for="place">Phone Number</label>
												<div class="form-group">
													<input type="text" name="phone" placeholder="Your Number" value="{{$user->phone}}" class="form-control">
													{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-6">
												<label for="place">Email</label>
												<div class="form-group">
													<input type="email" name="email" placeholder="Your Email Id" value="{{$user->email}}"class="form-control">
													{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-6">
												<label for="place">Gender</label>
												<div class="form-group">
													<select class="form-control" id="gender" name="gender">
												  	
                                                <option value="">Select gender</option>
                                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }} >Male</option>
                                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                               
												  </select>
												  {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-6">
											 <label for="dob">Date Of Birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob" value="{{ $user->dob }}" required="">
                                             {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
                                            </div>
                                            <div class="col-md-6">
											 <label for="dob">Price/hour</label>
                                            <input type="number" class="form-control" id="price" name="price" value="{{ $user->price }}" required="">
                                            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                                            </div>
                                            <div class="col-md-6">
												<label for="place">Country</label>
												<div class="form-group">
													 <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="{{ $user->country }}" required="">
													 {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
													
												</div>
											</div>
											<div class="col-md-6">
												<label for="place">State</label>
												<div class="form-group">
													<input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="{{ $user->state }}" required="">
													 {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
													
												</div>
											</div>
											<div class="col-md-6">
												<label for="place">City</label>
												<div class="form-group">
													<input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{ $user->city }}" required="">
													 {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
													
												</div>
											</div>
											 <div class="col-md-12">
												<label for="place">Address</label>
												<div class="form-group">
													<input type="text" id="address_line_1" name="address_line_1" placeholder="Enter Address Line 1" value="{{ $user->address_line_1 }} " required="" class="form-control">
													 {!! $errors->first('address_line_1', '<p class="help-block">:message</p>') !!}
													
												</div>
											</div>
											<div class="col-md-6">
												<label for="place">Pincode</label>
												<div class="form-group">
													<input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter pincode" value="{{ $user->pincode }}" required="">
													 {!! $errors->first('pincode', '<p class="help-block">:message</p>') !!}
													
												</div>
											</div>
											<div class="col-md-6">
												<label for="place">Work Experience</label>
												<div class="form-group">
													<input type="text" name="work_experience" placeholder="Work Experiance" value="{{ $user->work_experience }}" class="form-control">
													 {!! $errors->first('work_experience', '<p class="help-block">:message</p>') !!}
													
												</div>
											</div>
											
											<div class="col-md-12">
												<label for="place">About me</label>
												<div class="form-group">
													<textarea name="about" placeholder="Personal Information" value="" class="form-control" rows="7">{{$user->about}}
													</textarea>
													  {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											
											<div class="col-md-6">
												<label for="place">Skills</label>
                                            <select class="form-control  selectpicker" id="skill" name="skill[]"  required="" multiple>
                                                @foreach($skill_list as $key=>$skill)
                                                <option value="{{$key}}" <?php if(in_Array($key, $UserSkillData)){ echo "selected";}?>
                                               >{{$skill}}</option>
                                                @endforeach 
                                            </select>
                                             {!! $errors->first('skill', '<p class="help-block">:message</p>') !!}
											</div>
											<div class="col-md-6">
												<label for="place">Category</label>
												<div class="custom-multifield">
												  <select class="form-control" id="category_id" name="category_id">
												  	  @foreach($category_list as $key=>$category)
                                                <option value="{{$key}}" {{ $user->category == $key ? 'selected' : '' }}> {{$category}}</option>
                                                @endforeach
												  </select>
												   {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-12">
												<label for="place">Date of Non Availability</label>
												<div class="custom-multifield">
													<input name="non_availability_dates" type="text" class="form-control date" placeholder="Pick the multiple dates" value="{{$user->non_availability_dates}}">
													  {!! $errors->first('non_availability_dates', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-12">
												<label for="pincode">Travel Pincode</label>
												<div class="custom-multifield">
													<input name="available_pincodes" type="text" 
													value="{{$user->available_pincodes}}" data-role="tagsinput" id="available_pincodes" />
													 {!! $errors->first('available_pincodes', '<p class="help-block">:message</p>') !!}
                                                    <div class="invalid-feedback">
                                                Please provide a valid image.
                                            </div>
												</div>
											</div>
											<div class="col-md-12">
												<label for="pincode">Available cities</label>
												<div class="custom-multifield">
													<input name="available_cities" type="text" 
													value="{{$user->available_cities}}" data-role="tagsinput" id="available_cities" />
													 {!! $errors->first('available_cities', '<p class="help-block">:message</p>') !!}

												</div>
											</div>
											<div class="col-md-12">
												<label for="weapons">Weapons list:</label>
												<div class="custom-multifield">
												  <select name="weapon_id" class="form-control" id="weapon_id">
												    <option value="0"> No Weapon</option>
                                                @foreach($weapon_list as $key=>$weapon)
                                                <option value="{{$key}}" {{ $user->weapon_id == $key ? 'selected' : '' }}> {{$weapon}}</option>
                                                @endforeach 
												  </select>
												   {!! $errors->first('weapon_id', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-6">
												<label for="weapon_number">Weapon Number</label>
												<div class="custom-multifield">
												<input type="text" class="form-control" id="weapon_number" name="weapon_number" placeholder="Enter weapon number" value="{{ $user->weapon_number }}">
												   {!! $errors->first('weapon_number', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-6">
												<label for="weapon_document">Weapon Document</label>
												<div class="custom-multifield">
												 <input type="file" class="form-control" id="weapon_document" name="weapon_document">
												   {!! $errors->first('weapon_document', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-6">
												<label for="weapon_number">Weapon Valid From</label>
												<div class="custom-multifield">
												<input type="date" class="form-control" id="weapon_valid_from" name="weapon_valid_from" placeholder="Choose date" value="{{ $user->weapon_valid_from }}">
												   {!! $errors->first('weapon_valid_from', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-6">
												<label for="weapon_document">Weapon  Valid Upto</label>
												<div class="custom-multifield">
												 <input type="date" class="form-control" id="weapon_valid_upto" name="weapon_valid_upto" placeholder="Choose date" value="{{ $user->weapon_valid_upto }}">
												   {!! $errors->first('weapon_valid_upto', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-12">
												<label for="setting-btn">Setting Button</label>
												<div class="custom-multifield">
													<button type="button" class="btn btn-lg btn-toggle setting_btn {{ $user->is_online == 1 ? 'active' : ''}}"" id="setting-btn" data-toggle="button" aria-pressed="false" autocomplete="off">
														<div class="handle"></div>
													</button>
													<input type="hidden" id="is_online" name="is_online" value="{{ $user->is_online }}">
												</div>
											</div>
											<div class="col-md-12 text-center">
												<button type="submit" class="formsubmit_btn">Submit</button>
											</div>
										</div>
										
									</form>
								</div>
							</div>

						</div>
			</div>
		</div>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $(function () {
    $('.selectpicker').selectpicker();
});
</script>
			<script>
				$('.date').datepicker({
				  multidate: true,
					format: 'dd-mm-yyyy'
				});
				$(".setting_btn").click(function(){
					var is_on = $("#is_online").val();
					if(is_on == '0'){
						$("#is_online").val('1');
					}else{
						$("#is_online").val('0');
					}
				});

			</script>

@endsection
