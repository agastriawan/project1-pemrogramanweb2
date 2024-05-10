<?php
session_start();
require_once './action/db_koneksi.php';

$id = $_GET['id'] ?? 0;
if ($id) {
  $findUnitKerja = "SELECT * FROM unit_kerja WHERE id = $id LIMIT 1";
  $uk = $dbh->query($findUnitKerja);
  if ($uk->rowCount()) $uk = $uk->fetch();
  else header('location: ./data_unit_kerja.php');
}

require_once './layouts/top.php';
require_once './layouts/navbar.php';
require_once './layouts/sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Unit Kerja</b></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Unit Kerja</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form method="post" action="./action/proses_unit_kerja.php">
          <?php if (!empty($id)) :?>
              <input type="hidden" name="id_pasien" value="<?= $id; ?>">
          <?php endif;  ?>
          <input type="hidden" >
          <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama Unit</label>
            <div class="col-8">
              <input id="nama" name="nama" type="text" class="form-control" value="<?= $uk['nama'] ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-4 col-8">
              <input type="submit" name="proses" id="proses" class="btn btn-primary" value="<?= $id ?'Ubah':'Simpan' ?>">
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once './layouts/bottom.php';
?>