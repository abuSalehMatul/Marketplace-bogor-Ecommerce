@extends('layout.app')
@push('headerscript')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="{{ asset('custom/style.css') }}">
@endpush
@section('content')
<div class="tp-page-head">
  <!-- page header -->
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <div class="page-header text-center">
          <h1>Register as a Buyer</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-space80">
  <!-- Feature Blog Start -->
  <div class="container ">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
       <section class="form-box">

        <div class="row">
          <div class="col-md-12">

            <!-- Form Wizard -->
            <div class="form-wizard form-header-classic form-body-classic">

              <form role="form" class="section-space40" action="{{ url('buyer-store') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-12 alert alert-danger">
                    @if ($errors->any())
                    <div class="col-md-8 col-md-offset-2">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div><br />
                    @endif
                  </div>
                </div>

                <!-- Form progress -->
                <div class="form-wizard-steps form-wizard-tolal-steps-4">
                  <div class="form-wizard-progress">
                    <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                  </div>
                  <!-- Step 1 -->
                  <div class="form-wizard-step active">
                    <div class="form-wizard-step-icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                    <p>Personal Info</p>
                  </div>
                  <!-- Step 1 -->

                  <!-- Step 2 -->
                  <div class="form-wizard-step">
                    <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <p>Business Info</p>
                  </div>
                  <!-- Step 2 -->

                  <!-- Step 3 -->
                  <div class="form-wizard-step">
                    <div class="form-wizard-step-icon"><i class="fa fa-university" aria-hidden="true"></i></div>
                    <p>Complete</p>
                  </div>
                  <!-- Step 3 -->

                </div>
                <!-- Form progress -->


                <!-- Form Step 1 -->
                <fieldset>
                  <!-- Progress Bar -->
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                    </div>
                  </div>
                  <!-- Progress Bar -->
                  <h4>Personal Info: <span>Step 1 - 3</span></h4>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>First Name: <span>*</span></label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control required" placeholder="First Name">
                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Last Name: <span>*</span></label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control required" placeholder="Last Name">
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Instant ID: <span>*</span></label>
                        {!! Form::select('instant_type',[''=>'-Select Your Instant ID-','1'=>'WhatsApp','2'=>'Skype','3'=>'WeChat'], old('instant_type'),  ['class'=>'form-control required ', 'required'=>'']) !!}
                        <span class="text-danger">{{ $errors->first('instant_type') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Instant ID: <span>*</span></label>
                        <input type="text" name="instant_id" value="{{ old('instant_id') }}" class="form-control required" placeholder="Enter Instant ID">
                        <span class="text-danger">{{ $errors->first('instant_id') }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Username: <span>*</span></label>
                        <input type="email" name="username" value="{{ old('username') }}" class="form-control required" placeholder="Username" >
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password: <span>*</span></label>
                        <input type="password" name="password" value="" class="form-control required" placeholder="Password">
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                      </div>
                    </div>
                  </div>


                  <div class="form-wizard-buttons">
                    <button type="button" class="btn btn-next">Next</button>
                  </div>
                </fieldset>
                <!-- Form Step 1 -->


                <!-- Form Step 2 -->
                <fieldset>
                  <!-- Progress Bar -->
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    </div>
                  </div>
                  <!-- Progress Bar -->
                  <h4>Business Info : <span>Step 2 - 3</span></h4>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Company Name:</label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control" placeholder="Enter Company Name (if any)">
                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Business Sector: <span>*</span></label>
                        {!! Form::select('business_sector',[''=>'-Business Sector-']+ CommonClass::CategoryList(), old('business_sector'), ['class'=>'form-control required']) !!}
                        <span class="text-danger">{{ $errors->first('business_sector') }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Status of Company: <span>*</span></label>
                        {!! Form::select('company_status',[''=>'-Status of Company-','1'=>'Agent','2'=>'End User','3'=>'Reseller'], old('company_status'),  ['class'=>'form-control required', 'required'=>'']) !!}
                        <span class="text-danger">{{ $errors->first('company_status') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Designation:</label>
                        <input type="text" name="designation" value="{{ old('designation') }}" class="form-control" placeholder="Your Designation (if any)">
                        <span class="text-danger">{{ $errors->first('designation') }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Contact Number: <span>*</span></label>
                        <input type="text" name="contact_number" value="{{ old('contact_number') }}" class="form-control required" placeholder="Contact Number">
                        <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Website:</label>
                        <input type="text" name="website" value="{{ old('website') }}" class="form-control" placeholder="Website (eg: www.domain.com)">
                        <span class="text-danger">{{ $errors->first('website') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Address Line1: <span>*</span></label>
                        <input type="text" name="address1" value="{{ old('address1') }}" class="form-control required" placeholder="Address Line1">
                        <span class="text-danger">{{ $errors->first('address1') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Address Line2: <span>*</span></label>
                        <input type="text" name="address2" value="{{ old('address2') }}" class="form-control required" placeholder="Address Line2">
                        <span class="text-danger">{{ $errors->first('address2') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>City: <span>*</span></label>
                        <input type="text" name="city" value="{{ old('city') }}" class="form-control required" placeholder="City">
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>State: <span>*</span></label>
                        <input type="text" name="state" value="{{ old('state') }}" class="form-control required" placeholder="State">
                        <span class="text-danger">{{ $errors->first('state') }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Postal/Zip code: <span>*</span></label>
                        <input type="text" name="postal" value="{{ old('postal') }}" class="form-control required" placeholder="Postal/Zip code">
                        <span class="text-danger">{{ $errors->first('postal') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Country: <span>*</span></label>
                        {!! Form::select('country',[''=>'-Select Country-']+ CommonClass::CountryList(), old('country'), ['class'=>'form-control required']) !!}
                        <span class="text-danger">{{ $errors->first('country') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Buy In</label>
                          <div class="col-sm-8">
                            <label class="radio-inline">
                              <input type="radio" name="sell_in" id="Radios1" value="1" class="required" checked="">
                              Africa
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="sell_in" id="Radios2" value="2" class="required">
                              Global
                            </label>
                            <span class="text-danger">{{ $errors->first('sell_in') }}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <br/>
                    <div class="form-wizard-buttons">
                      <button type="button" class="btn btn-previous">Previous</button>
                      <button type="button" class="btn btn-next">Next</button>
                    </div>
                  </fieldset>
                  <!-- Form Step 3 -->


                  <!-- Form Step 4 -->
                  <fieldset>
                    <!-- Progress Bar -->
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                      </div>
                    </div>
                    <!-- Progress Bar -->
                    <h4>Confirm Details: <span>Step 3 - 3</span></h4>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>How did you hear about us: <span>*</span></label>
                        {!! Form::select('knownto',[''=>'-Select-']+ CommonClass::KnownList(), old('knownto'), ['class'=>'form-control required']) !!}
                        <span class="text-danger">{{ $errors->first('Knownto') }}</span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="checkbox" name="agree_to" value="check" id="agree" class="required" /> I agree to the Terms and Conditions” or “I agree to the Privacy Policy” of Africa Directory
                        <span class="text-danger">{{ $errors->first('agree_to') }}</span>
                      </div>
                    </div>
                    <div class="form-wizard-buttons">
                      <button type="button" class="btn btn-previous">Previous</button>
                      <button type="submit" class="btn btn-submit">Submit</button>
                    </div>
                  </fieldset>
                  <!-- Form Step 4 -->

                </form>

              </div>
              <!-- Form Wizard -->
            </div>
          </div>

        </section>

      </div>
    </div>
  </div>
</div>

@endsection

@push('footerscript')
<script src="{{ asset('custom/wizard.js') }}"></script>
@endpush