@extends('layout.app')
@section('title','Support')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/fontello.css') }}">
<style>
.nav-tabs a{
    color#000 !important;
}
.sellerbox{
    background: #00355f;
    padding-top: 20px;
        box-shadow: 10px 10px 10px;
}
.buyerbox{
    background: #ffcc00;
    padding-top: 20px;
}
.sellerbox h2,.buyerbox  h2{
    color:#fff;
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
                    <li>Support</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 sellerbox">
                <h2>For Seller</h2>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="well-white text-center faq-block pinside20 ">
                            <div class="feature-icon"><i class="icon-wedding-invitation-2 icon-size-60 icon-light"></i></div>
                            <h2><a href="{{ url('help-for-seller') }}" class="title">Help</a></h2>
                        </div>
                    </div><div class="col-sm-4">
                        <div class="well-white text-center faq-block pinside20 ">
                            <div class="feature-icon"><i class="icon-faq icon-size-60 icon-light"></i></div>
                            <h2><a href="{{ url('faq-for-seller') }}" class="title">FAQ</a></h2>
                        </div>
                    </div><div class="col-sm-4">
                        <div class="well-white text-center faq-block pinside20 ">
                            <div class="feature-icon"><i class="icon-curtains icon-size-60 icon-light"></i></div>
                            <h2><a href="{{ url('sallersafety') }}" class="title">Safty</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 buyerbox">
                <h2>For Buyer</h2>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="well-white text-center faq-block pinside20 ">
                            <div class="feature-icon"><i class="icon-wedding-invitation-2 icon-size-60 icon-light"></i></div>
                            <h2><a href="{{ url('help-for-buyer') }}" class="title">Help</a></h2>
                        </div>
                    </div><div class="col-sm-4">
                        <div class="well-white text-center faq-block pinside20 ">
                            <div class="feature-icon"><i class="icon-faq icon-size-60 icon-light"></i></div>
                            <h2><a href="{{ url('faq-for-buyer') }}" class="title">FAQ</a></h2>
                        </div>
                    </div><div class="col-sm-4">
                        <div class="well-white text-center faq-block pinside20 ">
                            <div class="feature-icon"><i class="icon-curtains icon-size-60 icon-light"></i></div>
                            <h2><a href="{{ url('buyersafety') }}" class="title">Safty</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection