@extends('layout.app')

@section('content')
<style>
.nav-tabs a{
    color#000 !important;
}
</style>
@php ($row=CommonClass::WebsiteProfile())
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>About Us</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>We are Managing Business.</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="aboutus" id="aboutus">
                    <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <hr>
                </div>
            </div>
            <div class="col-md-12">
                <div class="aboutus" id="aboutus">
                    <p class="lead">Our Business Directories Aims.</p><p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <hr>
                </div>
            </div>
            <div class="col-md-12">
                <div class="aboutus" id="aboutus">
                    <p class="lead">Our Achivements.</p><p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <ul class="check-circle">
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</li>
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</li>
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                        <li> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</li>
                    </ul>
                    <hr>
                </div>
            </div>

            <div class="col-md-12 team-section" id="team">
                <h1>Our Founder</h1>
                <div class="row">
                    <div class="col-md-4"><img src="{{ asset('uploads/image.jpg') }}" alt="" class="img-responsive img-circle"></div>
                    <div class="col-md-8">
                        <h2>Founder Name Here</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
    </div>
</div>
@endsection