@extends('admin.layout.app')
@section('title','Community')
@push('headerscript')
<link href="{{ asset('theme/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('theme/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('theme/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">


      <div class="row">
        <div class="col-xs-12">
          <div class="page-title-box">
            <h4 class="page-title">Community</h4>
            <div class="clearfix"><a href="{{ route('community.edit',$row->id) }}"class="pull-right btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card-box">
            <ul class="check-circle">
              <li><a href="{{ $row->fb }}" target="blank" class="btn btn-sm"><i class="fa fa-facebook-official"></i> Facebook</a></li>
              <li><a href="{{ $row->twitter }}" target="blank" class="btn btn-sm"><i class="fa fa-twitter"></i> Twitter</a></li>
              <li><a href="{{ $row->whatsapp }}" target="blank" class="btn btn-sm"><i class="fa  fa-whatsapp"></i> WhatsApp</a></li>
              <li><a href="{{ $row->gplus }}" target="blank" class="btn btn-sm"><i class="fa  fa-google-plus"></i> Google+</a></li>
              <li><a href="{{ $row->instagram }}" target="blank" class="btn btn-sm"><i class="fa  fa-instagram"></i> Instagram</a></li>
            </ul>
          </div>

        </div>
      </div>


    </div> <!-- container -->

  </div> <!-- content -->

</div>
@endsection