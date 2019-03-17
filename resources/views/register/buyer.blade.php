@extends('layout.app')
@push('headerscript')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('custom/style.css') }}">
@endpush
@section('content')
<div class="tp-page-head">
  <!-- page header -->
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <div class="page-header text-center">
          <h1>Register as a Buyer</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-space80">
  <!-- Feature Blog Start -->
  <div class="container ">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
       <section class="form-box">

        <div class="row">
          <div class="col-md-12">

            <!-- Form Wizard -->
            <div class="form-wizard form-header-classic form-body-classic">
              <h3><i class="fa fa-user"></i> Join <b>Free</b> As Buyer</h3>
              <form role="form" class="section-space40" action="{{ url('buyer-store') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="First Name*" required="">
                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Last Name*" required="">
                      <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      {!! Form::select('instant_type',[''=>'-Select Your Instant Type-','1'=>'WhatsApp','2'=>'Skype','3'=>'WeChat'], old('instant_type'),  ['class'=>'form-control ', 'required'=>'']) !!}
                      <span class="text-danger">{{ $errors->first('instant_type') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" name="instant_id" value="{{ old('instant_id') }}" class="form-control" placeholder="Enter Instant ID*" required="">
                      <span class="text-danger">{{ $errors->first('instant_id') }}</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" name="username" value="{{ old('first_name') }}" class="form-control" placeholder="E-mail*" required="">
                      <span class="text-danger">{{ $errors->first('username') }}</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="password" name="password" id="new_password" value="{{ old('password') }}" class="form-control" placeholder="Password*" required="">
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="password" name="password_confirmation" id="confirm_password" value="{{ old('password_confirmation') }}" placeholder="Confirm Password*" class="form-control" required="">
                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                  </div>
                  <span id="password_error"></span>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="checkbox" id="confirm" name="confirm" required="" > <label for="confirm">“I agree to the <a target="_blank" href="{{ url('privacy-policy') }}">Terms and Conditions</a>” or “I agree to the <a target="_blank" href="{{ url('terms-conditions') }}">Privacy Policy</a>” of Business Directory.</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <button name="submit" class="pull-right btn btn-primary btn-sm">Save</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <a href="{{ url('buyer-register') }}">Join as Seller</a>
                  </div>
                </div>

              </form>

            </div>
            <!-- Form Wizard -->
          </div>
        </div>

      </section>

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