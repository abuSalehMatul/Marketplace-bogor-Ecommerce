@extends('admin.layout.app')
@section('title','Plan')
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
            <h4 class="page-title">Plan</h4>
            {{-- <div class="clearfix"><a href="{{ route('category.create') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-plus"></i> Add New</a></div> --}}
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
                <th>Plan Name</th>
                <th>Charge</th>
                <th>Plan Months</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach($result as $row)
             <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $row->plan_name }}</td>
               <td>{{ $row->charge }}</td>
               <td>{{ $row->plan_month }}</td>
               <td>{{ $row->description }}</td>
               <td><a href="{{ route('sellerplan.edit',$row->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a></td>
             </tr>
             @endforeach
            </tbody>
          </table>
          <div>
          <a class="btn btn-info" href="{{url('/admin/newplanform')}}">Create a new Plan</a>
          </div>
        </div>
        </div>
      </div>

   
    </div> <!-- container -->

  </div> <!-- content -->

</div>
@endsection

{{-- @push('footerscript')

<script src="{{ asset('theme/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('theme/plugins/datatables/dataTables.bootstrap.js')}}"></script>

<script type="text/javascript">
  $(function() {
    $('#datatables').DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: '{{ url('admin/plan/getData') }}',
      columns: [
      { data: 'rownum', name: 'rownum', searchable: false},
      { data: 'plan_name', name: 'plan_name' },
      { data: 'charge', name: 'charge' },
      { data: 'plan_month', name: 'plan_month' },
      { data: 'description', name: 'description' },
      {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    });
  });
</script>
@endpush
 --}}