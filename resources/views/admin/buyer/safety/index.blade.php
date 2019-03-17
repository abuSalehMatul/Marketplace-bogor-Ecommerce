@extends('admin.layout.app')
@section('title','Safety')
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
            <h4 class="page-title">Safety</h4>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card-box">
           <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="datatables">
              <thead>
                <tr>
                  <th>S.NO.</th>
                  <th>Safety</th>                  
                  <th>Action</th>
                </tr>
              </thead>              
            </table>
          </div>
        </div>
      </div>
    </div> <!-- container -->
  </div> <!-- content -->
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
     url: '{{ url('admin/buyersafety') }}/'+id,
     type: 'delete',
     dataType: "JSON",
     data: {
      "id": id,
      "_token":"{{ csrf_token() }}"
    },
  });
    $('#datatables').DataTable().draw(false);
    swal("Deleted!", "User has been deleted!", "success");
         window.location.reload();
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
      ajax: '{{ url('admin/buyersafety/getData') }}',
      columns: [
      { data: 'rownum', name: 'rownum', searchable: false},
      { data: 'full_description', name: 'full_description' },   
      {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    });
  });
</script>

@endpush
