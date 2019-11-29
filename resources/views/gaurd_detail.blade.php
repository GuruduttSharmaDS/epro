@extends('frontend.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')
 <div class="banner_search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="user_info">
                                <div class="user_img">
                                     <?php
                                        if(!empty($gaurd->image)){
                                            $img = $gaurd->image;
                                        }else{
                                            $img = 'no-img.png';

                                        }
                                      ?>
                                    <img src="{{asset('/uploads/'.$img)}}" alt="user image" class="img-fluid">
                                </div>
                                <div class="profile_details">
                                    <h2>{{$gaurd->first_name.' '.$gaurd->last_name}}</h2>
                                    @if(!empty($gaurd->category_detail))<h4>{{ $gaurd->category_detail->category_name }}</h4>@endif
                                    <h4><b>{{$total_count->average_rating}}</b> gaurd({{$total_count->totalreview}} Feedbacks)</h4>
                                    <h3><span><i class="fas fa-map-marker-alt"></i></span> {{ $gaurd->country }} @if($gaurd->is_user_verified == '0')
                                        <strong> Verified</strong>
                                        @endif </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="profile_main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="about_me">
                                <h2>About Me</h2>                               
                                <p><?php if(!empty($gaurd->about)){
                                    echo $gaurd->about;
                                }else{
                                    echo "No data found";

                                }

                                ?>

                                </p>
                            </div>
                            <div class="work_history">
                                <h2><i class="far fa-thumbs-up"></i> Work History and Feedback</h2>

                                <?php 
                                if(!empty($reviews)){
                                    foreach($reviews as $review){
                                ?>

                                     <div class="work_post">
                                    <h3><?php 
                                    if(isset($review->job_detail->category_id)){
                                         $cat_data = user_category_data($review->job_detail->category_id);
                                        echo  $cat_data->category_name;    
                                    }
                                   
                                    ?></h3>
                                    <!--<h5>Rated as Freelancer</h5>-->
                                    <div class="rating">
                                        <h3>{{$review->rating}}</h3>
                                        <ul>
                                           
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <div class="calend"><i class="far fa-calendar-alt"></i> {{$review->created_at}}</div>
                                    </div>
                                    <p>{{$review->review}}</p>
                                </div>


                                    <?php   
                                    }?>
                                     <ul class="pagination">
                                        {{ $reviews->links() }}
                                </ul>
                                <?php
                                }else{
                                    echo "No Feedback found";
                                }
                                ?>
                        </div>
                    </div>
                        <div class="col-md-4">
                            <div class="statistics">
                                <h3><strong>${{ $gaurd->price}}</strong><br>Hourly Rate</h3>
                                <h3><strong>{{$job_done_count}}</strong><br>Jobs Done</h3>
                                <h3><strong>22</strong><br>Rehired</h3>
                            </div>
                            <h5 class="name_desg"><a href="#" sendOfferModel data-toggle="modal" data-target="#sendOfferModel">Make a Offer</a></h5>
							<h5 class="name_desg"><a href="#" sendOfferModel data-toggle="modal" data-target="#sendOfferModel"></a></h5>
                            <div class="achieve">
                                <h3>Skills</h3>
                                <ul>
                                    <?php

                                    $skills = user_skill_data($gaurd->id);
                                    if(!empty($skills->skill_data)){
                                        ?>
                                        <div class="soft_skills">
                                        <ul>
                                        @foreach ($skills as $skill)
                                        <li>{{$skill->skill_data->skill}}</li>
                                        @endforeach
                                        </ul>
                                        </div>  
                                    <?php   
                                    }else{
                                        echo "No data found";
                                    }
                                     ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="modal fade" id="sendOfferModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	   <form action="#" id="jobsubmit" class="needs-validation" onsubmit="jobsubmit(this,event)" novalidate>
       @csrf
	   <div class="modal-body">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Job Title:</label>
            <input type="text" value="" name="title" id="title" />
          </div>
		   <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category:</label>
            <select class="form-control" id="category" name="category">
                <option value="">Select Category</option>
				
            </select>
          </div>
		   <div class="form-group">
            <label for="address" class="col-form-label">Address:</label>
           <textarea class="form-control" id="address" name="address"></textarea>
			
          </div>
		   <div class="form-group">
            <label for="country" class="col-form-label">Country:</label>
            <input type="text" value="" name="country" id="country" />
			
          </div>
		   <div class="form-group">
            <label for="state" class="col-form-label">State:</label>
            <input type="text" value="" name="state" id="state" />
			
          </div>
		   <div class="form-group">
            <label for="city" class="col-form-label">City:</label>
            <input type="text" value="" name="city" id="city" />
			
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Job Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary jbsubmit">Submit</button>
      </div>
	    </form>
    </div>
  </div>
</div>
<!-- job request popup -->
<div class="modal job-request-popup" id="sendOfferModel">
	<div class="modal-dialog  modal-dialog-centered ">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h1 class="modal-title">Job Request</h1>
				<button type="button" class="close" data-dismiss="modal"  title="close popup"><img src="img/X.png" alt="close form"></button>
			</div>

			<div class="login_form">
				<form action="#" id="jobsubmit" class="needs-validation" onsubmit="jobsubmit(this,event)" novalidate>
				@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="job-title">Job Title:</label>
								<input type="text" class="form-control" id="job-title"  name="" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="category">Category:</label>
								<select class="form-control" id="category" required>
									<option></option>
									<option>abc</option>
									<option>abc</option>
									<option>abc</option>
								</select>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please Select any Category.</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="country">Country:</label>
								<input type="text" class="form-control" id="country"  name="" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="city">City:</label>
								<input type="text" class="form-control" id="city" name="" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="state">State:</label>
								<input type="text" class="form-control" id="state" name="" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="address">Address:</label>
								<input type="text" class="form-control" id="address" name="" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="JobDes">Job description:</label>
								<textarea class="form-control" id="JobDes" name="" rows="6" required></textarea>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="start_date">Start Date:</label>
								<input type="text" class="form-control start_date" id="start_date" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please Select Start Date.</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="end_date">End Date:</label>
								<input type="text" class="form-control end_date" id="end_date" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please Select End Date.</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="pr-type">Price Type:</label>
								<input type="text" class="form-control" id="pr-type" name="" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="price">Price:</label>
								<select class="form-control" id="price" required>
									<option></option>
									<option>500</option>
									<option>1000</option>
									<option>1200</option>
								</select>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please Select Price.</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div> 
		</div>
	</div>
</div>
<div class="modal fade" id="sendOfferModeld" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Task:</label>
            <select class="form-control" id="task">
                <option value="">Select Task</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

@endsection
