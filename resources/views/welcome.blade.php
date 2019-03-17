@extends('layout.app')
@section('title',"Buy, Sell Products, Download Africa Directory")
@push('headerscript')
<style>
    .bg-greyb{
    background: #9caebba3;
}
</style>
@endpush
@section('content')

<div class="slider-bg">
    <!-- slider start-->
    <div id="slider" class="owl-carousel owl-theme slider">
        <div class="item"><img src="{{ asset('webtheme/images/banner/1.jpg') }}" alt="Wedding couple just married"></div>
        <div class="item"><img src="{{ asset('webtheme/images/banner/2.jpg') }}" alt="Wedding couple just married"></div>
        <div class="item"><img src="{{ asset('webtheme/images/banner/1.jpg') }}" alt="Wedding couple just married"></div>
         <div class="item"><img src="{{ asset('webtheme/images/banner/2.jpg') }}" alt="Wedding couple just married"></div>
    </div>
    <div class="find-section">
        <!-- Find search section-->
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 finder-block">
                    <div class="finder-caption">
                        <h1>Find your perfect Product</h1>
                        <p>Over <strong>1200+ Products</strong> for you &amp; Find the perfect &amp; save value.</p>
                    </div>
                    <div class="finderform">
                        <form action="{{ url("search") }}">
                            <div class="row">
                               <div class="col-md-3">
                                {!! Form::select('for',['companies'=>'Companies','products'=>'Products'], old('for'),  ['class'=>'form-control ', 'required'=>'']) !!}
                            </div>
                                <div class="form-group col-md-3">
                                    <select name="search" class="form-control" required="">
                                        <option value="">Select a Vendor</option>
                                        <option value="seller-in-africa">Seller in Africa</option>
                                        <option value="seller-in-global">Seller in Global</option>
                                        <option value="buyer-in-africa">Buyer in Africa</option>
                                        <option value="buyer-in-africa">Buyer in Global</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::select('category',[''=>'-Select Category-'] + CommonClass::CategoryList1(), old('category'), ['class'=>'form-control','required']) !!}
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Find search section-->
</div>
<style>
.seller-buyer-box{
background: #5def09;
color:black;
font: bolder;
box-shadow: 1px 1px #ed7a71;
}
</style>
<div class="">
    <div class="container">
            <div class="row">
                <div class="col-md-6 couple-block sellerhomebox seller-buyer-box">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="{{ asset('webtheme/images/vendor-done.svg') }}" alt="" style="height: 50px">
                        </div>
                        <div class="col-sm-9">
                            <h2>Are you a supplier ?</h2>
                            
                              <a href="{{ url('seller-register') }}" class="btn btn-primary">Join as Supplier</a>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6 couple-block buyerhomebox seller-buyer-box">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="{{ asset('webtheme/images/list.svg') }}" alt="" style="height: 50px">
                        </div>
                        <div class="col-sm-9">
                            <h2>Are you a Buyer ?</h2>
                              <a href="{{ url('buyer-register') }}" class="btn btn-primary">Join as Buyer</a> </div>
                        </div>
                    </div>
            </div>
        </div>
