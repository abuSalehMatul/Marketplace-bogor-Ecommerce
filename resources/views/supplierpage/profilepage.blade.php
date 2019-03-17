@extends('layout.app')
@php
$sell_in=($supplier->sell_in==1)?'Africa':'Global';
@endphp
@section('title',"$supplier->company_name supplier in $sell_in")
@push('headerscript')
@endpush

@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>{{ $supplier->company_name }} Supplier in {{ $sell_in }}</h1>
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
                                    <a href="#"><img src="{{ asset($supplier->sellerprofile->logo) }}" alt="wedding venue" class="img-responsive"></a>
                                </div>
                            </div>
                            <!-- /.venue pic -->
                            <div class=" col-md-8 no-left-pd">
                                <!-- venue details -->
                                <div class="vendor-list-details">
                                    <div class="caption">
                                        <!-- caption -->
                                        <h2>{{ $supplier->company_name }}</h2>
                                        <p>(Sell/Buy In {{ $sell_in }})</p>
                                        <p class="location"><i class="fa fa-map-marker"></i> {{ $supplier->state.", ".$supplier->sellercountry->country_name }}</p>
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
                                    {!! $supplier->sellerprofile->profile_description !!}
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
                    <form id="makeenq" method="post" action="{{ url("enquiry-for-seller/$supplier->id") }}" >
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
                            <div id="productcaro" class="owl-carousel owl-theme mycsutom">
                        @foreach($supplier->product as  $pro)
                        <div class="item testimonial-block">
                            <div class="couple-pic"><a href="{{ url("seller-product/$pro->product_slug/$pro->unique_code") }}"><img src="{{ asset($pro->featured_image) }}" alt="" class="img-responsive" ></a></div>

                            <div class="couple-info">
                                <div class="name"><a href="{{ url("seller-product/$pro->product_slug/$pro->unique_code") }}">{{ $pro->product_name }}</a></div>
                            </div>
                            <div class="bottom-sec">
                                <div class="name"><a  href="{{ url("seller-product/$pro->product_slug/$pro->unique_code") }}" class="btn btn-primary btn-sm" type="">Read More</a></div>
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
  });
    </script>
    <script>
   $('#makeenq').on('submit', function() {
    var AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";
    if(AuthUser){
        return true;
    }else{
        $(".loginerror").addClass('text-danger')
        alert("First need to login/register");
         return false;
    }   
    });

</script>
    @endpush