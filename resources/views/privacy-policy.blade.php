@extends('layout.app')

@section('content')
<style>
.nav-tabs a{
    color#000 !important;
}
</style>

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Privacy Policy</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row guideline-section">
            <div class="col-md-12">
                <div class="aboutus" id="aboutus">
                    {{-- <h1>We are Weddings Finder.</h1> --}}
                    <p class="lead">CANCEL AND RETURN POLICY.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</p>
                </div>
            </div>
        </div>
        <div class="row guideline-section">
            <div class="col-md-12">
                <div class="aboutus" id="aboutus">
                    {{-- <h1>We are Weddings Finder.</h1> --}}
                    <p class="lead">INFORMATION WE HOLD.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</p>
                </div>
            </div>
        </div>
        <div class="row guideline-section">
            <div class="col-md-12">
                <div class="aboutus" id="aboutus">
                    {{-- <h1>We are Weddings Finder.</h1> --}}
                    <p class="lead">INFORMATION WE USE.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</p>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection