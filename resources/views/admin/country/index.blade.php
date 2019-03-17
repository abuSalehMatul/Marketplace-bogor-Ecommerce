@extends('admin.layout.app')
@section('title','Country')
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
            <h4 class="page-title">Country</h4>
            <div class="clearfix"><a href="{{ route('country.create') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New</a></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card-box">
          <table class="table table-striped" id="datatables">
            <thead>
              <tr>
                <th>S.NO.</th>
                <th>Country</th>
                <th>Flag Icon</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
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
     url: '{{ url('admin/country') }}/'+id,
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
      ajax: '{{ url('admin/country/getData') }}',
      columns: [
      { data: 'rownum', name: 'rownum', searchable: false},
      { data: 'country_name', name: 'country_name' },
      { data: 'country_flag', name: 'country_flag' },
      {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    });
  });
</script>
@endpush
