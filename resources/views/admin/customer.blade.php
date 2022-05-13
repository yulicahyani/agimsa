<link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'customer')</title>

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
                            <h1 class="m-0">Customer</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Customer</li>
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
                                    <a href="/tambah-customer" class="btn btn-success" title='tambah'>
                                        <p class="mb-auto">
                                            Tambah Customer
                                            <i class='ion ion-person-add'></i>
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
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Customer</th>
                                                <th>Daerah</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customer as $item)
                                            <tr>
                                                <td>{{ $item->nama_customer }}</td>
                                                <td>{{ $item->daerah }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->telepon }}</td>
                                                <td>{{ $item->email }} </td>
                                                <td>
                                                    <a href="{{ route('lihat-customer', ['id'=>$item->id_customer]) }}"
                                                        class="btn btn-info btn-sm btn-status" title='Lihat'>
                                                        <i class='fa fa-eye'></i>
                                                    </a>
                                                    <a href="{{ route('edit-customer', ['id'=>$item->id_customer]) }}"
                                                        title='edit' class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-danger btn-sm btn-delete"
                                                        onclick="idCustomer({{$item->id_customer}})" title='Delete'>
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
                        <p>Data Customer akan dihapus. Anda yakin? </p>
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
                        <p>Data Customer yang terhubung dengan data lainnya juga akan dihapus. Anda
                            yakin? </p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('delete-customer') }}" method="post">
                            @csrf
                            <input type="hidden" id="id_customer" name="id_customer">
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
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });



        function idCustomer(id) {
            console.log(id)
            $('#modal-delete').modal('show')
            $('#id_customer').val(id)
        }

        $('body').on('click', '.btn-delete-ask', function () {
            $('#modal-delete-confirm').modal('show')
        })

    </script>
</body>

</html>
