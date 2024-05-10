<?php
session_start();
require_once './action/db_koneksi.php';

$data_pasien = $dbh->query("SELECT * FROM pasien ORDER BY nama ASC");

$error = false;

$data_dokter = $dbh->query("SELECT * FROM paramedik ORDER BY nama ASC");

$error = false;

$id = $_GET['id'] ?? 0;
if ($id) {
  $findPeriksa = "SELECT * FROM periksa WHERE id = $id LIMIT 1";
  $periksa = $dbh->query($findPeriksa);
  if ($periksa->rowCount()) $periksa = $periksa->fetch();
  else header('location: ./data_periksa.php');
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
          <h1><b>Periksa</b></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Periksa</h3>

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
        <form method="post" action="./action/proses_periksa.php">
          <?php if (!empty($id)) : ?>
            <input type="hidden" name="id_pasien" value="<?= $id; ?>">
          <?php endif;  ?>
          <input type="hidden">
          <div class="form-group row">
            <label for="tanggal" class="col-4 col-form-label">Tanggal</label>
            <div class="col-8">
              <input id="tanggal" name="tanggal" type="date" class="form-control" value="<?= $periksa['tanggal'] ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="berat" class="col-4 col-form-label">Berat</label>
            <div class="col-8">
              <input id="berat" name="berat" type="text" class="form-control" value="<?= $periksa['berat'] ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="tinggi" class="col-4 col-form-label">Tinggi</label>
            <div class="col-8">
              <input id="tinggi" name="tinggi" type="text" class="form-control" value="<?= $periksa['tinggi'] ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="tensi" class="col-4 col-form-label">Tensi</label>
            <div class="col-8">
              <input id="tensi" name="tensi" type="text" class="form-control" value="<?= $periksa['tensi'] ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
            <div class="col-8">
              <textarea id="keterangan" name="keterangan" cols="40" rows="2" class="form-control"><?= $periksa['keterangan'] ?? '' ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="pasien" class="col-4 col-form-label">Pasien</label>
            <div class="col-8">
              <select id="pasien" name="pasien" class="custom-select">
                <option value="" disabled selected>--- Pilih Pasien ---</option>
                <?php foreach ($data_pasien as $key => $pasien) : ?>
                  <option <?= ($id && $periksa['pasien_id'] == $pasien['id'] ? 'selected' : '') ?? '' ?> value="<?= $pasien['id'] ?>"><?= $pasien['nama'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="dokter" class="col-4 col-form-label">Dokter</label>
            <div class="col-8">
              <select id="dokter" name="dokter" class="custom-select">
                <option value="" disabled selected>--- Pilih Dokter ---</option>
                <?php foreach ($data_dokter as $key => $dokter) : ?>
                  <option <?= ($id && $periksa['dokter_id'] == $dokter['id'] ? 'selected' : '') ?? '' ?> value="<?= $dokter['id'] ?>"><?= $dokter['nama'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-4 col-8">
              <input type="submit" name="proses" id="proses" class="btn btn-primary" value="<?= $id ? 'Ubah' : 'Simpan' ?>">
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