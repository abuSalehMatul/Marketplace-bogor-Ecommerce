@extends('layout.app')
@section('title','Your Post')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
<link href="{{ asset('theme/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('theme/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('theme/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
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
              <div class="clearfix"><a href="{{ route('post.create') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-plus"></i> Add New</a></div>
            </div>
          </div>
          <div class="col-xs-12 section-space20">
            <table class="table table-striped" id="datatables">
              <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('footerscript')
<script src="{{ asset('theme/plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('theme/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('theme/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script>
  function deleteit(id){
   swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Yes, I am sure!',
    cancelButtonText: "No, cancel it!",
    closeOnConfirm: false,
    closeOnCancel: false,
    cancelButtonClass: 'btn-default btn-md waves-effect',
    confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
  },
  function(isConfirm){
   if (isConfirm){
    $.ajax({
     url: '{{ url('buyer/post') }}/'+id,
     type: 'delete',
     dataType: "JSON",
     data: {
      "id": id,
      "_token":"{{ csrf_token() }}"
    },
  });
    $('#datatables').DataTable().draw(false);
    swal("Deleted!", "User has been deleted!", "success");
            //window.location.reload();
          } else {
            swal("Cancelled", "User data is safe :)", "error");
          }

        });

 }
</script>
<script type="text/javascript">
  $(function() {
    $('#datatables').DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: '{{ url('buyer/post/getData') }}',
      columns: [
      { data: 'rownum', name: 'rownum', searchable: false},
      { data: 'title', name: 'title' },
      { data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    });
  });
</script>
@endpush

