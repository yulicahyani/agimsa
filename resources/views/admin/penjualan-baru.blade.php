<link rel="stylesheet" href="{{ asset('') }}assets/{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'penjualan baru')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('') }}assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('') }}assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
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
                            <h1 class="m-0">Penjualan Baru</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Penjualan Baru</li>
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
                                <div class="row mt-3 ml-3">
                                    <div class="col-sm-8">
                                        <form action="" method="POST">
                                          @csrf
                                            <div class="input-group input-group-sm">
                                                <select class="form-control select2" name="customer"
                                                    style="width: 25%;" required>
                                                    <option value="">Pilih Customer</option>
                                                    @foreach ($customer as $item)
                                                    <option value="{{ $item->id_customer}}">{{ $item->nama_customer }}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control select2" name="sales" style="width: 25%;" required>
                                                    <option value="">Pilih Sales</option>
                                                    @foreach ($pegawai as $item)
                                                    <option value="{{ $item->nama_pegawai}}">{{ $item->nama_pegawai }}</option>
                                                    @endforeach
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

                                <!-- /.card-header -->
                                <form action="{{ route('tambah-penjualan')}} " method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success">
                                                Tambah
                                            </button>
                                        </div>
                                        <table id="example2" class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="input-group input-group-sm">
                                                            <label class="mr-2">Customer :</label>
                                                            <input type="text" name="customer" class="form-control"
                                                                value="{{ isset($current_customer) ? $current_customer->nama_customer :null }}" readonly required>
                                                        </div>
                                                        <input type="hidden" name="id_customer" class="form-control"
                                                                value="{{ isset($current_customer) ? $current_customer->id_customer :null }}">
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-sm">
                                                            <label class="mr-2">Sales :</label>
                                                            <input type="text" name="sales" class="form-control"
                                                                value="{{ isset($name_sales) ? $name_sales:null }}" readonly required>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="input-group input-group-sm">
                                                            <label class="mr-2">Alamat :</label>
                                                            <input type="text" name="alamat" class="form-control"
                                                                value="{{ isset($current_customer) ? $current_customer->alamat :'' }}" readonly required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-sm">
                                                            <label class="mr-2">No Faktur :</label>
                                                            <input type="number" name="faktur" class="form-control"
                                                            value="{{ isset($no_faktur) ?printf('%06d',$item->no_faktur) :'' }}" required readonly >
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="input-group input-group-sm">
                                                            <label class="mr-2">Tanggal :</label>
                                                            <input type="date" name="tanggal" class="form-control" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <!-- /.card-body -->

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Quantity</th>
                                                <th>Harga</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if (isset($pesanan))
                                          @foreach ($pesanan as $key=>$item)
                                            <tr>
                                              <td>{{$key+1}} </td>
                                              <td> @php printf('%04d',$item->kode_barang); @endphp </td>
                                              <td>{{$item->nama_barang}}</td>
                                              <td>{{$item->qty}}</td>
                                              <td>{{$item->harga}}</td>
                                              <td>{{$item->total}} </td>
                                            </tr>
                                          @endforeach
                                          @endif
                                            
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Jumlah Bayar</td>
                                                <td>{{ isset($jumlah_bayar)?$jumlah_bayar:0 }} </td>
                                            </tr>
                                            <tr class="text-white">
                                                <td>Customer :{{ isset($current_customer) ? $current_customer->nama_customer :null }}</td>
                                                <td>Sales : {{ isset($name_sales) ? $name_sales:null }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-white">
                                                <td>Alamat : {{ isset($current_customer) ? $current_customer->alamat :null }}</td>
                                                <td>No faktur : Ketut</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-white">
                                                <td>Tanggal : 13/05/2022</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
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

    <script>
        $(function () {
            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["csv", "excel", "pdf", "print"],
                    "ordering": false,
                    'info': false,
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });

        });

    </script>
</body>

</html>
