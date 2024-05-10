<?php
session_start();
require_once './action/db_koneksi.php';

$data_kelurahan = $dbh->query("SELECT * FROM kelurahan ORDER BY nama ASC");

$error = false;

$pasien_id = $_GET['id'] ?? 0;
if ($pasien_id) {
  $findPasienSQL = "SELECT * FROM pasien WHERE id = $pasien_id LIMIT 1";
  $pasien = $dbh->query($findPasienSQL);
  if ($pasien->rowCount()) $pasien = $pasien->fetch();
  else header('location: ./data_pasien.php');
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
          <h1><b>Pasien</b></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Pasien</h3>

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
        <form method="post" action="./action/proses_pasien.php">
          <?php if (!empty($pasien_id)) :?>
              <input type="hidden" name="id_pasien" value="<?= $pasien_id; ?>">
          <?php endif;  ?>
          <input type="hidden" >
          <div class="form-group row">
            <label for="kode" class="col-4 col-form-label">kode</label>
            <div class="col-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-address-card"></i>
                  </div>
                </div>
                <input id="kode" name="kode" type="text" class="form-control" value="<?= $pasien['kode'] ?? '' ?>">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama Lengkap</label>
            <div class="col-8">
              <input id="nama" name="nama" type="text" class="form-control" value="<?= $pasien['nama'] ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
            <div class="col-8">
              <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?= $pasien['tmp_lahir'] ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
            <div class="col-8">
              <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?= $pasien['tgl_lahir'] ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-4">Jenis Kelamin</label>
            <div class="col-8">
              <div class="custom-control custom-radio custom-control-inline">
                <input name="gender" id="gender_0" type="radio" class="custom-control-input" value="L" checked>
                <label for="gender_0" class="custom-control-label">Laki-Laki</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input name="gender" id="gender_1" type="radio" class="custom-control-input" value="P" <?= $pasien_id && $pasien['gender'] == 'P' ? 'checked' : '' ?>>
                <label for="gender_1" class="custom-control-label">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="kelurahan" class="col-4 col-form-label">Kelurahan</label>
            <div class="col-8">
              <select id="kelurahan" name="kelurahan" class="custom-select">
                <option value="" disabled selected>--- Pilih Kelurahan ---</option>
                <?php foreach ($data_kelurahan as $key => $kelurahan) : ?>
                  <option <?= ($pasien_id && $pasien['kelurahan_id'] == $kelurahan['id'] ? 'selected' : '') ?? '' ?> value="<?= $kelurahan['id'] ?>"><?= $kelurahan['nama'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Email</label>
            <div class="col-8">
              <input id="email" name="email" type="email" class="form-control" value="<?= $pasien['email'] ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-4 col-form-label">Alamat</label>
            <div class="col-8">
              <textarea id="alamat" name="alamat" cols="40" rows="2" class="form-control"><?= $pasien['alamat'] ?? '' ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-4 col-8">
              <input type="submit" name="proses" id="proses" class="btn btn-primary" value="<?= $pasien_id ?'Ubah':'Simpan' ?>">
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