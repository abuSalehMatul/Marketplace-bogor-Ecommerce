@extends('layout.app')
@section('title',"Top $catrow->category_name Buyer's")
@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>Top {{ $catrow->category_name }} Buyer's</h1>
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
                    {!! Form::select('search',['buyer-in-africa'=>'Buyer In Africa','buyer-in-global'=>'Buyer In Globel','3'=>'All'], old('search',$search['type']),  ['class'=>'form-control ', 'required'=>'']) !!}
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
                <div class="form-group">
                    <label class="radio-inline">
                      <input type="radio" name="product_type" value="all" checked=""><span class="label label-success">All</span>
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="product_type" value="1"><span class="label label-primary">New</span>
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="product_type" value="2"><span class="label label-danger">Used</span>
                  </label>
              </div>
                @foreach($buyer as $row)
                <div class="vendor-box-list type{{ $row->product_type }}">
                    <!-- vendor list -->
                    <div class="row">
                        <!-- /.venue pic -->
                        <div class="col-md-12">
                            <!-- venue details -->
                            <div class="vendor-list-details">
                                <div class="caption">
                                    <!-- caption -->
                                    <h2><a href="{{ url("buyer-post/$row->post_slug/$row->unique_code") }}" class="title">{{ $row->title }}</a></h2>
                                    <p class="location"><i class="fa fa-map-marker"></i> {{ "$row->state, " }} {{ CommonClass::GetCountryName($row->country) }}</p>
                                </div>
                                <!-- /.caption -->

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="vendor-price">
                                <a href="{{ url("buyer-post/$row->post_slug/$row->unique_code") }}" class="btn btn-primary btn-sm">Read More</a>&nbsp;&nbsp;
                                <a href="{{ url("buyer-post/$row->post_slug/$row->unique_code") }}" class="btn btn-primary btn-sm">Send Mail</a>
                                  <span class="pull-right">For {{ ($row->product_type==1)?'Buy':'Sell' }}</span>
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
         @include('layout.bottomad')
    </div>
</div>
@endsection
@push('footerscript')
<script>
    $('input[name=product_type]').click(function(){
        if($(this).val()==1){
            $(".type1").show();
            $(".type2").hide();
        }
        else if($(this).val()==2){
            $(".type2").show();
            $(".type1").hide();
        }
        else{
            $(".type2,.type1").show();
        }
    });
</script>
@endpush