@extends('frontend.layouts.layout')

@section('title', 'FreelanceEP')
@section('body')
<div class="login_form" style="height:200px;">
    <div style="margin-top:150px;">
        @if(!empty($count))
        <div class="alert alert-success" >
            You successfully verified your email address.
        </div>
        @else
        <div class="alert alert-danger print-error-msg" >
            Please verify your email address.
        </div>
        @endif
    </div>
</div>
@endsection            