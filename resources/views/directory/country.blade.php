@extends('layout.app')
@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>Download {{ $country->country_name }} Directory</h1>
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
                        <li class="active">{{ $country->country_name }} Directory</li>
                    </ol>
                </div>
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
                        <h2 class="widget-title">Countries</h2>
                        <ul class="listnone angle-double-right sidebarlist">
                            @foreach(CommonClass::GetCountry() as $catrow)
                            <li><a href="{{ url("countries-directory/$catrow->country_slug") }}">{{ $catrow->country_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <img src="{{ asset('webtheme/images/banner/2.jpg')}}" class="img-thumbnail" alt="">
                </div>
            </div>
            <div class="col-sm-9 cardbox">
                @if($data)
                @if(!empty(Session::get('countrydata')))
                <div class="alert alert-success" role="alert">
                    <strong>Thank you ! </strong> <a href="{{ url("downalodfile-country") }}">Click here for Download Directory</a>. </div>
                @endif
                <form action="{{ url("download-country-directory/$data->id") }}" method="post">
                    @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ asset($data->featured_image) }}" class="img-responsive">
                    </div>
                    <div class="col-sm-8">
                        <h1>{{ $data->title }}</h1>
                        <ul class="check-circle">
                            @foreach($data->countryfeature as $row)
                            <li>{{ $row->feature_name }}</li>
                            @endforeach
                        </ul>
                        <button type="submit" class="btn btn-default btn-lg">Buy Now</button> <b>@ US ${{ $data->price }}</b>


                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                         {!! $data->description !!}
                    </div>
                </div>
                <div class="row">
                    <div class="cols-sm-12 download-box text-center">
                        <h4>Download Now</h4>
                        <div class=""><button type="submit" class="btn btn-default btn-lg">Buy Now @ US ${{ $data->price }}</button></div>
                    </div>
                </div>
            </form>
                @else
                <h1 class="text-danger">Sorry no any data for now</h1>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c3ca221186af4ba"></script>
@endsection

@push('footerscript')
<script src="{{ asset('custom/wizard.js') }}"></script>
@endpush