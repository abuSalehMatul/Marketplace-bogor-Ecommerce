@extends('layout.app')
@section('title','Seller Help')
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
                    <h1>Seller Help</h1>
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
                    <li>Seller Help</li>
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
                         <li class="active"><a href="{{ url('help-for-seller') }}">help</a>
                        <li ><a href="{{ url('sallersafety') }}">Safety</a></li>
                        <li><a href="{{ url('faq-for-seller') }}">FAQ</a></li>
                       
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 content-right">
                    <div class="aboutus" id="aboutus">
                        @foreach($row as $r)
                        <h2><a href="#" class="title">Help for Seller</a></h2>
                        <p class="lead">{{$r->full_description}}</p>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
    @endsection