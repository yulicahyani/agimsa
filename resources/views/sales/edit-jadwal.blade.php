<link rel="stylesheet" href="{{ asset('') }}assets/{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'edit jadwal')</title>

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
            <h1 class="m-0">Edit Jadwal</h1>
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
        <!-- general form elements -->
        <div class="card">
          <!-- form start -->
          <form method="POST">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Nama Customer</label>
                    <select class="form-control select2" name="id_customer" id="id_customer" required>
                      @foreach ($customer as $item)
                      <option value="{{ $item->id_customer }}"
                          {{ $jadwal->id_customer==$item->id_customer ? 'selected' : '' }}>
                          {{ $item->id_customer }} - {{ $item->nama_customer }} </option>
                      @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                    <input type="hidden" id="namacustomer" name="nama_customer"
                      value="{{ $jadwal->nama_customer }} ">
                </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Nama Sales</label>
                      <select class="form-control select2" name="id_pegawai" id="id_pegawai" required>
                        @foreach ($sales as $item)
                        <option value="{{ $item->id_pegawai }}"
                            {{ $jadwal->id_pegawai==$item->id_pegawai ? 'selected' : '' }}>
                            {{ $item->id_pegawai }} - {{ $item->nama_pegawai }} </option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="hidden" id="namapegawai" name="nama_pegawai"
                      value="{{ $jadwal->nama_pegawai }} ">
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date" name="tanggal" class="form-control" 
                      value="{{ $jadwal->tanggal }}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Daerah</label>
                    <input type="text" name="daerah" class="form-control" 
                    value="{{ $jadwal->daerah }}" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="lokasi_kunjungan" class="form-control" 
                      value="{{ $jadwal->lokasi_kunjungan }}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2" name="status" required style="width: 100%;">
                      <option value="Menunggu" {{ $jadwal->status=='Menunggu'?'selected':'' }}
                        selected>Menunggu</option>
                    <option value="Selesai" {{ $jadwal->status=='Selesai'?'selected':'' }}>Selesai
                    </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="keterangan" rows="3"> {{ $jadwal->keterangan }}</textarea>
                    </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="/jadwal-kunjungan" class="btn btn-danger" title='back'>
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
        </div>
        <!-- /.card -->
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

{{-- Select2 --}}
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('') }}assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<script>
    $(".select2").select2();
        //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    })

</script>

<script>
  $('#id_customer').on('select2:select', function (e) {
    console.log($(this).val())
    if ($(this).val() != '') {
        $.ajax({
            url: "{{ route('getDetailCustomer') }}",
            method: 'GET',
            data: {
                customer: $(this).val()
            },
            success: function (data) {
                console.log(data)
                if (data['status'] == 200) {
                    data = data['data'][0]
                    $('#namacustomer').val(data['nama_customer'])
                }
            }
        })
    }
  })

  $('#id_pegawai').on('select2:select', function (e) {
    console.log($(this).val())
    if ($(this).val() != '') {
        $.ajax({
            url: "{{ route('getDetailPegawai') }}",
            method: 'GET',
            data: {
                pegawai: $(this).val()
            },
            success: function (data) {
                console.log(data)
                if (data['status'] == 200) {
                    data = data['data'][0]
                    $('#namapegawai').val(data['nama_pegawai'])
                }
            }
        })
    }
  })
</script>

</body>
</html>
