@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
@endpush
@extends('layout.app')

@section('content')
@php 
$user=Auth::user();
$buyer=$user->buyer;
@endphp
<div class="tp-dashboard-head">
  <!-- page header -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 profile-header">
        <div class="profile-pic col-md-2"><img src="images/profile-dashbaord.png" alt=""></div>
        <div class="profile-info col-md-9">
          <h1 class="profile-title">{{ $buyer->first_name }}<small>Welcome Back memeber</small></h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.page header -->

<div class="main-container">
  <div class="container">
    <div class="row">
      @include('layout.buyersidebar')
      <div class="col-md-9">
        <div class="row well-box">
          <div class="col-xs-12 ">
            <div class="page-title-box">
              <h4 class="page-title pull-left">Post</h4>
              <div class="clearfix"><a href="{{ route('post.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
            </div>
          </div>
          <div class="col-xs-12 section-space20">
            {{ Form::open(array('route' => array('post.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files' => true)) }}
            <div class="row">
             <div class="form-group">
               <div class="col-sm-12">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" required="" value="{{ old('title',$row->title) }}">
                <div class="text-danger">{{ $errors->first('title') }}</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <label for="">Description</label>
                <textarea name="description" class="form-control">{{ old('description',$row->description) }}</textarea>
                <div class="text-danger">{{ $errors->first('description') }}</div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="form-group">
                <div class="col-md-2">
                  <label>Product You want to:</label>
                </div>
                <div class="col-md-4">
                  <label class="radio-inline"><input type="radio" value="1" name="post_type"  {{ ($row->post_type==1)?"checked":'' }} >Buy</label>
                  <label class="radio-inline"><input type="radio" value="2" name="post_type" {{ ($row->post_type==2)?"checked":'' }} >Sell</label>
                </div>
                <div class="col-md-2">
                  <label>Product Type:</label>
                </div>
                <div class="col-md-4">
                  <label class="radio-inline"><input type="radio" value="1" name="product_type"  {{ ($row->product_type==1)?"checked":'' }} >New</label>
                  <label class="radio-inline"><input type="radio" value="2" name="product_type" {{ ($row->product_type==2)?"checked":'' }} >Used</label>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-md-12">
              <button class="btn btn-primary btn-sm pull-right" type="submit">Save</button>
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
@endsection