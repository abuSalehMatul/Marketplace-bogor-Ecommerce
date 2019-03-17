@extends('layout.app')
@section('title','Africa Directory List')
@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>Download Africa Directory List</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Africa Directory List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="section-space80">
    <!-- Feature Blog Start -->
    <div class="container ">
        <div class="row">
            <div class="col-md-6">
                <h2>Sector's Wise Directory List</h2>
                <ul class="check-circle">
                     @foreach(CommonClass::GetSector() as  $crow)
                   <li><a href="{{ url("sectors-directory/$crow->sector_slug") }}"><img src="{{ asset($crow->image) }}" width="20"> {{ $crow->sector_name }}</a></li>
                   @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Country Wise Directory List</h2>
                <ul class="check-circle">
                     @foreach(CommonClass::GetCountry() as  $crow)
                   <li><a href="{{ url("countries-directory/$crow->country_slug") }}"><img src="{{ asset($crow->country_flag) }}" width="20"> {{ $crow->country_name }} Directory</a></li>
                   @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection