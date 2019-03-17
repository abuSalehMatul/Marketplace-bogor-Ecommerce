@extends('layout.app')
@section('title','Edit Side Banner')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
@endpush
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
        <div class="row well-box">
          <div class="col-xs-12 ">
            <div class="page-title-box">
              <h4 class="page-title pull-left">Sidbar Banner</h4>
              <div class="clearfix"><a href="{{ route('sidebarbanner.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
            </div>
          </div>
          <div class="col-xs-12 section-space20">
            {{ Form::open(array('route' => array('sidebarbanner.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files' => true)) }}
            <div class="row">
              <div class="form-group">
                <div class="col-sm-12">
                  <label for="">Banner Image</label>
                  <input type="file" name="banner_image" class="form-control" onchange="loadFile(event, 'banner')" accept="image/*" >
                  <div class="text-danger">{{ $errors->first('banner_image') }}</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-md-12">
                  <img src="{{ asset($row->banner_image) }}" class="img-thumbnail img-responsive" alt="" id="banner" >
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
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('footerscript')
<script>

  $(document).ready(function(){
    var i = 1;
    $('#add_row').on('click',function(){
      var newrow=$("<tr>");
      var col="";
      col += '<td><input type="file" name="new_image[]" class="form-control" required="" accept="image/*" required=""></td>';
      col += '<td><button class="btn-sm btn btn-danger" id="deletebutton"><i class="fa fa-times"></i></button></td>';
      newrow.append(col); i++;
      $("table.mul").append(newrow);
    });

    $("table.mul").on("click", "#deletebutton", function(event){
      $(this).closest("tr").remove();
    });

  });

</script>

<script>
  var loadFile = function (event, imgid) {
    var output = document.getElementById(imgid);
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>


@endpush
