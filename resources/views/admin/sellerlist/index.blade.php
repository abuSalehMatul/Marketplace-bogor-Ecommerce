@extends('admin.layout.app')
@section('title','Seller List')
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
            <h4 class="page-title">Seller List</h4>
            <div class="clearfix">{{-- <a href="{{ route('sellerlist.create') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-plus"></i> Add New</a> --}}</div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-xs-12">
          @php
            $seller_plan=App\Models\SellerPlan::all();
          //print_r($seller_plan);  
          @endphp
          @foreach($seller_plan as $seller_plan)
         
          <a class="btn btn-info" onClick="get_featured_seller('{{$seller_plan->id}}')" >{{$seller_plan->plan_name}} Seller </a>
             
          @endforeach
          <div class="card-box" id="">
           
          <table class="table table-striped" id="datatables">
            <thead>
              <tr>
                <th>S.NO.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Instant Type</th>
                <th>Company</th>
                <th>Contact No.</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
          <table class="table table-striped" id="different_seller" style="display:none">
            <thead>
              <tr>
                <th>S.NO.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Instant Type</th>
                <th>Company</th>
                <th>Contact No.</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
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
  function get_featured_seller(plan_id){
    console.log(plan_id);
      $.ajax({
              type:'get',
              url:'{{URL::to('admin/get_featured_seller')}}',
              data:{'plan_id':plan_id},
              success:function(data){
                  console.log(data);
                //  if(data == 'reload'){
                //      location.reload();
                //  }else{
                //      document.getElementById("levelid").innerHTML=data;
                //  }
                $('#datatables').hide();
                $('#different_seller').show();
                $('#different_seller').html(data);
              }
          })
  }
</script>
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
     url: '{{ url('admin/sellerlist') }}/'+id,
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
      ajax: '{{ url('admin/sellerlist/getData') }}',
      columns: [
      { data: 'rownum', name: 'rownum', searchable: false},
      { data: 'first_name', name: 'first_name' },
      { data: 'last_name', name: 'last_name' },
      { data: 'instant_type', name: 'instant_type' },
      { data: 'company_name', name: 'company_name' },
      { data: 'contact_number', name: 'contact_number' },
      { data: 'city', name: 'city' },
      { data: 'state', name: 'state' },
      { data: 'country_name', name: 'countries.country_name' },
      {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    });
  });
</script>
</script>
@endpush
