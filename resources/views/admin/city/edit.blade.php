@extends('admin.layout.app')
@section('title','City')
@section('content')
<link href="{{ asset('theme/default/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit City</h4>
                        <div class="clearfix"><a href="{{ route('city.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box">
                        {{ Form::open(array('route' => array('city.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH')) }}
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Coutry Name</label>
                                    {!! Form::select('country_name',[''=>'-Select Country-']+ CommonClass::CountryList(), old('country_name',$row->country_id), ['class'=>'form-control','required']) !!}
                                </div>
                                <div class="col-md-6">
                                    <label>City Name</label>
                                    <input type="text" name="city_name" value="{{ old('city_name',$row->city_name) }}" placeholder="Enter here..." class="form-control" required="">
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
                    </div>
                </form>
            </div>
        </div>
    </div>


</div> <!-- container -->

</div> <!-- content -->

</div>
@endsection
