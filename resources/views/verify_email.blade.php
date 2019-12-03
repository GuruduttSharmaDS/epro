@extends('frontend.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')
<div class="login_form" style="height:200px;">
    <div style="margin-top:150px;">
        @if(!empty($count))
            @if (isset($count->email_verified_at))
                <div class="alert alert-success" >
                    You email already verified.
                </div>
                @else
                <div class="alert alert-success print-error-msg" >
                You email verified successfully.
                </div>
            @endif
        @else
        <div class="alert alert-danger print-error-msg" >
            Please verify your email address.
        </div>
        @endif
    </div>
</div>
@endsection            