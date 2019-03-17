@extends('layout.app')
@section('title',"$prow->category_name Featured Products")
@push('headerscript')
@endpush
@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>{{ $prow->category_name }} Featured Products</h1>
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
                    <li class="active">{{ $prow->category_name }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="filter-box">
        <div class="container">
            <div class="row filter-form">
                <div class="col-md-12">
                    <h4>Refine Your Search</h4>
                </div>
                <form action="{{ url('featured-products') }}">
                    <div class="col-sm-3">
                         {!! Form::select('category',[''=>'--Select Category--']+CommonClass::FeaturedProduct()->pluck('category_name','category_slug')->toArray(), old('product',$prow->category_slug),  ['class'=>'form-control ', 'required'=>'']) !!}
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-block">Refine Your Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                @foreach($result as $prow)
                <div class="col-md-3 vendor-box">
                    <!-- venue box start-->
                    <div class="vendor-image">
                        <!-- venue pic -->
                        <a href="{{ url("seller-product/$prow->product_slug/$prow->unique_code") }}"><img src="{{ asset($prow->featured_image) }}" alt="{{ $prow->product_name }}" title="{{ $prow->product_name }}" class="img-responsive"></a>
                    </div>
                    <!-- /.venue pic -->
                    <div class="vendor-detail">
                        <!-- venue details -->
                        <div class="caption">
                            <!-- caption -->
                            <h2><a href="{{ url("seller-product/$prow->product_slug/$prow->unique_code") }}" class="title">{{ $prow->product_name }}</a></h2>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                        </div>
                        <!-- /.caption -->
                        <div class="vendor-price">
                            <div class="price"><a href="{{ url("seller-product/$prow->product_slug/$prow->unique_code") }}" class="btn btn-primary">Read More <i class="fa fa-arrow-right"></i></a></div>
                        </div>
                    </div>
                    <!-- venue details -->
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 tp-pagination">
                    <ul class="pagination">
                       {{ $result->links() }}
                    </ul>
                </div>
            </div>
            @include('layout.bottomad')
        </div>
    </div>
@endsection