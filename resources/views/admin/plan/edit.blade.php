@extends('admin.layout.app')
@section('title','Plan')
@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">


      <div class="row">
        <div class="col-xs-12">
          <div class="page-title-box">
            <h4 class="page-title">Edit Plan</h4>
            <div class="clearfix"><a href="{{ route('sellerplan.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card-box">
            {{ Form::open(array('route' => array('sellerplan.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files'=>true)) }}
            <div class="row">
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="">Plan Name</label>
                        <input type="text" name="plan_name" class="form-control" required="" value="{{ old('plan_name',$row->plan_name) }}">
                        <div class="text-danger">{{ $errors->first('plan_name') }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="">Charge</label>
                        <input type="text" name="charge" class="form-control" required="" value="{{ old('charge',$row->charge) }}">
                        <div class="text-danger">{{ $errors->first('charge') }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="">Months</label>
                        <input type="text" name="plan_month" class="form-control" required="" value="{{ old('plan_month',$row->plan_month) }}">
                        <div class="text-danger">{{ $errors->first('plan_month') }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="">Description</label>
                    <textarea maxlength="255" name="description"class="form-control" requir="">{{ old('description',$row->description) }}</textarea>
                    <div class="text-danger">{{ $errors->first('description') }}</div>
                  </div>
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
          </form>
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
