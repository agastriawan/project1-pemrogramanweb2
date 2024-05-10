<?php
session_start();
require_once './action/db_koneksi.php';

// Perintah untuk mengambil data dari table pasien
$sql = "SELECT paramedik.*, unit_kerja.nama as nama_unit FROM paramedik JOIN unit_kerja ON paramedik.unit_kerja_id=unit_kerja.id";
// Jalanin query
$getParamedik = $dbh->query($sql);

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
          <h1><b>Paramedik</b></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Paramedik</h3>

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
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Tempat lahir</th>
              <th>Tanggal lahir</th>
              <th>Kategori</th>
              <th>Telpon</th>
              <th>Alamat</th>
              <th>Unit Kerja</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($getParamedik as $key => $paramedik) : ?>
              <tr>
                <td><?= ++$key ?></td>
                <td><?= $paramedik['nama'] ?></td>
                <td><?= $paramedik['gender'] ?></td>
                <td><?= $paramedik['tmp_lahir'] ?></td>
                <td><?= $paramedik['tgl_lahir'] ?></td>
                <td><?= $paramedik['kategori'] ?></td>
                <td><?= $paramedik['telpon'] ?></td>
                <td><?= $paramedik['alamat'] ?></td>
                <td><?= $paramedik['nama_unit'] ?></td>
                <td>
                  <a style="margin-right: 4px; margin-bottom:4px;" href="./form_paramedik.php?id=<?= $paramedik['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                  <form action="./action/proses_paramedik.php" method="post">
                    <input type="hidden" name="id_pasien" value="<?= $paramedik['id'] ?>">
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