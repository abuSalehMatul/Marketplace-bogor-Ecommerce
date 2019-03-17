@extends('layout.app')
@section('title','Join Our Community')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/social.css') }}">
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
                    <div class="col-md-4 form-group">
                        <a href="{{ $row->fb }}" target="blank" class="btn btn-primary btn-block fb"><i class="fa fa-facebook-official"></i> Facebook</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <a href="{{ $row->twitter }}" target="blank" class="btn btn-primary btn-block twitter"><i class="fa fa-twitter"></i> Twitter</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <a href="{{ $row->whatsapp }}" target="blank" class="btn btn-primary btn-block whatsapp"><i class="fa  fa-whatsapp"></i> WhatsApp</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <a href="{{ $row->gplus }}" target="blank" class="btn btn-primary btn-block gplus"><i class="fa  fa-google-plus"></i> Google+</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <a href="{{ $row->instagram }}" target="blank" class="btn btn-primary btn-block instagram"><i class="fa  fa-instagram"></i> Instagram</a>
                    </div>
                </div>
                 {{-- <ul class="check-circle">
                  <li><a href="{{ $row->fb }}" target="blank" class="btn btn-sm"><i class="fa fa-facebook-official"></i> Facebook</a></li>
                  <li><a href="{{ $row->twitter }}" target="blank" class="btn btn-sm"><i class="fa fa-twitter"></i> Twitter</a></li>
                  <li><a href="{{ $row->whatsapp }}" target="blank" class="btn btn-sm"><i class="fa  fa-whatsapp"></i> WhatsApp</a></li>
                  <li><a href="{{ $row->gplus }}" target="blank" class="btn btn-sm"><i class="fa  fa-google-plus"></i> Google+</a></li>
                  <li><a href="{{ $row->instagram }}" target="blank" class="btn btn-sm"><i class="fa  fa-instagram"></i> Instagram</a></li>
              </ul>  --}}
          </div>
      </div>
  </div>
</div>
@endsection
