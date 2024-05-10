<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="./admin.php" class="brand-link">
    <img src="./dist/img/depok.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Puskesmas Depok</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./dist/img/pasfoto-agas.png" class="brand-image img-circle elevation-3" id="image-side" style="opacity: .8">
      </div>
      <div class="info">
        <a href="./admin.php" class="d-block"><?= $_SESSION['username'] ?></a>
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
        <li class="nav-header">
          <h5><b>List Data</b></h5>
        </li>
        <li class="nav-item">
          <a href="./data_pasien.php" class="nav-link">
            <i class="nav-icon fas fa-hospital-user"></i>
            <p>
              Data Pasien
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="./data_unit_kerja.php" class="nav-link">
            <i class="nav-icon fas fa-hospital-user"></i>
            <p>
              Data Unit Kerja
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="./data_paramedik.php" class="nav-link">
            <i class="nav-icon fas fa-hospital-user"></i>
            <p>
              Data Paramedik
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="./data_periksa.php" class="nav-link">
            <i class="nav-icon fas fa-hospital-user"></i>
            <p>
              Data Periksa
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>

        <li class="nav-header">
          <h5><b>Tambah Data</b></h5>
        </li>

        <li class="nav-item">
          <a href="./form_pasien.php" class="nav-link">
            <i class="nav-icon fas fa-user-injured"></i>
            <p>
              Tambah Pasien
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="./form_unit_kerja.php" class="nav-link">
            <i class="nav-icon fas fa-user-injured"></i>
            <p>
              Tambah Unit Kerja
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="./form_paramedik.php" class="nav-link">
            <i class="nav-icon fas fa-user-injured"></i>
            <p>
              Tambah Paramedik
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="./form_periksa.php" class="nav-link">
            <i class="nav-icon fas fa-user-injured"></i>
            <p>
              Tambah Periksa
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>