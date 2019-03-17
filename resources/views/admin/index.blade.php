@extends('admin.layout.app')
@section('title','Dashboard')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card-box widget-box-two widget-two-primary">
                        <i class="mdi mdi-chart-areaspline widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Supplier's</p>
                            <h2><span data-plugin="counterup">{{ DashClass::TotalSupplier() }}</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                            <p class="text-muted m-0"><b>This Month:</b> {{ DashClass::TotalSupplierthisMonth() }}</p>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-3 col-md-6">
                    <div class="card-box widget-box-two widget-two-warning">
                        <i class="mdi mdi-layers widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Buyer's</p>
                            <h2><span data-plugin="counterup">{{ DashClass::TotalBuyer() }} </span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                            <p class="text-muted m-0"><b>This Month:</b> {{ DashClass::TotalBuyerthisMonth() }}</p>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-3 col-md-6">
                    <div class="card-box widget-box-two widget-two-danger">
                        <i class="mdi mdi-access-point-network widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Seller Products</p>
                            <h2><span data-plugin="counterup">{{ DashClass::TotalProduct() }}</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                            <p class="text-muted m-0"><b>This Month:</b> {{ DashClass::TotalProductthisMonth() }}</p>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-3 col-md-6">
                    <div class="card-box widget-box-two widget-two-success">
                        <i class="mdi mdi-account-convert widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">Buyer Post</p>
                            <h2><span data-plugin="counterup">{{ DashClass::TotalPost() }} </span> <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                            <p class="text-muted m-0"><b>This Month:</b> {{ DashClass::TotalPostthisMonth() }}</p>
                        </div>
                    </div>
                </div><!-- end col -->

            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-5">
                    <div class="card-box">

                        <h4 class="header-title m-t-0">Total Sales</h4>

                        <div class="widget-chart text-center">
                            <div id="donut-Sales"style="height: 245px;"></div>
                            <ul class="list-inline chart-detail-list m-b-0">
                                <li>
                                    <h5 class="text-danger"><i class="fa fa-circle m-r-5"></i>Sector Directory</h5>
                                </li>z
                                <li>
                                    <h5 class="text-success"><i class="fa fa-circle m-r-5"></i>Country Directory</h5>
                                </li>
                                <li>
                                    <h5 class="text-info"><i class="fa fa-circle m-r-5"></i>Seller Plan</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-7">
                    <div class="card-box">

                        <h4 class="header-title m-t-0">Statistics</h4>
                        <div id="columnchart_material" style="height: 300px;"></div>
                    </div>
                </div><!-- end col -->

            </div>
            <!-- end row -->
          


        </div> <!-- container -->

    </div> <!-- content -->


</div>
@endsection
@push('footerscript')
<!--Morris Chart-->
<script src="{{ url('theme/plugins/morris/morris.min.js') }}"></script>
<script src="{{ url('theme/plugins/raphael/raphael-min.js') }}"></script>

<!-- Dashboard init -->
<script>
    Morris.Donut({
        element: 'donut-Sales',
        colors: ["#f5707a", "#4bd396", "#3ac9d6"],
      data: [
      {label: "Sector Directory", value: {{ DashClass::SecDirSales() }}},
      {label: "Country Directory", value: {{ DashClass::CouDirSales() }}},
      {label: "Seller Plan", value: {{ DashClass::SellerSales() }}}
      ]
  });
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sector Diretory', 'Country Diretory', 'Seller Plan'],
          ['Jan', 1000, 400, 200],
          ['Feb', 1170, 460, 250],
          ['March', 660, 1120, 300],
          ['April', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Month wise Company Performance',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
@endpush
