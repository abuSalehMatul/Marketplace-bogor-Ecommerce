@extends('layout.app')
@php
    $mytype=($search['type']=='seller-in-africa')?'Africa':'Global';
@endphp
@section('title',"Top $catrow->category_name Supplier's $search[for] in $mytype")
@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>Top {{ $catrow->category_name }} Supplier's in {{ $mytype }}</h1>
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
                    {!! Form::select('for',['companies'=>'Companies','products'=>'Products'], old('for',$search['for']),  ['class'=>'form-control ', 'required'=>'']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::select('search',['seller-in-africa'=>'Seller In Africa','seller-in-global'=>'Seller In Globel','3'=>'All'], old('search',$search['type']),  ['class'=>'form-control ', 'required'=>'']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::select('category',[''=>'--Select Category--']+CommonClass::CategoryList1(), old('product',$catrow->category_slug),  ['class'=>'form-control ', 'required'=>'']) !!}
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
                            @php 
                            $for=$search['for'];
                            $search=$search['type'];
                            @endphp
                            @foreach(CommonClass::category() as $catrow)
                            <li><a href="{{ url("search?for=$for&search=$search&category=$catrow->category_slug") }}">{{ $catrow->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="well-box">
                        <h3 class="widget-title">Download Diretory</h3>
                        <ul class="listnone angle-double-right sidebarlist">
                           @foreach(CommonClass::GetSector() as  $crow)
                           <li><a href="{{ url("sectors-directory/$crow->sector_slug") }}">{{ $crow->sector_name }}</a></li>
                           @endforeach
                           @foreach(CommonClass::GetCountry() as  $crow)
                           <li><a href="{{ url("countries-directory/$crow->country_slug") }}">{{ $crow->country_name }} Directory</a></li>
                           @endforeach
                       </ul>
                   </div>
                </div>
            </div>
            <div class="col-sm-6">
                @foreach($supplier as $row)
                <div class="vendor-box-list">
                    <!-- vendor list -->
                    <div class="row">
                        <div class="col-md-5 no-right-pd">
                            <div class="vendor-image">
                                <!-- venue pic -->
                                <a href="{{ url("supplier/$row->company_slug/$row->unique_code") }}"><img src="{{ asset($row->logo) }}" alt="wedding venue" class="img-responsive"></a>
                            </div>
                        </div>
                        <!-- /.venue pic -->
                        <div class="col-md-7 no-left-pd">
                            <!-- venue details -->
                            <div class="vendor-list-details">
                                <div class="caption">
                                    <!-- caption -->
                                    <h2><a href="{{ url("supplier/$row->company_slug/$row->unique_code") }}" class="title">{{ $row->company_name }}</a></h2>
                                    <p class="location"><i class="fa fa-map-marker"></i> {{ "$row->city $row->state, " }} {{ CommonClass::GetCountryName($row->country) }}</p>
                                    <p><b>Seller</b> : {{ $row->first_name." ".$row->last_name }}</p>
                                </div>
                                <!-- /.caption -->

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="vendor-price">
                                <a href="{{ url("supplier/$row->company_slug/$row->unique_code") }}" class="btn btn-primary btn-sm">Read More</a>&nbsp;&nbsp;
                                <a href="{{ url("supplier/$row->company_slug/$row->unique_code") }}" class="btn btn-primary btn-sm">Send Mail</a>
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
