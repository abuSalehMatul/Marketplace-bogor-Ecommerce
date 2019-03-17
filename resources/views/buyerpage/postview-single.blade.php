@extends('layout.app')
@section('title',"$buyerpost->title - buyer in $buyerpost->country_name")
@push('headerscript')
@endpush

@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>{{ $buyerpost->title }}</h1>
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
                <div class="cardbox">
                    <h2 class="widget-title">{{ $buyerpost->title }}</h2>
                    <h4 class="post-title">Buyer want to {{ ($buyerpost->post_type==1)?"Buy":"Sell" }}</h4>
                    <div class="post-meta"> <span class="date-meta">ON <a href="#">{{ date('d F, Y', strtotime($buyerpost->created_at)) }}</a> /</span> <span class="admin-meta">BY <a href="#">{{ $buyerpost->first_name }}</a> /</span> <span class="tag-meta">IN {{ "$buyerpost->state, $buyerpost->country_name" }}</span> </div>
                    <div>
                        {!! $buyerpost->description !!}
                    </div>
                </div>
                <br>
                <div class="side-box" id="inquiry">
                    <h2>Send Enquiry to Buyer</h2>
                    <p>Fill in your details and send e-mail to buyer.</p>
                    @guest
                    <div class="col-sm-12">
                        <h4 class="loginerror">First need to login/register</h4>
                        <a href="{{ url('login') }}">Login</a>&nbsp;|&nbsp;
                        <a href="{{ url('seller-register') }}">Register as Seller</a>&nbsp;|&nbsp;
                        <a href="{{ url('buyer-register') }}">Register as Buyer</a>
                    </div>
                    @endif
                    <form id="makeenq" method="post"  action="{{ url("enquiry-for-buyer/".$buyerpost->id) }}">
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