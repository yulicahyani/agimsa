<link rel="stylesheet" href="{{ asset('') }}assets/{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'dashboard')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('') }}assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/summernote/summernote-bs4.min.css">
    <!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('') }}assets/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('') }}assets/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="{{ asset('') }}assets/assets/vendor/chartist/css/chartist-custom.css">
  <!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('') }}assets/assets/css/main.css">

  @push('styles')
      <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
  @endpush

  @stack('styles')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('') }}assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('sales.sales_layouts.nav-header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('sales.sales_layouts.sidebar')
  <!-- /.Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mb-5">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/sales">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <hr>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section >
      <div class="" style="background-color: light">
        <!-- MAIN CONTENT -->
        <div class="main-content" style="background-color: light">
          <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
              <div class="panel-heading">
                <h3 class="panel-title">Overview Bulanan</h3>
                <p class="panel-subtitle">Tanggal: {{ $tanggal }}</p>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="metric">
                      <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                      <p>
                        <span class="number">{{ $countPenjualanBulanan }}</span>
                        <span class="title">Penjualan Bulanan</span>
                      </p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="metric">
                      <span class="icon"><i class="fa fa-cart-plus"></i></span>
                      <p>
                        <span class="number">{{ $countCustomer }}</span>
                        <span class="title">Customer</span>
                      </p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="metric">
                      <span class="icon"><i class="fa fa-users"></i></span>
                      <p>
                        <span class="number">{{ $countUser }}</span>
                        <span class="title">Pegawai</span>
                      </p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="metric">
                      <span class="icon"><i class="fa fa-th-large"></i></span>
                      <p>
                        <span class="number">{{ $countProduk }}</span>
                        <span class="title">Produk</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <p id="title_grafik">Grafik Penjualan</p>
                    <div id="headline-chart" class="ct-chart"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="weekly-summary text-right">
                      <span class="number">{{ $countPenjualan }}</span> <span class="percentage"></span>
                      <span class="info-label">Total Penjualan</span>
                    </div>
                    <div class="weekly-summary text-right">
                      <span class="number">Rp. {{ $countPendapatanBulanan }}</span> <span class="percentage"></span>
                      <span class="info-label">Pendapatan Bulanan</span>
                    </div>
                    <div class="weekly-summary text-right">
                      <span class="number">Rp. {{ $countPendapatan }}</span> <span class="percentage"></span>
                      <span class="info-label">Total Pendapatan</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- footer -->
  @include('sales.sales_layouts.footer')
  <!-- /footer -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('') }}assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('') }}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('') }}assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('') }}assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('') }}assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('') }}assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('') }}assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('') }}assets/plugins/moment/moment.min.js"></script>
<script src="{{ asset('') }}assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('') }}assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('') }}assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('') }}assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('') }}assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('') }}assets/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('') }}assets/dist/js/pages/dashboard.js"></script>
<script src="{{ asset('') }}assets/assets/vendor/jquery/jquery.min.js"></script>
	<script src="{{ asset('') }}assets/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ asset('') }}assets/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="{{ asset('') }}assets/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="{{ asset('') }}assets/assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="{{ asset('') }}assets/assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
    var data_g, options;
    let penjualanperbulan = '{{ json_encode($penjualanperbulan) }}';

    let penjualan = JSON.parse(penjualanperbulan);
    console.log(penjualan)
    console.log(typeof penjualan )
    // headline charts
    data = {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
      series: [
        penjualan,
      ]
    };

    options = {
      height: 300,
      showArea: true,
      showLine: false,
      showPoint: false,
      fullWidth: true,
      axisX: {
        showGrid: false
      },
      lineSmooth: false,
      chartPadding: {
        left: 20,
        right: 30
      }
    };

    new Chartist.Line('#headline-chart', data, options);
	});
	</script>
</body>
</html>
