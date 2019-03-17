@extends('layout.app')
@section('title','Manage Side Banner')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
<link href="{{ asset('theme/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">
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
                            <div class="clearfix"><a href="{{ route('sidebarbanner.create') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-plus"></i> Add New</a></div>
                        </div>
                    </div>
                    <div class="col-xs-12 section-space20">
                        <table class="table table-striped" id="datatables">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Banner Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img width="100" src="{{ asset($row->banner_image) }}" alt="" class="img-thumbnail img-responsive"></td>
                                        <td>{{ $row->status == 1 ? "Approved" : "Not Approved" }}</td>
                                        <td>
                                            <a href="{{ route('sidebarbanner.edit',$row->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                            <button class="btn btn-xs btn-danger" onclick="deleteit({{ $row->id }})"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
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
     url: '{{ url('seller/sidebarbanner') }}/'+id,
     type: 'delete',
     dataType: "JSON",
     data: {
      "id": id,
      "_token":"{{ csrf_token() }}"
    },
  });
    // $('#datatables').DataTable().draw(false);
    swal("Deleted!", "User has been deleted!", "success");
            
          } 
          else {
            swal("Cancelled", "User data is safe :)", "error");
          }
          window.location.reload();
        });
   
 }
</script>
@endpush