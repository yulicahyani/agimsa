  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('') }}assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CV. AGIMSA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('') }}assets/dist/img/profil2.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Sales</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/sales" class="nav-link {{ ($title === "Dashboard")? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/data-barang-sales" class="nav-link {{ ($title === "Data Barang")? 'active' : '' }}">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Data Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pemesanan-sales" class="nav-link {{ ($title === "Pemesanan")? 'active' : '' }}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Pemesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/target-penjualan" class="nav-link {{ ($title === "Target Penjualan")? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Target Penjualan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/jadwal-kunjungan" class="nav-link {{ ($title === "Jadwal Kunjungan")? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Jadwal Kunjungan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>