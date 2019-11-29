@extends('frontend.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')
<div class="login_form">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                @if(!empty($count))
                <form action="#" class="needs-validation loginauth" onsubmit="forgot_password_email(this,event)" novalidate>
                    @csrf
                    <div class="form-group msg">
                    </div>
                    <div class="col-4">
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pswd"  name="pswd" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="cpwd">Confirm Password:</label>
                        <input type="password" class="form-control" id="cpswd" name="cpswd" required>
                        
                    </div>
                </div>
                <input type="hidden" name="email" value="{{$count->email}}">
                <input type="hidden" name="action" value="password_mail">
                <div class="col-4">
                <button type="button" class="btn btn-primary mu-send-btn validate-password-email registerform btn-regis" value="Login">Submit</button>
            </div>
                </form>
              @else
                <div class="alert alert-danger print-error-msg" >
                   Invalid Link/Link has been be expried
                </div>
                @endif
            </div>
@endsection            