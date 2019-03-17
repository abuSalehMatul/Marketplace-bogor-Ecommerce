@extends('admin.layout.app')
@section('title','Community')
@section('content')
<link href="{{ asset('theme/default/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Community</h4>
                        <div class="clearfix"><a href="{{ route('community.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box">
                        {{ Form::open(array('route' => array('community.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH')) }}
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Facebook</label>
                                    <input type="text" name="fb" value="{{ old('fb',$row->fb) }}" placeholder="Enter here..." class="form-control">
                                    <div class="text-danger">{{ $errors->first('fb') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" value="{{ old('twitter',$row->twitter) }}" placeholder="Enter here..." class="form-control">
                                    <div class="text-danger">{{ $errors->first('twitter') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>WhatApp</label>
                                    <input type="text" name="whatsapp" value="{{ old('whatsapp',$row->whatsapp) }}" placeholder="Enter here..." class="form-control">
                                    <div class="text-danger">{{ $errors->first('whatsapp') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Google+</label>
                                    <input type="text" name="gplus" value="{{ old('gplus',$row->gplus) }}" placeholder="Enter here..." class="form-control">
                                    <div class="text-danger">{{ $errors->first('gplus') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Instagram</label>
                                    <input type="text" name="instagram" value="{{ old('instagram',$row->instagram) }}" placeholder="Enter here..." class="form-control">
                                    <div class="text-danger">{{ $errors->first('instagram') }}</div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div> <!-- container -->

</div> <!-- content -->

</div>
@endsection
