@extends('layout.app')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('custom/style.css') }}">

@endpush
@section('title','Business Match Matching')
@section('content')
@php 
$user=Auth::user();
$seller=$user->seller;
@endphp
<div class="tp-dashboard-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 profile-header">
                <div class="profile-pic col-md-2"><img src="images/profile-dashbaord.png" alt=""></div>
                <div class="profile-info col-md-9">
                    <h1 class="profile-title">{{ $seller->first_name }}<small>Welcome Back memeber</small></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page header -->

<div class="main-container">
    <div class="container">
        <div class="row">
            @include('layout.sidebar')
            <div class="col-md-9">
                @foreach ($result as $row)
                <div class="vendor-box-list">
                    <!-- vendor list -->
                    <div class="row">
                        <div class="col-md-2 no-right-pd">
                            <div class="vendor-image">
                                <!-- venue pic -->
                                <a href="{{ url("buyer-post/$row->post_slug") }}"><img src="{{ asset($row->logo) }}" alt="wedding venue" class="img-responsive"></a>
                            </div>
                        </div>
                        <!-- /.venue pic -->
                        <div class="col-md-10 no-left-pd">
                            <!-- venue details -->
                            <div class="vendor-list-details">
                                <div class="caption">
                                    <!-- caption -->
                                    <h2><a href="{{ url("buyer-post/$row->post_slug") }}" class="title">{{ $row->company_name }}</a></h2>
                                    <p>{{ $row->country_name }}, {{ $row->city }}</p>
                                    <hr>
                                </div>
                                <!-- /.caption -->
                            </div>
                        </div>

                        <div class="col-md-10">
                            <!-- venue details -->
                            <div class="vendor-list-details">
                                <div class="caption">
                                    <h5><p><strong>Representative Name: </strong>{{ $row->first_name }}<p></h5>
                                    <h5><p><strong>Business Sector: </strong>{{ $row->category_name }}<p></h5>
                                    @if ($row->post_type==1)
                                    <h5><p><strong>Products They Buy: </strong>{{ $row->title }}<p></h5>
                                    @else
                                    <h5><p><strong>Products They Sell: </strong>{{ $row->title }}<p></h5>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="vendor-price">
                                    <a href="{{ url("buyer-post/$row->post_slug") }}" class="btn btn-info btn-sm">View Detail</a>&nbsp;&nbsp;
                                    <a href="#" onclick="showmodel({{ $row->id }})"  class="btn btn-info btn-sm">Send Mail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2>Send Enquiry to Buyer</h2>
            </div>
            <div class="modal-body">
                <p>Fill in your details and send e-mail to buyer.</p>
                <form class="">
                    <input type="hidden" name="" id="postid">
                    <div class="form-group">
                        <label class="control-label" for="name-one">Name:<span class="required">*</span></label>
                            <div class="">
                                <input id="name-one" name="name-one" type="text" placeholder="Name" class="form-control input-md" required="">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="phone">Phone:<span class="required">*</span></label>
                        <div class="">
                            <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" required="">
                            <span class="help-block"> </span> </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email-one">E-Mail:<span class="required">*</span></label>
                        <div class="">
                            <input id="email-one" name="email-one" type="text" placeholder="E-Mail" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email-one">Message<span class="required">*</span></label>
                        <div class="">
                            <textarea name="" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button name="submit" class="btn btn-primary btn-lg btn-block">Send Enquiry now</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footerscript')
<script>
    function showmodel(id){
        $('#myModal').modal('show');
        $('#postid').val(id);
    }
</script>
@endpush