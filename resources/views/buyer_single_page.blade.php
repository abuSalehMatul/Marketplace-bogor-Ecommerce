@extends('layout.app')
@section('title','Buyer Help')
@section('content')
<style>
.nav-tabs a{
    color#000 !important;
}
</style>

<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Buyer Help</h1>
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
                    <li>Buyer Help</li>
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
         <div class="col-md-9 content-right">
            <div class="aboutus" id="aboutus">
                @foreach($row as $r)
                <h2><a href="#" class="title">Help for Buyer</a></h2>
                <p class="lead">{{$r->full_description}}</p>
                @endforeach
            </div>

        </div>
</div>

    </div>
</div>
    @endsection