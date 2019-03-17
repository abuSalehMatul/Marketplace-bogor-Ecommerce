@extends('layout.app')

@section('content')
<style>
.nav-tabs a{
    color#000 !important;
}
</style>

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                   {{--  <li><a href="#">{{ $row->category->category_name }}</a></li> --}}
                    <li>{{ $row->product_name }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 content-left">
                <!-- content left -->
                <div class="row">
                    <div class="col-md-6 real-wedding-content">
                        <!-- blog holder -->
                        <img src="{{ asset($row->featured_image) }}" alt="" class="img-thumbnail">
                        <!-- /.post area -->
                    </div>
                    <!-- /.blog holder -->
                    <div class="col-md-6 post-holder">
                        <!-- blog holder -->
                        <div class="post-area">
                            <h1>{{ $row->product_name }}</h1>
                            <!-- post area -->
                            <p>{{ $row->short_description }}</p>
                            <a href="#" class="btn btn-primary"><i class="fa fa-envelope"></i> <span>Send An Enquiry</span></a>
                        </div>
                        <!-- /.post area -->
                    </div>
                    <!-- /.blog holder -->
                </div>
                <div class="row section-space40">
                    <div class="venue-details">
                        <div class="col-md-12">
                            <div class="st-tabs">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#description" title="Description" aria-controls="description" role="tab" data-toggle="tab"> <i class="fa fa-list"></i><span class="tab-title"> Description</span></a>
                                    </li>
                                    <li role="presentation"> <a href="#profile" title="Company Profile" aria-controls="about" role="tab" data-toggle="tab"><i class="fa fa-book"></i> <span class="tab-title"> Company Profile</span> </a> </li>
                                    <li role="presentation"> <a href="#contact" title="Contact Supplier" aria-controls="about" role="tab" data-toggle="tab"><i class="fa fa-user"></i> <span class="tab-title"> Contact Supplier</span> </a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- tab content start-->
                                    <div role="tabpanel" class="tab-pane fade in active" id="description">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    {!! $row->full_description !!}
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile">
                                        <div class="venue-details">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            </p>
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            </p>
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                            </p>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="contact">
                                        <div class="venue-details">
                                            <form class="">
                                                <div class="form-group">
                                                    <label class="control-label" for="name-one">Your Requirment:<span class="required">*</span></label>
                                                    <div class="">
                                                        <textarea name="requirments" class="form-control" placeholder="Enter Full Requirment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Email:<span class="required">*</span></label>
                                                            <div class="">
                                                                <input type="text" name="email" value="" placeholder="Enter your Email" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Full Name:<span class="required">*</span></label>
                                                            <div class="">
                                                                <input type="text" name="full_name" value="" placeholder="Enter your Full Name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Company Name:<span class="required">*</span></label>
                                                            <div class="">
                                                                <input type="text" name="company_name" value="" placeholder="Enter Your Company Name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Country:<span class="required">*</span></label>
                                                            <div class="">
                                                                <input type="text" name="country_name" value="" placeholder="Enter your Country Name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Mobile No:<span class="required">*</span></label>
                                                            <div class="">
                                                                <input type="text" name="mobile" value="" placeholder="Enter your Mobile No." class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <button name="submit" class="btn btn-primary btn-md pull-right">Submit</button>
                                                </div>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content left -->
            <div class="col-md-4 right-sidebar">
                <!-- right sidebar -->
                <div class="row">
                    <div class="col-md-12 widget widget-search">
                        <!-- widget -->
                        <div class="well-box">
                            <h2 class="widget-title">Search bar</h2>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-lg" type="button"> <i class="fa fa-search"></i> </button>
                                </span> </div>
                                <!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection