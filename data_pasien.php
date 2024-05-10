<?php
session_start();
require_once './action/db_koneksi.php';

// Perintah untuk mengambil data dari table pasien
$sql = "SELECT pasien.*, kelurahan.nama as kelurahan FROM pasien JOIN kelurahan ON pasien.kelurahan_id=kelurahan.id";
// Jalanin query
$getPasien = $dbh->query($sql);

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
        <h3 class="card-title">Data Pasien</h3>

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
        <table class="table tablebordered" id="table-puskesmas">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode</th>
              <th>Nama Pasien</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>Kelurahan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($getPasien as $key => $pasien) : ?>
              <tr>
                <td><?= ++$key ?></td>
                <td><?= $pasien['kode'] ?></td>
                <td><?= $pasien['nama'] ?></td>
                <td><?= $pasien['tmp_lahir'] ?></td>
                <td><?= $pasien['tgl_lahir'] ?></td>
                <td><?= $pasien['gender'] ?></td>
                <td><?= $pasien['alamat'] ?></td>
                <td><?= $pasien['email'] ?></td>
                <td><?= $pasien['kelurahan'] ?></td>
                <td>
                  <a style="margin-right: 4px; margin-bottom:4px;" href="./form_pasien.php?id=<?= $pasien['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                  <form action="./action/proses_pasien.php" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                    <input type="hidden" name="id_pasien" value="<?= $pasien['id'] ?>">
                    <input type="hidden" name="proses" value="Hapus">
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once './layouts/bottom.php';
?>