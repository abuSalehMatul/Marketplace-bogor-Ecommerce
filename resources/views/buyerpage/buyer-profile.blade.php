@extends('layout.app')
@php
$sell_in=($buyer->sell_in==1)?'Africa':'Global';
@endphp
@section('title',"$buyer->company_name buyer in $sell_in")
@push('headerscript')
@endpush

@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>{{ $buyer->company_name }} Supplier in {{ $sell_in }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-space80">
    <!-- Feature Blog Start -->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="vendor-box-list">
                        <!-- vendor list -->
                        <div class="row">
                            <div class="col-md-4 no-right-pd">
                                <div class="vendor-image">
                                    <!-- venue pic -->
                                    <a href="#"><img src="{{ asset($buyer->buyerprofile->logo) }}" alt="wedding venue" class="img-responsive"></a>
                                </div>
                            </div>
                            <!-- /.venue pic -->
                            <div class=" col-md-8 no-left-pd">
                                <!-- venue details -->
                                <div class="vendor-list-details">
                                    <div class="caption">
                                        <!-- caption -->
                                        <h2>{{ $buyer->company_name }}</h2>
                                        <p>(Sell/Buy In {{ $sell_in }})</p>
                                        <p class="location"><i class="fa fa-map-marker"></i> {{ $buyer->state.", ".CommonClass::GetCountryName($buyer->country) }}</p>
                                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                    </div>
                                    <!-- /.caption -->
                                    <div class="vendor-price">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="st-tabs">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#about" title="About Company" aria-controls="about" role="tab" data-toggle="tab" aria-expanded="true"> <i class="fa fa-list"></i><span class="tab-title"> About Company</span></a>
                                </li>
                                <li role="presentation" class=""> <a href="#makeEnquiry" title="Send Enquiry" aria-controls="makeEnquiry" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa  fa-send"></i> <span class="tab-title"> Send Enquiry</span> </a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- tab content start-->
                                <div role="tabpanel" class="tab-pane fade active in" id="about">
                                    {!! $buyer->buyerprofile->profile_description !!}
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="makeEnquiry">
                                    <div class="venue-details">
                    @guest
                    <div class="col-sm-12">
                        <h4 class="loginerror">First need to login/register</h4>
                        <a href="{{ url('login') }}">Login</a>&nbsp;|&nbsp;
                        <a href="{{ url('seller-register') }}">Register as Seller</a>&nbsp;|&nbsp;
                        <a href="{{ url('buyer-register') }}">Register as Buyer</a>
                    </div>
                    @endif
                    <form id="makeenq" method="post"  action="{{ url("enquiry-for-buyer/".$buyer->id) }}">
                        @csrf
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="name-one">Name:<span class="required">*</span></label>
                            <div class="">
                                <input id="name-one" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="phone">Phone:<span class="required">*</span></label>
                            <div class="">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" required=""></div>
                                <div class="text-danger">{{ $errors->first('phone') }}</div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="email-one">E-Mail:<span class="required">*</span></label>
                                <div class="">
                                    <input id="email-one" name="email_id" type="text" placeholder="E-Mail" class="form-control input-md" required="">
                                    <div class="text-danger">{{ $errors->first('email_id') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email-one">Message<span class="required">*</span></label>
                                <div class="">
                                    <textarea name="message" class="form-control"></textarea>
                                    <div class="text-danger">{{ $errors->first('message') }}</div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button name="submit"  class="btn btn-primary btn-lg btn-block">Send Enquiry now</button>
                            </div>
                        </form>
                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab content start-->
                            <div class="form-group">
                        <h2>Other's Post</h2>
                        @foreach($buyer->buyerpost as  $pro)
                        <div class="vendor-box-list type">
                    <!-- vendor list -->
                    <div class="row">
                        <!-- /.venue pic -->
                        <div class="col-md-12">
                            <!-- venue details -->
                            <div class="vendor-list-details">
                                <div class="caption">
                                    <!-- caption -->
                                    <h2><a href="{{ url("buyer-post/$pro->post_slug/$pro->unique_code") }}" class="title">{{ $pro->title }}</a></h2>
                                </div>
                                <!-- /.caption -->

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="vendor-price">
                                <a href="{{ url("buyer-post/$pro->post_slug/$pro->unique_code") }}" class="btn btn-primary btn-sm">Read More</a>&nbsp;&nbsp;
                                <a href="{{ url("buyer-post/$pro->post_slug/$pro->unique_code") }}" class="btn btn-primary btn-sm">Send Mail</a>
                                  <span class="pull-right">For {{ ($pro->product_type==1)?'Buy':'Sell' }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                        @endforeach
                    </div>
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
    <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c3ca221186af4ba"></script>
    @endsection
    @push('footerscript')
    <script>
         $(".mycsutom").owlCarousel({
  
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:false,
      autoPlay: 5000,
      items : 4,
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
    </script>
    @endpush