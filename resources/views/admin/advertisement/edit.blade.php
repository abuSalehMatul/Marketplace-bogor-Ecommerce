@extends('admin.layout.app')
@section('title','Edit')
@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-title-box">
            <h4 class="page-title">{{ $header }}</h4>
            <div class="clearfix"><a href="{{ url($url) }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">
            {{ Form::open(array('route' => array('advertisement.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files'=>true)) }}
            <div class="row">
              <div class="form-group">
                <div class="col-sm-12">
                  <label for="">Banner Image</label>
                  <input type="file" name="banner_image" class="form-control" onchange="loadFile(event, 'banner')" accept="image/*">
                  <div class="text-danger">{{ $errors->first('banner_image') }}</div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <img src="{{ asset($row->banner_image) }}" class="img-thumbnail img-responsive" alt="" id="banner" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-md-12">
                  <button class="btn btn-primary btn-sm" type="submit">Save</button>
                </div>
              </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div> <!-- container -->
</div> <!-- content -->
@endsection


@push('footerscript')
<script>
  var loadFile = function (event, imgid) {
    var output = document.getElementById(imgid);
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endpush