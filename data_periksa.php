<?php
session_start();
require_once './action/db_koneksi.php';

// Perintah untuk mengambil data dari table pasien
$sql = "SELECT periksa.*, pasien.nama AS nama_pasien, paramedik.nama AS nama_dokter 
FROM periksa 
JOIN pasien ON periksa.pasien_id = pasien.id 
JOIN paramedik ON periksa.dokter_id = paramedik.id";
// Jalanin query
$getPeriksa = $dbh->query($sql);

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
        <h3 class="card-title">Data Periksa</h3>

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
        <table class="table tablebordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Berat</th>
              <th>Tinggi</th>
              <th>Tensi</th>
              <th>Keterangan</th>
              <th>Pasien</th>
              <th>Dokter</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($getPeriksa as $key => $periksa) : ?>
              <tr>
                <td><?= ++$key ?></td>
                <td><?= $periksa['tanggal'] ?></td>
                <td><?= $periksa['berat'] ?></td>
                <td><?= $periksa['tinggi'] ?></td>
                <td><?= $periksa['tensi'] ?></td>
                <td><?= $periksa['keterangan'] ?></td>
                <td><?= $periksa['nama_pasien'] ?></td>
                <td><?= $periksa['nama_dokter'] ?></td>
                <td>
                  <a style="margin-right: 4px; margin-bottom:4px;" href="./form_periksa.php?id=<?= $periksa['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                  <form action="./action/proses_periksa.php" method="post">
                    <input type="hidden" name="id_pasien" value="<?= $periksa['id'] ?>">
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