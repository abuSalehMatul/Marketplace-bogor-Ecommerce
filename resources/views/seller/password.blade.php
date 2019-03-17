@extends('layout.app')
@section('title','Manage Password')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
@endpush
@section('content')
@php 
$user=Auth::user();
$seller=$user->seller;
@endphp
<div class="tp-dashboard-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 profile-header">
                <div class="profile-pic col-md-2"><img src="images/profile-dashbaord.png" alt=""></div>
                <div class="profile-info col-md-9">
                    <h1 class="profile-title">{{ $seller->first_name }}<small>Welcome Back memeber</small></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page header -->

<div class="main-container">
    <div class="container">
        <div class="row">
            @include('layout.sidebar')
            <div class="col-md-9">
                <div class="row">
                 <div class="well-box">
                    <form action="{{ url('seller/updatepassword') }}" method="post" >
                        @csrf
                        <h2>Update Password</h2>
                        <!-- Text input-->
                        @if(Session::has('success_msg'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success_msg') }}</p>
                        @elseif(Session::has('danger_msg'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('danger_msg') }}</p>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Old Password: <span>*</span></label>
                                    <input type="password" name="old" class="form-control" value="{{ old('old') }}" required="">
                                    @if ($errors->has('old'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('old') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>New Password: <span>*</span></label>
                                    <input type="password" name="password" id="new_password" value="{{ old('password') }}" class="form-control" required="">
                                    @if ($errors->has('password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Confirm Password: <span>*</span></label>
                                    <input type="password" name="password_confirmation" id="confirm_password" value="{{ old('password_confirmation') }}" class="form-control" required="">
                                    @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <span id="password_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button name="submit" class="pull-right btn btn-primary btn-sm">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


@push('footerscript')
<script>
    $(document).ready(function(){
        $("#new_password, #confirm_password").keyup(checkpassword);

    });

    function checkpassword(){
        var password=$("#new_password").val();
        var confirmpassword=$("#confirm_password").val();
        if(confirmpassword.length>0){
            if(password!=confirmpassword){
                $("#password_error").html("Password did not matched");
            }
            else{
                $("#password_error").html("Password matched");
            }
        }
    }
</script>
<script>
    function validateForm(){
        var password=document.getElementById("new_password").value;
        var confirmpassword=document.getElementById("confirm_password").value;
        if(password!=confirmpassword){
            $("#password_error").html("Password did not matched");
            return false;
        }
        else{
            return true;
        }
    }
</script>

@endpush