<div class="col-12 col-md-4 col-lg-4 col-sm-5">
							<div class="d_board_prof">
							<div class="profile">
								<div class="profile_img">
									<?php
									if(!empty($user->image)){
                                             $img = $user->image;
                                         }else{
                                          $img = 'no-img.png';

                                         }
                                         ?>
									<span><img id="preview_image" src="{{asset('/uploads/user_images/'.$img)}}" 
										alt="profile img">
									 <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>	
									</span>
										<a class="edit_imgicon" href="javascript:changeProfile()">
										<i class="fas fa-edit"></i>

									</a>
								</div>
								<div class="name_desg">
									<h2>{{$user->first_name.' '.$user->last_name}}</h2>
									<h3>@if(!empty($user->category_detail)){{ $user->category_detail->category_name }}@endif</h3>
									<a href="{{route('client-profile')}}">View Profile</a>
								</div>
							</div>
							<div class="other_links">
								<ul class="user-dashboard">
									<li class=""><a href="{{route('client-dashboard')}}"><i class="flaticon-dashboard"></i>Dashboard</a></li>
									<li class=""><a href="{{route('client-edit-profile')}}"><i class="flaticon-man-user"></i>Edit profile</a></li>
									<!--<li class=""><a href=""><i class="flaticon-bookmark-star"></i>Bookmarks</a></li>-->
									<li class=""><a href="{{route('client-change-password')}}"><i class="flaticon-lock"></i>Change Password</a></li>
									<li class=""><a href="javascript:void(0);"><i class="flaticon-time"></i>History</a></li>
									<li class=""><a href="javascript:void(0);"><i class="flaticon-time"></i>Job Request</a></li>
									<li class=""><a href="javascript:void(0);"><i class="flaticon-task-complete"></i>tasks</a></li>
									<li><a href="{{route('logoutfront')}}"><i class="flaticon-logout"></i>logout</a></li>
								</ul>
							</div>
						</div>
					</div>

					<input type="file" id="file" style="display: none"/>
    <input type="hidden" id="file_name"/>
					<script>
   function changeProfile() {
        $('#file').click();
    }
    $('#file').change(function () {
        if ($(this).val() != '') {
            upload(this);

        }
    });
    function upload(img) {
        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');
        $('#loading').css('display', 'block');
        $.ajax({
            url: "{{url('ajax-client-image-upload')}}",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    alert(data.errors['images']);
                }
                else {
                    $('#file_name').val(data);
                    $('#preview_image').attr('src', '{{asset('/uploads/user_images/')}}/' + data);
                }
                $('#loading').css('display', 'none');
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
                $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
            }
        });
    }

   
</script>