<link rel="stylesheet" href="{{ asset('') }}assets/{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'target')</title>

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


  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
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
  @include('admin.admin_layouts.nav-header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.admin_layouts.sidebar')
  <!-- /.Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Target Penjualan Sales</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Target</li>
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
              <div class="card-header">
                <a href="/tambah-target" class="btn btn-success" title='tambah'>
                  <p class="mb-auto">
                    Tambah Target
                    <i class='fa fa-plus'></i>
                  </p>
                </a>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> BERHASIL!</h5>
                    {{session('success')}}
                </div>
                @elseif(session('warning'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> GAGAL!</h5>
                    {{session('warning')}}
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible" style="margin-top: 30px;">
                    <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> GAGAL!</h5>
                    {{session('error')}}
                </div>
                @endif


              <div class="row mt-3 ml-3">
                <div class="col-sm-3">
                    <form action="" method="POST">
                      @csrf
                        <div class="input-group input-group-sm">
                          <select class="form-control select2" name="bulan" style="width: 150px;">
                            <option  value='' selected="selected">Periode</option>
                            <option value=1>Januari</option>
                            <option value=2>Februari</option>
                            <option value=3>Maret</option>
                            <option value=4>April</option>
                            <option value=5>Mei</option>
                            <option value=6>Juni</option>
                            <option value=7>Juli</option>
                            <option value=8>Agustus</option>
                            <option value=9>September</option>
                            <option value=10>Oktober</option>
                            <option value=11>November</option>
                            <option value=12>Desember</option>
                        </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Pegawai</th>
                    <th>Tanggal</th>
                    <th>Penjualan</th>
                    <th>Persentase(%)</th>
                    <th>Target</th>
                    <th>Komisi</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($target as $item)
                  @php
                      $komisi = ((int) $item->persentase * $item->penjualan)/100;
                  @endphp
                  <tr>
                    <td>{{ $item->nama_sales }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->penjualan }}</td>
                    <td>{{ $item->persentase }}</td>
                    <td>100000000</td>
                    <td>{{ $komisi }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                      <a href="{{ route('lihat-target', ['id'=>$item->id_target]) }}" class="btn btn-info btn-sm btn-status" title='Lihat'>
                        <i class='fa fa-eye'></i>
                      </a>
                      <a href="{{ route('edit-target', ['id'=>$item->id_target]) }}" title='edit' class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                      </a>                                     
                      <a type="button" class="btn btn-danger btn-sm btn-delete" onclick="idTarget({{$item->id_target}})" title='Delete'>
                        <i class="far fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
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

      <!-- modal-delete -->
      <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Peringatan! </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p>Data Target akan dihapus. Anda yakin? </p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                  <button type="buttpn" class="btn btn-warning btn-delete-ask" data-dismiss="modal">
                      Continue</button>
              </div>
          </div>
      </div>
    </div>
  
  
    <div class="modal fade" id="modal-delete-confirm" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Peringatan! </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p>Data Target yang terhubung dengan data lainnya juga akan dihapus. Anda
                      yakin? </p>
              </div>
              <div class="modal-footer">
                  <form action="{{ route('delete-target') }}" method="post">
                      @csrf
                      <input type="hidden" id="id_target" name="id_target">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger btn-confirm-delete"> Delete</button>
                  </form>
              </div>
          </div>
      </div>
    </div>
 
  <!-- footer -->
  @include('admin.admin_layouts.footer')
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


{{-- Select2 --}}
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('') }}assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script>
  $(".select2").select2({
      theme: 'bootstrap4'
  });
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>


<script>
    

    function idTarget(id) {
      console.log(id)
      $('#modal-delete').modal('show')
      $('#id_target').val(id)
    }

    $('body').on('click', '.btn-delete-ask', function () {
        $('#modal-delete-confirm').modal('show')
    })

</script>

</body>
</html>
