@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
<link href="{{ asset('theme/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('theme/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('theme/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('theme/plugins/summernote/summernote.css') }}" rel="stylesheet" />

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
          <h1 class="profile-title">{{ $buyer->first_name }}<small>Welcome Back member</small></h1>
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
              <h4 class="page-title pull-left"></h4>
              <div class="clearfix"><a href="{{ route('post.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-plus"></i> View All Request</a></div>
            </div>
          </div>
          <div class="col-xs-12 section-space20">
            <form action="{{ route('post.store') }}" method="post" class="form-horizontal">
              @csrf
              <div class="row">
               <div class="form-group">
                 <div class="col-sm-12">
                  <label for="">Title</label>
                  <input type="text" name="title" class="form-control" required="" value="{{ old('title') }}">
                  <div class="text-danger">{{ $errors->first('title') }}</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-12">
                  <label for="">Description</label>
                  <textarea class="summernote" name="description" required="">
                  {{ old('description') }}</textarea>
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
                  <label class="radio-inline"><input type="radio" value="1" name="post_type" checked>Buy</label>
                  <label class="radio-inline"><input type="radio" value="2" name="post_type">Sell</label>
                </div>
                <div class="col-md-2">
                  <label>Product Type:</label>
                </div>
                <div class="col-md-4">
                  <label class="radio-inline"><input type="radio" value="1" name="product_type" checked>New</label>
                  <label class="radio-inline"><input type="radio" value="2" name="product_type">Used</label>
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

@push('footerscript')
<script>
  var loadFile = function (event, imgid) {
    var output = document.getElementById(imgid);
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<script src="{{ asset('theme/plugins/summernote/summernote.min.js') }}"></script>
<script>

  jQuery(document).ready(function(){

    $('.summernote').summernote({
        height: 350,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
      });

  });
</script>
@endpush