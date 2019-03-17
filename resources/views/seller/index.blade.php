@extends('layout.app')
@section('title',"Dashboard - Seller")
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
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
                    <h1 class="profile-title">{{ $seller->first_name }}<small>Welcome Back memeber </small></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page header -->
hello
<div class="main-container">
    <div class="container webdash">

        <div class="row">
            @include('layout.sidebar')
            <div class="col-md-9">
                <div class="row form-group">
                    <div class="col-sm-4">
                        <div class="box box-info">
                            <h3>Total Enquiry</h3>
                            <p><b><i class="fa fa-inbox"></i> {{ DashClass::SellerEnquiry($seller->id) }}</b></p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <h3>Total Products</h3>
                            <p><b><i class="fa fa-ship"></i> {{ DashClass::SellerProduct($seller->id) }}</b></p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box box-success">
                            <h3>Total Visitors</h3>
                            <p><b><i class="fa fa-users"></i> {{ DashClass::SellerVisitor($seller->id) }}</b></p>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12">
                        <div id="columnchart_material" style="height: 300px;"></div>
                    </div>
                </div>
                lets see
                @if(!$plans->isEmpty())
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Purchased Plans</h2>
                        <table class="table">
                            <thead>
                                <th>Invoice No</th>
                                <th>Purchase Plan</th>
                                <th>Purchase Price</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Plan Status</th>
                            </thead>
                            <tbody>
                                @foreach($plans as $prow)
                                <tr>
                                    <td>{{ $prow->invoice_no }}</td>
                                    <td>{{ $prow->sellerplan->plan_name }}</td>
                                    <td>{{ $prow->purchase_price }}</td>
                                    <td>{{ date('d M, Y', strtotime($prow->start_date)) }}</td>
                                    <td>{{ date('d M, Y', strtotime($prow->end_date)) }}</td>
                                     <td>{!! ($prow->plan_status==1)?"<label class='label label-success'>Active</label>":"<label class='label label-danger'>Inactive</label>" !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="pricing-container">
                        @foreach($result as $row)
                       
                        @php
                        if($loop->iteration==2){
                            $class="pricing-box-top";
                            $btn="btn-primary";
                        }
                        else{
                            $class="pricing-box-regualr";
                            $btn="btn-default";
                        }
                        @endphp
                        <div class="col-md-4 pricing-box {{ $class }}">
                            <div class="well-box">
                                <h4 class="price-title">{{ $row->plan_name }}</h4>
                                <h1 class="price-plan"><span class="dollor-sign">$</span>{{ $row->charge }}<span class="permonth">/ year</span></h1>
                                <p>{{ $row->description }}</p>
                                <button type="button" class="btn {{ $btn }} btn-sm" onclick="planModal({{ $row }})">Select Plan</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="plan_name"></h4>
      </div>
      <div class="modal-body">
        <form action="{{ url('seller/purchase-seller-plan') }}" method="post">
            @csrf
        <input type="hidden" name="plantype" id="plantype">
        <table class="table">
            <tr>
                <th id="price"></th>
            </tr>
            <tr>
                <th>For 1 Year</th>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
      </div>
    </div>

  </div>
</div>
@endsection
@push('headerscript')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Enquiry', 'Visitors'],
          @for($iM =1;$iM<=12;$iM++)
          ["{{ date("M", strtotime("$iM/12/10")) }}", {{ DashClass::SellerEnqMonth($seller->id,$iM) }}, {{ DashClass::SellerVisitorMonth($seller->id,$iM) }}],
          @endfor
        ]);

        var options = {
          chart: {
            title: 'Month wise Performance',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<script>
    function planModal(data){
        $("#myModal").modal()
        $("#plan_name").text(data['plan_name']+" Plan")
        $("#price").text("$"+data['charge'])
        $("#plantype").val(data['id'])
    }
</script>
@endpush
