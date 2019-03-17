@extends('layout.app')
@section('content')
<style>
.nav-tabs a{
    color#000 !important;
}
</style>
@php ($row=CommonClass::WebsiteProfile())
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Contact us</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Contact Us</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="well-box">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {!! Session::get('success') !!}
                    </div>
                    @endif
                    <p>Please fill out the form below and we will get back to you as soon as possible.</p>
                    <form action="{{ url('enquiry') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="first">First Name <span class="required">*</span></label>
                            <input id="first" name="first" type="text" placeholder="First Name" value="{{ old('first') }}" class="form-control input-md" required>
                            <span class="text-danger">{{ $errors->first('first') }}</span>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class=" control-label" for="lastname">Last Name <span class="required">*</span></label>
                            <div class=" ">
                                <input id="lastname" name="lastname" type="text" placeholder="Last name" value="{{ old('lastname') }}" class="form-control input-md" required>
                            </div>
                            <span class="text-danger">{{ $errors->first('lastname') }}</span>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class=" control-label" for="email">E-Mail <span class="required">*</span></label>
                            <input id="email" value="{{ old('email') }}" name="email" type="text" placeholder="E-Mail" class="form-control input-md" required>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class=" control-label" for="phone">Phone <span class="required">*</span></label>
                            <input id="phone" value="{{ old('phone') }}" name="phone" type="text" placeholder="Phone" class="form-control input-md" required>
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>
                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="  control-label" for="message">Message</label>
                            <textarea class="form-control" maxlength="500" rows="6" id="message" name="message" placeholder="Write Your Message">{{ old('message') }}</textarea>
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <button id="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 contact-info">
                <div class="well-box">
                    <ul class="listnone">
                        <li class="address">
                            <h2><i class="fa fa-map-marker"></i>Location</h2>
                            <p>{{ $row->business_address }}</p>
                        </li>
                        <li class="email">
                            <h2><i class="fa fa-envelope"></i>E-Mail</h2>
                            <p>{{ $row->email_id }}</p>
                        </li>
                        <li class="call">
                            <h2><i class="fa fa-phone"></i>Contact</h2>
                            <p>{{ $row->phone_no }}</p>
                        </li>
                    </ul>
                </div>
                <div class="social-icon">
                    <h2>Find us on Social Media</h2>
                    <ul>
                        <li><a href="{{ $row->fb_url }}" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="{{ $row->twitter_url }}" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="{{ $row->gplus_url }}" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
                        <li><a href="{{ $row->inst_url }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{ $row->youtube_url }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection