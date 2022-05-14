<link rel="stylesheet" href="{{ asset('') }}assets/{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Detail Jadwal')</title>

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

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  @push('styles')
      <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
  @endpush

  @stack('styles')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper mb-3">

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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Jadwal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Jadwal Kunjungan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <hr>
    </div>
    <!-- /.content-header -->

       <!-- Main content -->
       <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="">
                    <thead>
                    <tr class="text-white">
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="height: 50px">
                      <td>ID. Kunjungan :</td>
                      <td style="width: 50px"></td>
                      <td>{{ $jadwal->id_kunjungan }}</td>
                    </tr>
                    <tr style="height: 50px">
                      <td>Nama Customer :</td>
                      <td></td>
                      <td>{{ $jadwal->nama_customer }}</td>
                    </tr>
                    <tr style="height: 50px">
                        <td>Nama Sales :</td>
                        <td></td>
                        <td>{{ $jadwal->nama_pegawai }}</td>
                    </tr>
                    <tr style="height: 50px">
                        <td>Tanggal :</td>
                        <td></td>
                        <td>{{ $jadwal->tanggal }}</td>
                    </tr>
                    <tr style="height: 50px">
                        <td>Daerah :</td>
                        <td></td>
                        <td>{{ $jadwal->daerah }}</td>
                    </tr>
                    <tr style="height: 50px">
                        <td>Alamat :</td>
                        <td></td>
                        <td>{{ $jadwal->lokasi_kunjungan }}</td>
                    </tr>
                    <tr style="height: 50px">
                        <td>Status :</td>
                        <td></td>
                        <td>{{ $jadwal->status }}</td>
                    </tr>
                    <tr style="height: 60px">
                        <td>Keterangan :</td>
                        <td></td>
                        <td>{{ $jadwal->keterangan }}</td>
                    </tr>
                  </table>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="/jadwal-kunjungan" class="btn btn-primary" title='back'>
                        Kembali
                    </a>
                  </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
   
  
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
  
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('') }}assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/jszip/jszip.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="{{ asset('') }}assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false, "info": false, "paging":false, "searching": false,
      "ordering": false,
        "buttons": ["copy", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>
</html>
