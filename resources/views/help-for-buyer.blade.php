@extends('layout.app')
@section('title','Buyer Help Center')


@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/fontello.css') }}">
<style>
.nav-tabs a{
    color#000 !important;
}
</style>
@endpush
@section('content')
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Buyer Help Center</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
             <div class="col-md-3 side-nav" id="leftCol">
                <div class="hide-side">
                    <ul class="listnone nav" id="sidebar">
                        <li class="active"><a href="{{ url('help-for-buyer') }}">Help</a></li>
                        <li><a href="{{ url('faq-for-buyer') }}">FAQ</a></li>
                        <li><a href="{{ url('buyersafety') }}">Safety</a>
                        </ul>
                    </div>
                </div>

            @foreach($row as $r)
            <div class="col-md-4">
                <div class="well-white text-center faq-block pinside60">
                    <div class="{{$r->icon_class}}"><i class="icon-faq icon-size-60 icon-light"></i></div>
                    <h2><a href="{{ url('buyersinglepage') }}" class="title">{{$r->title}}</a></h2>
                    <p> {{$r->short_description}}</p>
                </div>
            </div>
            @endforeach
            
        </div>
        
        <div class="row">
           @php ($row=CommonClass::WebsiteProfile())
           <div class="col-sm-12 ">
            <h3>Other ways to contact us</h3>
            <div class="col-sm-3">
                <h4><i class="icon-phone-call icon-size-60 icon-light"></i></h4>
                <h4><a href="tel:{{ $row->phone_no }}">Call Us</a></h4>
                <p>We're here to help.</p>
            </div>
            <div class="col-sm-3">
                <h4><i class="icon-email-1 icon-size-60 icon-light"></i></h4>
                <h4><a href="mailto:{{ $row->email_id }}">Email</a></h4>
                <p>Respond within 24 hours</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection