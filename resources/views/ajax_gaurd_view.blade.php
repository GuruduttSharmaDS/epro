<div class="total_search">
	<?php if (isset($_POST) && !empty($_POST)) { ?>
		<div class="total_filter">
			<ul>
				<?php
				if (isset($_POST['category']) && !empty($_POST['category'])) { 
					foreach($_POST['category'] as $category){
						$category = user_category_data($category);
						echo "<li>".$category->category_name."</li>";
					}
				}
				?>

				<?php
				if( isset($_POST['price']) && !empty($_POST['price'])){
					foreach($_POST['price'] as $price){
						echo "<li>".$price."</li>";
					}
				}
				?>

				<?php
				if( isset($_POST['gender']) && !empty($_POST['gender'])){
					foreach($_POST['gender'] as $gender){
						echo "<li>".$gender."</li>";
					}
				}
				?>

				<?php
				if(  isset($_POST['duration']) && !empty($_POST['duration'])){
					foreach($_POST['duration'] as $duration){
						echo "<li>".$duration."</li>";
					}
				}
				?>

				<?php
				if( isset($_POST['weapon']) &&  !empty($_POST['weapon'])){
					foreach($_POST['weapon'] as $weapon){
						$weapon= user_weapon_data($weapon);
						echo "<li>".$weapon->weapon_name."</li>";
					}
				}
				?>																			
			</ul>
			
			<a href="{{route('search-result')}}"><i class="fas fa-times-circle"></i> Clear all Filters</a>
		</div>
	<?php } ?>								
</div>
							
<?php
if(!empty($users)) {
	if(!empty($user->image)){
		$img = $user->image;
	} else {	
		$img = 'no-img.png';
	}
?>

@foreach($users as $user)
	<div class="freelancer_list">

		<div class="profile">
			<div class="img_fP">
				<img src="{{asset('/uploads/user_images/'.$img)}}" alt="">
			</div>

			<div class="name_loct">
									
					
				<h4>
				@if(!empty($user->category_detail)) 
					{{ $user->category_detail->category_name }}
				@endif
				</h4>

				<!-- Location -->
				<div class="location">
					<div class="locktion2">
						<h3>
							<a class="checkuserLogin" href="{{asset('/gaurd-detail/'.$user->id)}}"> 
								{{ ucfirst ($user->first_name).' '. ucfirst ($user->last_name)}}
							</a> 

							@if ($user->is_user_verified == '1')
								<span class="verified"><i class="fas fa-check"></i> Verified</span>
							@endif 
						</h3>
					</div>

					<div class="loc-box">
						<h4>
							<span><img src="{!! asset('assets/frontend/img/loct.png') !!}" alt="Location"> Location</span>
							<b>{{ $user->country }}</b>
						</h4>
						<h4>
							<span><img src="{!! asset('assets/frontend/img/rate_img.png') !!}" alt="Rate"> Rate</span>
							<b>$ {{ $user->price}}/hr </b>
						</h4>
					</div>
				</div>
			</div>

			<div class="star_rate">
				<div class="rating">
					<?php 
						$result  = getUserTotalRating($user->id); 
					?>
					
					<h3>{{$result->average_rating}}</h3>
					<ul>
						<?php
						for($i=1;$i<=$result->average_rating;$i++){
							?>
						<li><i class="fas fa-star"></i></li>		
						<?php
						}
						?>
					</ul>
				</div>
				<?php 
				if($result->totalreview > 0){
					?>
				<h4>({{$result->totalreview}}  Feedbacks)</h4>
				<?php
				}
				?>

			</div>
		</div>
		<div class="details">
			<p>{{$user->about}}</p>
			<?php

			$skills = user_skill_data($user->id);
			if(!empty($skills)){
				?>
				<div class="soft_skills">
				<ul>
				@foreach ($skills as $skill)
				<li>{{$skill->skill_data->skill}}</li>
				@endforeach
				</ul>
				</div>	
			<?php	
			}
				?>
		</div>
	</div>
@endforeach

<div class="paginating">
	<ul class="pagination searchpagination">
		{{ $users->links() }}	
	</ul>
</div>

<?php } else { echo "no record found"; } ?>

							
							<style>
.location {
    display: flex;
    text-align: center;
    font-family: 'Roboto', sans-serif;
    width: 90%;
    justify-content: space-between;
    margin: 0 auto;
    flex-direction: column;
}
.loc-box {
    display: flex;
}
.profile .name_loct h4 {
    font-size: 16px;
    color: #7a7a7a;
    margin-right: 23px;
}

							</style>