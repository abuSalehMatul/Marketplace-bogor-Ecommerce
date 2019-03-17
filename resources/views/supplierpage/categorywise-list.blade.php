@extends('layout.app')
@php 
$sellin=($sell_in==1)?'Africa':'Global';
@endphp
@section('title',"Supplier's in $sellin")
@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>Supplier's in {{ $sellin }}</h1>
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
                    {!! Form::select('search',['seller-in-africa'=>'Seller In Africa','seller-in-global'=>'Seller In Globel','3'=>'All'], old('search',$type),  ['class'=>'form-control ', 'required'=>'']) !!}
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
                            <li><a href="{{ url("search?&search=$type&category=$catrow->category_slug") }}">{{ $catrow->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <img src="{{ asset('webtheme/images/banner/2.jpg')}}" class="img-thumbnail" alt="">
                </div>
            </div>
            <div class="col-sm-6">
                <h2 class="widget-title">Featured Listing</h2>
                @foreach($supplier as $row)
                <div class="vendor-box-list">
                    <!-- vendor list -->
                    <div class="row">
                        <div class="col-md-5 no-right-pd">
                            <div class="vendor-image">
                                <!-- venue pic -->
                                <a href="#"><img src="{{ asset('webtheme/images/vendor-1.jpg') }}" alt="wedding venue" class="img-responsive"></a>
                                <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                            </div>
                        </div>
                        <!-- /.venue pic -->
                        <div class="col-md-7 no-left-pd">
                            <!-- venue details -->
                            <div class="vendor-list-details">
                                <div class="caption">
                                    <!-- caption -->
                                    <h2><a href="#" class="title">{{ $row->company_name }}</a></h2>
                                    <p class="location"><i class="fa fa-map-marker"></i> {{ "$row->city $row->state, " }} {{ CommonClass::GetCountryName($row->country) }}</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
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
