@extends("admin.layouts.layout")

@section("title","Admin Dashboard | Market Place")

@section("header-page-script")
    <!-- others css -->
    <link rel="stylesheet" href="{!! asset('assets/css/typography.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/default-css.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/styles.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/responsive.css') !!}">
    <!-- modernizr css -->
    <script src="{!! asset('assets/js/vendor/modernizr-2.8.3.min.js') !!}"></script>
@endsection
@section("content")            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route('dashboard') }}">Home</a></li>
                                <li><span>Users</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
           // echo "<pre>";
            //print_r($user->skill_detail); ?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                <?php
                $UserSkillData = array();
                if(isset($user->skill_detail) && !empty($user->skill_detail)){
                    foreach($user->skill_detail as $key=>$obj) {
                      $UserSkillData[] = $obj->skill_id;
                    }
                }
                ?>

               
                    <!-- Server side start -->
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-body">
                                <h4 class="header-title"><span>Update</span> User</h4>
                                <form class="needs-validation" novalidate="" id="my-form" method="post" action="{{route('saveuser')}}" enctype = "multipart/form-data">
                                    <input type="hidden" name="userid" value="{{ $user->id }}"> 
                                    @if(isset($user->auth_detail->password) 
                                        && !empty($user->auth_detail->password))
                                        <input type="hidden" name="authpass" value="{{ $user->auth_detail->password }}">
                                    @endif
                                    
                                    <div class="form-row">
                                        @if(session("msg"))
                                        <div class="alert-dismiss">
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <span>{{session("msg")}}</span><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span> </button><br/>
                                            </div>
                                        </div>
                                        @endif
                                        @if(count($errors)>0)
                                        <div class="alert-dismiss">
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                @foreach($errors->all()  as $error)
                                                    <span>{{$error}}</span><br/>
                                                @endforeach
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span class="fa fa-times"></span>
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                        <input type="hidden" name="hiddenval" class="hiddenval" value="0">
                                        {!!csrf_field()!!}
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ $user->first_name }}" required="">
                                            <div class="invalid-feedback">
                                                Please provide a valid first name.
                                            </div>
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ $user->last_name }}" required="">
                                            <div class="invalid-feedback">
                                                Please provide a valid last name.
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="{{ $user->phone }}" required="">
                                            <div class="invalid-feedback">
                                                Please provide a valid phone number.
                                            </div>
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email Address</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{ $user->email }}" required="">
                                            <div class="invalid-feedback">
                                                Please provide a valid email address.
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="dob">Date Of Birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob" value="{{ $user->dob }}" required="">
                                            <div class="invalid-feedback">
                                                Please choose date of birth.
                                            </div>
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" id="gender" name="gender"  required="">
                                                <option value="">Select gender</option>
                                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }} >Male</option>
                                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose gender.
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="address_line_1">Address Line 1</label>
                                            <input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="Enter Address Line 1" value="{{ $user->address_line_1 }} " required="">
                                            <div class="invalid-feedback">
                                                Please provide a address.
                                            </div>
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="address_line_1">Address Line 2</label>
                                            <input type="text" class="form-control" id="address_line_2" name="address_line_2" placeholder="Enter Address Line 2" value="{{ $user->address_line_2 }}">
                                        </div>                                       
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{ $user->city }}" required="">
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="{{ $user->state }}" required="">
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>                                
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="{{ $user->country }}" required="">
                                            <div class="invalid-feedback">
                                                Please provide a valid country.
                                            </div>
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="pincode">Pincode</label>
                                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" value="{{ $user->pincode }}" required="">
                                            <div class="invalid-feedback">
                                                Please provide a valid pincode.
                                            </div>
                                        </div>                                
                                    </div>
                                     <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="price">Price/hour</label>
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Enter price per hour" value="{{ $user->price }}" required="">
                                            <div class="invalid-feedback">
                                                Please provide a valid price.
                                            </div>
                                        </div> 
                                        <div class="col-md-6 mb-3">

                                            <label for="skill">Skill</label>
                                            <select class="form-control  selectpicker" id="skill" name="skill[]"  required="" multiple>
                                                @foreach($skill_list as $key=>$skill)
                                                <option value="{{$key}}" <?php if(in_Array($key, $UserSkillData)){ echo "selected";}?>
                                               >{{$skill}}</option>
                                                @endforeach 
                                            </select>
                                            <div class="invalid-feedback">
                                                Please add skills.
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">

                                            <label for="category_id">Category</label>
                                            <select class="form-control  selectpicker" id="category_id" name="category_id"  required="">
                                                @foreach($category_list as $key=>$category)
                                                <option value="{{$key}}" {{ $user->category == $key ? 'selected' : '' }}> {{$category}}</option>
                                                @endforeach 
                                            </select>
                                            <div class="invalid-feedback">
                                                Please add category.
                                            </div>
                                        </div> 
                                        <div class="col-md-6 mb-3">

                                            <label for="weapon">Weapon</label>
                                            <select class="form-control  selectpicker" id="weapon" name="weapon_id">
                                                <option value="0"> No Weapon</option>
                                                @foreach($weapon_list as $key=>$weapon)
                                                <option value="{{$key}}" {{ $user->weapon_id == $key ? 'selected' : '' }}> {{$weapon}}</option>
                                                @endforeach 
                                            </select>
                                        </div> 
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="weapon_number">Weapon Number</label>
                                            <input type="text" class="form-control" id="weapon_number" name="weapon_number" placeholder="Enter weapon number" value="{{ $user->weapon_number }}">
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="weapon_number">Weapon Document</label>
                                            <input type="file" class="form-control" id="weapon_document" name="weapon_document">
                                        </div> 
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">

                                            <label for="weapon_valid_from">Weapon Valid From</label>
                                            <input type="date" class="form-control" id="weapon_valid_from" name="weapon_valid_from" placeholder="Choose date" value="{{ $user->weapon_valid_from }}">
                                        </div> 
                                        <div class="col-md-6 mb-3">

                                            <label for="weapon_valid_upto">Weapon  Valid Upto</label>
                                            <input type="date" class="form-control" id="weapon_valid_upto" name="weapon_valid_upto" placeholder="Choose date" value="{{ $user->weapon_valid_upto }}">
                                        </div> 
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">

                                            <label for="about">About me</label>
                                            <textarea class="form-control" id="about" name="about" placeholder="Enter about yourself" required>{{ $user->about }}</textarea>
                                        </div> 
                                         <div class="col-md-6 mb-3">
                                             <label for="upload_image">Image</label>
                                            <input type="file" class="form-control" id="upload_image" name="upload_image" @if( $user->image=='') required="" @endif>
                                            <div class="invalid-feedback">
                                                Please provide a valid image.
                                            </div>
                                        </div> 
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Server side end -->
                </div>
            </div>

@endsection


@section("footer-page-script")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $(function () {
    $('select').selectpicker();
});
</script>

    <!-- others plugins -->
    <script src="{!! asset('assets/js/plugins.js') !!}"></script>
    <script src="{!! asset('assets/js/scripts.js') !!}"></script>

@endsection