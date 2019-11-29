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
									<form class="needs-validation" novalidate="" id="my-form" method="post"  enctype = "multipart/form-data">
										{!!csrf_field()!!}
										<div class="row">
											<div class="col-md-12">
												<label for="place">Old Password</label>
												<div class="form-group">
													<input type="text" name="old_password" placeholder="Your old password" value="" class="form-control">
													{!! $errors->first('old_password', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-12">
												<label for="place">New Password</label>
												<div class="form-group">
													<input type="password" name="new_password" placeholder="Your new password" value="" class="form-control">
													{!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
												</div>
											</div>
											<div class="col-md-12">
												<label for="place">Confirm Password</label>
												<div class="form-group">
													<input type="text" name="confirm_password" placeholder="Your confirm password" value="" class="form-control">
													{!! $errors->first('confirm_password', '<p class="help-block">:message</p>') !!}		
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
