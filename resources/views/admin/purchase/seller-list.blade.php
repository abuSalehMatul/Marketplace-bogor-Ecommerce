@extends('admin.layout.app')
@section('title','Seller Purchased Plans')
@push('headerscript')
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
            <h4 class="page-title">Seller Purchased Plans</h4>
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
                <th>Invoice No</th>
                <th>Seller Name</th>
                <th>Company Name</th>
                <th>Plan Name</th>
                <th>Charge</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
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
<script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('theme/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('theme/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">
  $(function() {
    $('#datatables').DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: '{{ url('admin/sellerpurchase-getdata') }}',
      columns: [
      { data: 'rownum', name: 'rownum', searchable: false},
      { data: 'invoice_no', name: 'invoice_no' },
      { data: 'first_name', name: 'sellers.first_name' },
      { data: 'company_name', name: 'sellers.company_name' },
      { data: 'plan_name', name: 'seller_plans.plan_name' },
      { data: 'purchase_price', name: 'purchase_price' },
      { data: 'start_date', name: 'start_date' },
      { data: 'end_date', name: 'end_date' },
      { data: 'action', name: 'action' }
      ]
    });
  });
</script>
@endpush
