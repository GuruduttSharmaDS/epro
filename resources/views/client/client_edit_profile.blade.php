@extends('client.layouts.client_dashboard_layout')

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
						 @include("client.layouts.client_dashboard_sidebar")
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
									<form class="needs-validation" novalidate="" id="my-form" method="post" action="{{route('saveclientdata')}}" enctype = "multipart/form-data">
										{!!csrf_field()!!}
										<div class="row">
											<div class="col-md-12">
												<h3>Edit Your Info</h3>
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
											 <div class="col-md-12">
												<label for="place">Address</label>
												<div class="form-group">
													<input type="text" id="address_line_1" name="address_line_1" placeholder="Enter Address Line 1" value="{{ $user->address_line_1 }} " required="" class="form-control">
													 {!! $errors->first('address_line_1', '<p class="help-block">:message</p>') !!}
													
												</div>
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
											
											<div class="col-md-6">
												<label for="place">Pincode</label>
												<div class="form-group">
													<input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter pincode" value="{{ $user->pincode }}" required="">
													 {!! $errors->first('pincode', '<p class="help-block">:message</p>') !!}
													
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
			</script>

@endsection
