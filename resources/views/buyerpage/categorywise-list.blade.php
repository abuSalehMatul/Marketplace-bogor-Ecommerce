@extends('layout.app')
@php 
$sellin=($sell_in==1)?'Africa':'Global';
@endphp
@section('title',"Buyer's in $sellin")
@push('headerscript')
@endpush

@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>Buyer's in {{ $sellin }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="filter-box">
    <div class="container">
        <div class="row filter-form">
            <form action="{{ url('search') }}" method="get">
                 <div class="col-md-3">
                    {!! Form::select('for',['companies'=>'Companies','products'=>'Products'], old('for'),  ['class'=>'form-control ', 'required'=>'']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::select('search',['buyer-in-africa'=>'Buyer In Africa','buyer-in-global'=>'Buyer In Globel','3'=>'All'], old('search',$type),  ['class'=>'form-control ', 'required'=>'']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::select('category',[''=>'--Select Category--']+CommonClass::CategoryList1(), old('product'),  ['class'=>'form-control ', 'required'=>'']) !!}
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block">{{-- Refine Your  --}}Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="section-space80">
    <!-- Feature Blog Start -->
    <div class="container ">
        <div class="row">
            <div class="col-md-3 left-sidebar">
                <div class="col-md-12 widget widget-category">
                    <!-- widget -->
                    <div class="well-box">
                        <h2 class="widget-title">Categories</h2>
                        <ul class="listnone angle-double-right sidebarlist">
                            @foreach(CommonClass::category() as $catrow)
                            <li><a href="{{ url("search?search=$type&category=$catrow->category_slug") }}">{{ $catrow->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <img src="{{ asset('webtheme/images/banner/2.jpg')}}" class="img-thumbnail" alt="">
                </div>
            </div>
            <div class="col-sm-6">
                <h2 class="widget-title">Featured Listing</h2>
                @foreach($buyer as $row)
                <div class="vendor-box-list">
                    <!-- vendor list -->
                    <div class="row">
                        <!-- /.venue pic -->
                        <div class="col-md-12">
                            <!-- venue details -->
                            <div class="vendor-list-details">
                                <div class="caption">
                                    <!-- caption -->
                                    <h2><a href="#" class="title">{{ $row->first_name }}</a></h2>
                                    <p class="location"><i class="fa fa-map-marker"></i> {{ "$row->state, " }} {{ CommonClass::GetCountryName($row->country) }}</p>
                                </div>
                                <!-- /.caption -->

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="vendor-price">
                                <a href="#" class="btn btn-primary btn-sm">Read More</a>&nbsp;&nbsp;
                                <a href="#" class="btn btn-primary btn-sm">Send Mail</a>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-3">
                <div class="filter-sidebar">
                    @include('layout.sidebanner')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
