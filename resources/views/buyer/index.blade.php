@section('content')
@extends('layout.app')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
@endpush
@php 
$user=Auth::user();
$buyer=$user->buyer;
@endphp
<div class="tp-dashboard-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 profile-header">
                <div class="profile-pic col-md-2"><img src="images/profile-dashbaord.png" alt=""></div>
                <div class="profile-info col-md-9">
                    <h1 class="profile-title">{{ $buyer->first_name }}<small>Welcome Back memeber</small></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page header -->

<div class="main-container">
    <div class="container">
        <div class="row">
            @include('layout.buyersidebar')
            <div class="col-md-9">
                <div class="row">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
