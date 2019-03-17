@extends('admin.layout.app')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Profile </h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-border panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Profile Details</h3>
                            </div>
                            <div class="panel-body">
                               <form method="post" action="{{ url('admin/updateprofile') }}" role="form" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="form-group fg-line"> 
                                <label class="fg-label">Name</label>
                                <input type="text" name="name" value="{{ old('name',Auth::user()->name) }}" class="form-control">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fg-line"> 
                                <label class="fg-label">Image [Optional]</label>
                                <input type="file" name="image"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="form-group fg-line"> 
                                <label class="fg-label">Email ID</label>
                                <input type="email" name="email" value="{{ old('email',Auth::user()->email) }}" class="form-control">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <div class="form-group fg-line"> 
                                <label class="fg-label">Phone No</label>
                                <input type="text" name="phone_no" value="{{ old('phone_no',Auth::user()->phone_no) }}" class="form-control">
                                @if ($errors->has('phone_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {!! csrf_field() !!}
                    <br><br>
                    <div class="row">
                        <button type="reset" class="btn btn-default m-t-10 waves-effect">Cancel</button>
                        &nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary m-t-10 waves-effect">Save</button>
                    </div>
                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-border panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Change Password</h3>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="{{ url('admin/changepassword') }}" role="form" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12{{ $errors->has('old') ? ' has-error' : '' }}">
                            <div class="form-group fg-line"> 
                                <label class="fg-label">Old Password</label>
                                <input type="password" name="old" value="{{ old('old') }}" class="form-control">

                                @if ($errors->has('old'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('old') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="form-group fg-line"> 

                                <label class="fg-label">New Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="form-group fg-line"> 

                                <label class="fg-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {!! csrf_field() !!}
                    <br><br>
                    <div class="row">
                        <button type="reset" class="btn btn-default m-t-10 waves-effect">Cancel</button>
                        &nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary m-t-10 waves-effect">Submit</button>
                    </div>
                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->



        </div> <!-- container -->

    </div> <!-- content -->

</div>
@endsection
