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
          <img src="{{ asset('') }}assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
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
            <a href="/" class="nav-link {{ ($title === "Dashboard")? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item {{ ($title === "New User" or $title === "Data Pegawai")? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pegawai
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/new-user" class="nav-link {{ ($title === "New User")? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/data-pegawai" class="nav-link {{ ($title === "Data Pegawai")? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pegawai</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/customer" class="nav-link {{ ($title === "Customer")? 'active' : '' }}">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Customer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pemesanan" class="nav-link {{ ($title === "Pemesanan")? 'active' : '' }}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Pemesanan
              </p>
            </a>
          </li>
          <li class="nav-item {{ ($title === "Penjualan Baru" or $title === "Jumlah Penjualan")? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Penjualan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/penjualan-baru" class="nav-link {{ ($title === "Penjualan Baru")? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/jumlah-penjualan" class="nav-link {{ ($title === "Jumlah Penjualan")? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jumlah Penjualan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/target" class="nav-link {{ ($title === "Target")? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Target
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pengiriman" class="nav-link {{ ($title === "Pengiriman")? 'active' : '' }}">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Pengiriman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/penjadwalan" class="nav-link {{ ($title === "Penjadwalan")? 'active' : '' }}">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Penjadwalan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>