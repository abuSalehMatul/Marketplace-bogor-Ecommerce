@extends('layout.app')
@section('title','Seller Safety')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/fontello.css') }}">
<style>
.nav-tabs a{
    color#000 !important;
}
.tp-page-head{
    background: linear-gradient(rgba(6, 63, 63, 0.8), rgba(6, 63, 63, 0.8)), rgba(6, 63, 63, 0.8) url(webtheme/images/page-header-img.jpg) no-repeat center;
    background-size: cover;
    color: #fff;
    height: 150px;
    margin-top: -40px;

}


</style>
@endpush
@section('content')
<div class="main-container">
    <div class="contaier">
        <div class="row">
            {{-- @foreach($row as $r)
                <div class="col-md-12">
                    <div class="well-white text-center faq-block pinside60">
                        
                        <h2><a href="#" class="title">Buyer Safety</a></h2>
                        <p> {{$r->full_description}}</p>
                    </div>
                </div>
                @endforeach
                --}}

                <div class="tp-page-head">
                    <!-- page header -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="page-header">
                                    
                                    <h1>Safety For Seller</h1>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page header -->
                <div class="tp-breadcrumb">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Buyer Safety</li>
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
                                        <li class="active"><a href="{{ url('sallersafety') }}">Safety</a></li>
                                        <li><a href="{{ url('faq-for-seller') }}">FAQ</a></li>
                                        <li><a href="{{ url('help-for-seller') }}">help</a>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9 content-right">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach($row as $r)
                                            <div class="aboutus" id="aboutus">
                                                <h1>Seller Safety</h1>
                                                <p class="lead">{{$r->full_description}}</p>

                                            </div>
                                            @endforeach
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="row">
                <div class="container">
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
        </div>
        @endsection