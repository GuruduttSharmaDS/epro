            <footer>
                <div class="logo_social">
                    <div class="container">
                        <div class="row">      
                            <div class="col-md-9 col-6">
                                <div class="footer_logo">
                                    <img src="{!! asset('assets/frontend/img/foote') !!}r_logo.png" alt="footer" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="social">
                                    <ul>                            
                                        <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="javascript:void(0)" ><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="links_footer">
                    <div class="container">
                        <div class="row">      
                            <div class="col-md-4">
                                <div class="our_links">
                                    <h3>About Us</h3>
                                    <p>The Love Boat promises something for every the beat of very best to a make the others comfortable.</p>
                                    <ul>               
                                        <li><i class="far fa-envelope"></i>+880 256794, 24-2564687</li> 
                                        <li><i class="fas fa-phone fa-rotate-90"></i>info@freelanceep.com</li>              
                                    </ul>           
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sitemap_links">
                                    <!--<div class="sitemap">
                                        <h3>Service Links</h3>
                                        <ul>
                                            <li><a href="#">Office Security</a></li>
                                            <li><a href="#">cctv Security</a></li>
                                            <li><a href="#">house Security</a></li>
                                            <li><a href="#">bank Security</a></li>
                                            <li><a href="#">Parking Security</a></li>
                                            <li><a href="#">Man Security</a></li>
                                        </ul>
                                    </div>-->
                                    <div class="sitemap useful_links">
                                        <h3>Support Links</h3>
                                        <ul>
                                            <li><a href="javascript:void(0);">Support Link</a></li>
                                            <li><a href="{{ route('faq') }}">Faq & Help Center</a></li>
                                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#login_signin">Create Account</a></li>
                                            <li><a href="javascript:void(0);">Service and Help</a></li>
                                            <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>       
                            <div class="col-md-4">
                                <div class="news_letters">
                                    <h3>Sign Up For a Newsletter</h3>
                                    <form action="">
                                        <h4>Weekly breaking news, analysis and cutting edge advices on job searching.</h4>
                                        <input type="text" placeholder="Enter your email address" required=""><button><i class="fas fa-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>              
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="col-12">                    
                        <p class="copy_right">© 2019 FreelanceEP. All Rights Reserved.</p>                      
                    </div>
                </div>
            </footer>
        </div>
    </body>
    <script>
        	
           
        $(document).ready(function(){
            $('#available_cities').bind('keypress keydown keyup', function(e){
       if(e.keyCode == 13) { e.preventDefault(); }
    });
           
            $(document).on('click', '.contact-us-button', function(event){
                event.preventDefault();
                $('#contact-form').submit();
            });
            $(document).on('click', '.searchpagination a', function(event){
                event.preventDefault(); 
                var page = $(this).attr('href').split('page=')[1];
                $('#page').val(page);
                $('#searchgaurd').submit();
            });

            $(".checkuserLogin").click(function(){
                if($('.login_dashboard').hasClass('hide')){

                    $('#login_signin').modal('show');
                    return false;
                }
            });


            $(".searchressub").click(function(){
                $('#page').val('1');
                $('#searchgaurd').submit();

            });




            $(".slider").slick({
                slidesToShow: 3,
                infinite: true,
                autoplay: true,
                responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                ]
            });
            // search box
            $('.search_form .submit_btn').click(function(){
                $('.form-inline input').toggleClass('showInput');
            });


            // Disable form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();

        });
        var preventSubmit = function(event) {
        if(event.keyCode == 13) {
            console.log("caught ya!");
            event.preventDefault();
            //event.stopPropagation();
            return false;
        }
    }
</script>


<!-- The Register Modal -->
<div class="modal" id="login_regis">
<div class="modal-dialog  modal-dialog-centered ">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h1 class="modal-title">Register</h1>
            <button type="button" class="close" data-dismiss="modal"  title="close popup"><img src="{!! asset('assets/frontend/img/X.png') !!}" alt="close form"></button>
        </div>

        <!-- Modal body -->
        <!-- <div class="modal-body">
            <div class="via_social">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-square"></i> Facebook</a></li>
                    <li><a href="#"><i class="fab fa-google-plus-square"></i>Google Plus</a></li>
                </ul>
            </div>
            <div class="or">
                <span>Or</span>
            </div>
        </div>-->
        <div class="login_form">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            <br>
            @endif
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <form action="#" id="registrationform" class="needs-validation" onsubmit="registration(this,event)" novalidate>
                @csrf
                <div class="form-group">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input userRoleUser" name="role" value="user" checked>Freelancer
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input userRoleClient" name="role" value="client">Client
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="uname">First Name:</label>
                    <input type="text" class="form-control" id="fname"  name="fname" required>
                    <span class="text-danger">{{ $errors->first('fname') }}</span>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="uname">Last Name:</label>
                    <input type="text" class="form-control" id="lname"  name="lname" required>
                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="uname">Email:</label>
                    <input type="email" class="form-control" id="email"  name="email" required>
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="password"  name="pswd" required>
                    <span class="text-danger">{{ $errors->first('pswd') }}</span>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirmPassword" name="cpswd" required>
                    <span class="text-danger">{{ $errors->first('cpswd') }}</span>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <input class="form-check" type="checkbox" name="remember" required id="agree">
                    <label class="form-check-label" for="agree">                            
                        I agree with our <a href="#">Terms & Conditions</a>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </label>
                </div>
                <input type="hidden" name="action" value="registration_Form">
                <button type="button" class="btn btn-primary mu-send-btn validate-password registerform btn-regis" value="Register">Register</button>

                <div class="form-group msg">
                </div>
                <h5>Already Registered? <a href="javascript:void(0)"  data-toggle="modal" data-target="#login_signin" data-dismiss="modal">Login Now</a></h5> 
            </form>
        </div> 
    </div>
</div>
</div>

<!-- The Login Modal -->
<div class="modal" id="login_signin">
<div class="modal-dialog  modal-dialog-centered ">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h1 class="modal-title">Login</h1>
            <button type="button" class="close" data-dismiss="modal" title="close popup"><img src="{!! asset('assets/frontend/img/X.png') !!}" alt="close form"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="via_social">
                <ul>
                    <li><a href="javascript:void(0)"><i class="fab fa-facebook-square"></i> Facebook</a></li>
                    <li><a href="javascript:void(0)"><i class="fab fa-google-plus-square"></i> Google Plus</a></li>
                </ul>
            </div>
            <div class="or">
                <span>Or</span>
            </div>
        </div>
        <div class="login_form">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <form action="#" class="needs-validation loginauth" onsubmit="logincheck(this,event)" novalidate>
                @csrf
                <div class="form-group msg">
                </div>
                <div class="form-group">
                    <label for="uname">Email:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pswd" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="forgot">
                    <a href="javascript:" data-toggle="modal" data-target="#Forgot_pass" data-dismiss="modal">Forgot Password</a>
                </div>
                <input type="hidden" name="action" value="login_Form">
                <button type="button" class="btn btn-primary mu-send-btn validate-form registerform btn-regis" value="Login">Login</button>
                <h3>Don't have a login? <a href="javascript:" data-toggle="modal" data-target="#login_regis" data-dismiss="modal">Register now</a></h3>
            </form>
        </div>
            
    </div>
</div>
</div>
<!-- The Forgot password Modal -->
<div class="modal" id="Forgot_pass">
<div class="modal-dialog modal-dialog-centered ">
<div class="modal-content">
<!-- Modal Header -->
<div class="modal-header">
<h1 class="modal-title">Forgot Password</h1>
<button type="button" class="close" data-dismiss="modal" title="close popup"><img src="{!! asset('assets/frontend/img/X.png') !!}" alt="close form"></button>
</div>

<!-- Modal body -->
<div class="modal-body">
<div class="login_form">
<form method="post" action="#" class="needs-validation mu-contact-form" onsubmit="forgotcheck(this,event)">
@csrf  
<div class="form-group msg">
</div>    
<div class="form-group">
    <label for="uname">Email:</label>
    <input type="text" class="form-control" id="forgotemail" placeholder="Enter email address" name="email" required>
    <!-- <div class="valid-feedback">Valid.</div> -->
    <div class="invalid-feedback">Please fill out this field.</div>
</div>
<input type="hidden" name="action" value="forgot_Form">
<button type="button" class="btn btn-primary btn-regis mu-send-btn validate-forgot-password" value="Submit" >Submit</button> 
</form>
</div>
<a href="javascript:"  data-toggle="modal" data-target="#login_signin" data-dismiss="modal">Back to login</a>  
</div>  
</div>
</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function() {
$('.start_date').datepicker({
    multidate: false,		
    startDate: new Date()

}).on('changeDate', function (selected) {
    startDate = new Date(selected.date.valueOf());
    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
    $('.end_date').datepicker('setStartDate', startDate);
});

$('.end_date').datepicker({
    multidate: false,
    startDate: new Date()
}).on('changeDate', function (selected) {
    FromEndDate = new Date(selected.date.valueOf());
    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
    $('.start_date').datepicker('setEndDate', FromEndDate);
});
});

$(document).ready(function(){
$(".homeJoinNow").click(function(){
var passedID = $(this).attr('data-id');

if (passedID == 'client') {
    $('.userRoleClient').prop('checked', true);
} else {
    $('.userRoleUser').prop('checked', true);
}
});
});

</script>