</div>
<!-- slider end-->
<div class="section-space40">
    <!-- Feature Blog Start -->
    <div class="container">
       <div class="row">
            <div class="col-md-12">
                <div class="section-title mb60 text-center table-responsive">
                    <h1>Featured <strong>Product</strong>, You Are Looking For </h1>
                </div>
            </div>
        </div>
        @php
            $seller_plan_priority = DB::table('seller_plan_priorities')
            ->orderBy('priority', 'desc')
            ->get();
           // print_r($seller_plan_priority);
           $total_array=array();
           $arr_size=array();
           $plan_ids=array();
          
           foreach($seller_plan_priority as $priority){
               array_push($arr_size,$priority->array_size);
               array_push($plan_ids,$priority->seller_plan_id);

           }
          
          
           foreach($plan_ids as $plan_ids){
               $i=0;
               $seller_id=[];
               $seller=App\Models\SellerPurchasePlan::where('plan_id',$plan_ids)->get();
               foreach($seller as $seller){
                   array_push($seller_id,$seller->id);
               }
          
               $random_keys=array();
              $a= sizeof($seller_id);
             
              if($arr_size[$i]> sizeof($seller_id)){
                  $arr_size[$i]=sizeof($seller_id);
              }
              $random_value_key = array_rand($seller_id,$arr_size[$i]);
            
             if($i==2){
                 break;
             }
             for($j=0;$j < sizeof($random_value_key) ; $j++){
                  $tem=$seller_id[$random_value_key[$j]];
                  array_push($total_array,$tem);
             }

                $i++;
             
           
               unset($seller_id);
               unset($random_keys);
           }
         //  print_r($total_array);
            
        @endphp
        <div class="row ">
                <div class="col-md-12 tp-testimonial">
                    <div id="productcaro" class="owl-carousel owl-theme mytesto">
                        <?php
                        $prod=array();
                        for($k=0;$k<sizeof($total_array);$k++){
                             $pro=App\Models\Product::where('seller_id',$total_array[$k])
                             ->where('status',1)
                             ->first(); 
                        if($pro==null){continue;} 
                            
                        ?>
                       
                       
                        <div class="item testimonial-block">
                            <div class="couple-pic"><a href="{{ url("seller-product/$pro->product_slug/$pro->unique_code") }}"><img src="{{ asset($pro->featured_image) }}" alt="" class="img-responsive" ></a>
                           
                            </div>
                              
                            <div class="couple-info">
                                <div class="name"><a href="{{ url("seller-product/$pro->product_slug/$pro->unique_code") }}">{{ $pro->product_name }}</a></div>
                            </div>
                            <div class="bottom-sec">
                                <div class="name"><a  href="{{ url("seller-product/$pro->product_slug/$pro->unique_code") }}" class="btn btn-primary btn-sm" type="">Request Now</a></div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
            </div>
            
        </div>
    </div>
</div>


<div class="section-space40">
        <!-- top location -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb60 text-center">
                    <h1>Featured Supplires</h1>
                    <p>thousand of product we are offering our best features products so you can get better way.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach(CommonClass::FeqaturedSeller()->take(8) as  $serow)
            <div class="col-md-3">
                <div class="real-wedding-block mb30">
                    <!-- real wedding block -->
                    <div class="real-wedding-img">
                        <a href="{{ url("supplier/$serow->company_slug/$serow->unique_code") }}"><img src="{{ asset($serow->logo) }}" alt="{{ $serow->company_name }}" class="img-responsive custimg-seller"></a>
                    </div>
                    <div class="real-wedding-info well-box text-center">
                        <h2 class="real-wedding-title"><a href="{{ url("supplier/$serow->company_slug/$serow->unique_code") }}" class="title">{{ $serow->company_name }}</a></h2>
                        <p class="real-wed-meta"><span class="wed-day-meta"><i class="icon-wedding-day icon-size-18"></i> {{ $serow->category_name }}</span></p>
                    </div>
                </div>
                <!-- /.real wedding block -->
            </div>
            @endforeach
        </div>
    </div>
</div>


<!-- Feature Blog End -->
<div class="section-space40">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb60 text-center table-responsive">
                    <h1>Browse Industries by <strong>Categories</strong></h1>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <ul class="check-circle broweseul">
                    @foreach(CommonClass::category() as  $catrow)
                    <li class="bg-white section-space20"><a href="{{ url("search?for=companies&search=seller-in-africa&category=$catrow->category_slug") }}">{{ $catrow->category_name }}</a></li>
                    @endforeach
                </ul>
            </div>
            
        </div>
       
    </div>
</div>
<div class="section-space40">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Download Industries/Countries Directory</h1>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h2>Industry wise directory</h2>
                <ul class="dir-ul">
                   @foreach(CommonClass::GetSector() as  $crow)
                   <li><a href="{{ url("sectors-directory/$crow->sector_slug") }}"><img src="{{ asset($crow->image) }}" width="20"> {{ $crow->sector_name }}</a></li>
                   @endforeach
                </ul>
            </div>
            <div class="col-sm-8">
                <h2>Country wise directory</h2>
                <ul class="dir-ul li32">
                   @foreach(CommonClass::GetCountry() as  $crow)
                   <li><a href="{{ url("countries-directory/$crow->country_slug") }}"><img src="{{ asset($crow->country_flag) }}" width="20"> {{ $crow->country_name }} Directory</a></li>
                   @endforeach
                </ul>
            </div>
        </div>
       
    </div>
</div>

    <div class="section-space40">
        <!-- top location -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Our Partner's</h1>
                        <p>thousand of product we are offering our best features products so you can get better way.</p>
                    </div>
                </div>
            </div>
            <style>
            .clienttesto img {
    /* height: 100% !important; */
    /* padding: 25px !important; */
                height: 100px !important;
                padding: 2px !important;
            }
            </style>
            <div class="row ">
                <div class="col-md-12 tp-testimonial">
                    <div id="productcaro1" class="owl-carousel owl-theme clienttesto">
                        @php
                            $partner=App\Models\Partner::all();
                        @endphp
                        @foreach($partner as $partner)
                        <div class="item testimonial-block">
                            <div class="couple-pic"><a href="{{$partner->url}}" target="block"><img src="{{ asset('uploads/partner/'.$partner->image) }}"  width="100px" height="100px"></a></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footerscript')

<script>
    $("#productcaro1").owlCarousel({
  
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:false,
      autoPlay: 5000,
      items : 5,
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
</script>
@endpush