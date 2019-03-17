@extends('admin.layout.app')
@section('title','Sector Directory Purchased Plans')
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
            <h4 class="page-title">Sector Directory Purchased Plans</h4>
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
                <th>Email ID</th>
                <th>Directory Name</th>
                <th>Charge</th>
                <th>Date</th>
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
      ajax: '{{ url('admin/sectorpurchase-getdata') }}',
      columns: [
      { data: 'rownum', name: 'rownum', searchable: false},
      { data: 'invoice_no', name: 'invoice_no' },
      { data: 'email_id', name: 'email_id' },
      { data: 'title', name: 'sector_listings.title' },
      { data: 'purchase_price', name: 'purchase_price' },
      { data: 'created_at', name: 'created_at' },
      ]
    });
  });
</script>
@endpush
