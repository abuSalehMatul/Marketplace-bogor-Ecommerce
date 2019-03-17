@extends('layout.app')
@section('title','Manage My Profile')
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
                    <h1 class="profile-title">{{ $seller->first_name }}<small>Welcome Back Seller</small></h1>
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
                       <form action="{{ url('seller/updateprofile') }}" method="post" >
                        @csrf
                        <h2>My Profile</h2>
                        <!-- Text input-->
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            {!! Session::get('success') !!}
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Username: <span>*</span></label>
                            <input type="text" name="username" value="{{ old('username',$user->email) }}" class="form-control" required="">
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name: <span>*</span></label>
                                    <input type="text" name="first_name" value="{{ old('first_name',$row->first_name) }}" class="form-control" required="">
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name: <span>*</span></label>
                                    <input type="text" name="last_name" value="{{ old('last_name',$row->last_name) }}" class="form-control" required="">
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                            <label>Instant Type: <span>*</span></label>
                            {!! Form::select('instant_type',['1'=>'WhatsApp','2'=>'Skype','3'=>'WeChat'], old('instant_type',$row->instant_type),  ['class'=>'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('instant_type') }}</span>
                            </div>
                            <div class="col-md-6">
                            <label>Instant ID: <span>*</span></label>
                            <input type="text" name="instant_id" value="{{ old('instant_id',$row->instant_id) }}" class="form-control"  required="">
                            <span class="text-danger">{{ $errors->first('instant_id') }}</span>
                        </div>
                    </div>
                        <div class="form-group">
                            <label>Company Name: <span>*</span></label>
                            <input type="text" name="company_name" value="{{ old('company_name',$row->company_name) }}" class="form-control" required="">
                            <span class="text-danger">{{ $errors->first('company_name') }}</span>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label>Business Sector: <span>*</span></label>
                            {!! Form::select('business_sector',[''=>'-Business Sector-']+ CommonClass::CategoryList(), old('business_sector',$row->business_sector),  ['class'=>'form-control','required']) !!}
                            <span class="text-danger">{{ $errors->first('business_sector') }}</span>
                        </div>

                        <div class="form-group">
                            <label>Status of Company: <span>*</span></label>
                            {!! Form::select('company_status',[''=>'Status of Company','2'=>'Manufacturer','3'=>'Exporter'], old('company_status',$row->company_status),  ['class'=>'form-control','required']) !!}

                            <span class="text-danger">{{ $errors->first('company_status') }}</span>
                        </div>
                        
                        <div class="form-group">
                            <label>Contact Number: <span>*</span></label>
                            <input type="text" name="contact_number" value="{{ old('contact_number',$row->contact_number) }}" class="form-control" placeholder="Contact Number" required="">
                            <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Website:</label>
                            <input type="text" name="website" value="{{ old('website',$row->website) }}" class="form-control" placeholder="Website (eg: www.domain.com)">
                            <span class="text-danger">{{ $errors->first('website') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Address Line1: <span>*</span></label>
                            <input type="text" name="address1" value="{{ old('address1',$row->address1) }}" class="form-control" placeholder="Address Line1" required="">
                            <span class="text-danger">{{ $errors->first('address1') }}</span>
                        </div>

                        <div class="form-group">
                            <label>Address Line2: <span>*</span></label>
                            <input type="text" name="address2" value="{{ old('address2',$row->address2) }}" class="form-control" placeholder="Address Line2" required="">
                            <span class="text-danger">{{ $errors->first('address2') }}</span>
                        </div>
                        <div class="form-group">
                            <label>City: <span>*</span></label>
                            <input type="text" name="city" value="{{ old('city',$row->city) }}" class="form-control" placeholder="City" required="">
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        </div>
                        <div class="form-group">
                            <label>State: <span>*</span></label>
                            <input type="text" name="state" value="{{ old('state',$row->state) }}" class="form-control" placeholder="State" required="">
                            <span class="text-danger">{{ $errors->first('state') }}</span>
                        </div>

                        <div class="form-group">
                            <label>Postal/Zip code: <span>*</span></label>
                            <input type="text" name="postal" value="{{ old('postal',$row->postal) }}" class="form-control" placeholder="Postal/Zip code" required="">
                            <span class="text-danger">{{ $errors->first('postal') }}</span>
                        </div>

                        <div class="form-group">
                            <label>Country: <span>*</span></label>
                            {!! Form::select('country',[''=>'-Select Country-']+ CommonClass::CountryList(), old('country',$row->country), ['class'=>'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('country') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Sell In: <span>*</span> </label>

                            <label class="radio-inline">
                                <input type="radio" name="sell_in" id="Radios1" value="1" {{ ($row->sell_in==1)?"checked":'' }} required="" >
                                Africa
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sell_in" id="Radios2" value="2" {{ ($row->sell_in==2)?"checked":'' }} required="">
                                Global
                            </label>
                            <span class="text-danger">{{ $errors->first('sell_in') }}</span>
                            <!-- Button -->
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <button name="submit" class="pull-right btn btn-primary btn-sm">Save</button>
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
@endpush