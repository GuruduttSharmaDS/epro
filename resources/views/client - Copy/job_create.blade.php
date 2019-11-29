@extends('client.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')

				<!--Register Form Start-->
				<section class="wt-haslayout wt-dbsectionspace wt-insightuser">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<form class="wt-formtheme wt-userform">
								<fieldset>
									<div class="form-group form-group-half">
										<span class="wt-select">
											<select>
												<option value="" disabled="">Select Gender</option>
												<option value="">Male</option>
												<option value="">Female</option>
											</select>
										</span>
									</div>
									<div class="form-group form-group-half">
										<input type="text" name="first name" class="form-control" placeholder="First Name">
									</div>
									<div class="form-group form-group-half">
										<input type="email" name="last name" class="form-control" placeholder="Last Name">
									</div>
									<div class="form-group form-group-half">
										<input type="number" name="rate" class="form-control" placeholder="Your Service Hourly Rate ($)">
									</div>
									<div class="form-group">
										<input type="text" name="tagline" class="form-control" placeholder="Add Your Tagline Here">
									</div>
									<div class="form-group">
										<textarea name="message" class="form-control" placeholder="Description"></textarea>
									</div>
								</fieldset>
							</form>
						</div>												
					</div>
				</section>
				<!--Register Form End-->	


@endsection