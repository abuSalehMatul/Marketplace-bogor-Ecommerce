@extends('admin.layout.app')
@section('title','Seller List')
@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-title-box">
            <h4 class="page-title">Edit Seller</h4>
            <div class="clearfix"><a href="{{ route('sellerlist.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">
            {{ Form::open(array('route' => array('sellerlist.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files'=>true)) }}
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="">First Name</label>
                  <input type="text" name="first_name" class="form-control" required="" value="{{ old('first_name',$row->first_name) }}">
                  <div class="text-danger">{{ $errors->first('first_name') }}</div>
                </div>
                <div class="col-sm-6">
                  <label for="">Last Name</label>
                  <input type="text" name="last_name" value="{{ old('last_name',$row->last_name) }}" class="form-control" placeholder="Last Name" required="">
                  <span class="text-danger">{{ $errors->first('last_name') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Instant Type: <span>*</span></label>
                  {!! Form::select('instant_type',['1'=>'WhatsApp','2'=>'Skype','3'=>'WeChat'], old('instant_type',$row->instant_type),  ['class'=>'form-control ', 'required'=>'']) !!}
                  <span class="text-danger">{{ $errors->first('instant_type') }}</span>
                </div>
                <div class="col-sm-6">
                  <label>Instant ID: <span>*</span></label>
                  <input type="text" name="instant_id" value="{{ old('instant_id',$row->instant_id) }}" class="form-control" placeholder="Enter Instant ID" required>
                  <span class="text-danger">{{ $errors->first('instant_id') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Company Name: <span>*</span></label>
                  <input type="text" name="company_name" value="{{ old('company_name',$row->company_name) }}" class="form-control" placeholder="Enter Company Name (if any)" required="">
                  <span class="text-danger">{{ $errors->first('company_name') }}</span>
                </div>
                <div class="col-sm-6">
                  <label>Business Sector: <span>*</span></label>
                  {!! Form::select('business_sector',[''=>'-Business Sector-']+ CommonClass::CategoryList(), old('business_sector',$row->business_sector),  ['class'=>'form-control','required'=>'']) !!}
                  <span class="text-danger">{{ $errors->first('business_sector') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Status of Company: <span>*</span></label>
                  {!! Form::select('company_status',[''=>'Status of Company','1'=>'Manufacturer','2'=>'Exporter'], old('company_status',$row->company_status),  ['class'=>'form-control','required'=>'']) !!}

                  <span class="text-danger">{{ $errors->first('company_status') }}</span>
                </div>
                <div class="col-sm-6">
                  <label>Designation: <span>*</span></label>
                  <input type="text" name="designation" value="{{ old('designation',$row->degignation) }}" class="form-control" placeholder="Your Designation (if any)">
                  <span class="text-danger">{{ $errors->first('designation') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Contact Number: <span>*</span></label>
                  <input type="text" name="contact_number" value="{{ old('contact_number',$row->contact_number) }}" class="form-control" required="" placeholder="Contact Number">
                  <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                </div>
                <div class="col-sm-6">
                  <label>Website: <span>*</span></label>
                  <input type="text" name="website" value="{{ old('website',$row->website) }}" class="form-control" placeholder="Website (eg: www.domain.com)">
                  <span class="text-danger">{{ $errors->first('website') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Address Line1: <span>*</span></label>
                  <input type="text" name="address1" value="{{ old('address1',$row->address1) }}" class="form-control" required="" placeholder="Address Line1">
                  <span class="text-danger">{{ $errors->first('address1') }}</span>
                </div>
                <div class="col-sm-6">
                  <label>Address Line2: <span>*</span></label>
                  <input type="text" name="address2" value="{{ old('address2',$row->address2) }}" class="form-control" required="" placeholder="Address Line2">
                  <span class="text-danger">{{ $errors->first('address2') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label>City: <span>*</span></label>
                  <input type="text" name="city" value="{{ old('city',$row->city) }}" class="form-control" required="" placeholder="City">
                  <span class="text-danger">{{ $errors->first('city') }}</span>
                </div>
                <div class="col-sm-6">
                  <label>State: <span>*</span></label>
                  <input type="text" name="state" value="{{ old('state',$row->state) }}" class="form-control" required="" placeholder="State">
                  <span class="text-danger">{{ $errors->first('state') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Postal/Zip code: <span>*</span></label>
                  <input type="text" name="postal" value="{{ old('postal',$row->postal) }}" class="form-control" required="" placeholder="Postal/Zip code">
                  <span class="text-danger">{{ $errors->first('postal') }}</span>
                </div>
                <div class="col-sm-6">
                  <label>Country: <span>*</span></label>
                  {!! Form::select('country',[''=>'-Select Country-']+ CommonClass::CountryList(), old('country',$row->country), ['class'=>'form-control','required'=>'']) !!}
                  <span class="text-danger">{{ $errors->first('country') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Sell In: <span>*</span> </label>
                  <label class="radio-inline">
                    <input type="radio" name="sell_in" id="Radios1" value="1" {{ ($row->sell_in==1)?"checked":'' }} required="" >
                    Africa
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="sell_in" id="Radios2" value="2" {{ ($row->sell_in==2)?"checked":'' }} required="">
                    Global
                  </label>
                  <span class="text-danger">{{ $errors->first('sell_in') }}</span>
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

