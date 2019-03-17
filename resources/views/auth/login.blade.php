@extends('layout.app')
@section('title','Login')
@section('content')

<div class="section-space80">
  <!-- Feature Blog Start -->
  <div class="container ">

    <div class="row">
      <div class="col-md-10 col-md-offset-1">

        <div class="col-md-8 border border-right st-tabs">
          <!-- Nav tabs -->
          <div class="well-box">
            <div class="row">
              <div class="col-md-12">
                @if(Session::has('success_msg'))
                <p class="alert alert-info">{{ Session::get('success_msg') }}</p>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <h3>Login Now</h3>
              </div>
            </div>
            <form action="{{ route('login') }}" method="post" >
              @csrf
              <!-- Text input-->
              <div class="form-group">
                <input type="text" name="email" value="" placeholder="Email Id" class="form-control"> 
                <span class="text-danger">{{ $errors->first('email') }}</span>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <input type="password" name="password" value="" placeholder="Password" class="form-control"> 
                <span class="text-danger">{{ $errors->first('password') }}</span>
              </div>
              <!-- Button -->
              <div class="form-group">
                <button id="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
                <a href="{{ route('password.request') }}" class="pull-right"> <small>Forgot Password ?</small></a>
              </div>
            </form>
          </div>

        </div>

        <div class="col-md-4 border border-right st-tabs">
          <!-- Nav tabs -->
          <div class="well-box">
            <h2>Why Register?</h2>
            <hr>
            <ul class="list-group">
              <li class="list-group">Post Buy/Sell leads</li>
              <li class="list-group">List Your Business</li>
              <li class="list-group">Message contacts</li>
              <li class="list-group">Access Premium Content</li>
              <li class="list-group">Industry Newsletters</li>
            </ul>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>

@endsection
