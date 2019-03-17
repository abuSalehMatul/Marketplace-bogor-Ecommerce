@extends('admin.layout.app')
@section('title','Website Profile')
@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-title-box">
            <h4 class="page-title">Website Profile</h4>
            <div class="clearfix">{{-- <a href="{{ route('website-profile.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a> --}}</div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">
            {{ Form::open(array('route' => array('website-profile.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files'=>true)) }}
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="">Logo</label>
                  <input type="file" onchange="loadFile(event, 'logo')" class="form-control" name="logo" value="" placeholder="">
                  <div class="text-danger">{{ $errors->first('logo') }}</div>
                </div>
                <div class="col-md-6">
                  <img src="{{ asset($row->logo) }}" class="img-thumbanil img-responsive" id="logo" alt="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Website Name: <span>*</span></label>
                  <input type="text" name="website_name" value="{{ old('website_name',$row->website_name) }}" class="form-control" required>
                  <span class="text-danger">{{ $errors->first('website_name') }}</span>
                </div>
                <div class="col-sm-6">
                  <label>Phone No: <span>*</span></label>
                  <input type="tel" name="phone_no" value="{{ old('phone_no',$row->phone_no) }}" class="form-control" required>
                  <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label>E-mail ID: <span>*</span></label>
                  <input type="text" name="email_id" value="{{ old('email_id',$row->email_id) }}" class="form-control" required="">
                  <span class="text-danger">{{ $errors->first('email_id') }}</span>
                </div>
                <div class="col-sm-6">
                  <label>Support E-mail ID: <span>*</span></label>
                  <input type="text" name="support_email_id" value="{{ old('support_email_id',$row->support_email_id) }}" class="form-control" required="">
                  <span class="text-danger">{{ $errors->first('support_email_id') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-12">
                  <label>Facebook Url: <span>*</span></label>
                  <input type="text" name="fb_url" value="{{ old('fb_url',$row->fb_url) }}" class="form-control" required="">
                  <span class="text-danger">{{ $errors->first('fb_url') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-12">
                  <label>Youtube Url: <span>*</span></label>
                  <input type="text" name="youtube_url" value="{{ old('youtube_url',$row->youtube_url) }}" class="form-control" required="">
                  <span class="text-danger">{{ $errors->first('youtube_url') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-12">
                  <label>Twitter Url: <span>*</span></label>
                  <input type="text" name="twitter_url" value="{{ old('twitter_url',$row->twitter_url) }}" class="form-control" required="">
                  <span class="text-danger">{{ $errors->first('twitter_url') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-12">
                  <label>Instgram Url: <span>*</span></label>
                  <input type="text" name="inst_url" value="{{ old('inst_url',$row->inst_url) }}" class="form-control" required="">
                  <span class="text-danger">{{ $errors->first('inst_url') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-12">
                  <label>Google+ Url: <span>*</span></label>
                  <input type="text" name="gplus_url" value="{{ old('gplus_url',$row->gplus_url) }}" class="form-control" required="">
                  <span class="text-danger">{{ $errors->first('gplus_url') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-12">
                  <label>Business Address: <span>*</span></label>
                  <textarea name="business_address" class="form-control">{{ old('business_address',$row->business_address) }}</textarea>
                  <span class="text-danger">{{ $errors->first('business_address') }}</span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <div class="col-md-12">
                  <button class="pull-right btn btn-primary btn-sm" type="submit">Save</button>
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
</div>
@endsection

@push('footerscript')
<script>
  var loadFile = function (event, imgid) {
    var output = document.getElementById(imgid);
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endpush