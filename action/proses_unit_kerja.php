<?php

require_once './db_koneksi.php';

// Tangkap data form yang dikirim
$nama = $_POST['nama'];

// Simpan data ke dalam array
$data = [$nama];

// Check nilai proses
switch ($_POST['proses']) {
    case 'Simpan':
        // Membuat sql
        $insertUnitKerja = "INSERT INTO unit_kerja (nama) VALUES (?)";
        // Mendefinisikan prepare statement
        $stmt = $dbh->prepare($insertUnitKerja);
        // Eksekusi statement
        $stmt->execute($data);
        break;
    case 'Ubah':
        $id_pasien = $_POST['id_pasien'];
        $updateUnitKerja = "UPDATE unit_kerja SET nama=? WHERE id=?";

        //menambahkan id_pasien kedalam data
        $data[] = $id_pasien;

        $stmt = $dbh->prepare($updateUnitKerja);

        $stmt->execute($data);
        break;
    case 'Hapus':
        $id_pasien = $_POST['id_pasien'];
        $deleteUnitKerja = "DELETE FROM unit_kerja WHERE id =?";
        $stmt = $dbh->prepare($deleteUnitKerja);
        $stmt->execute([$id_pasien]);
        break;
    default:
        header('location: ../data_unit_kerja.php');
}

// Redirect ke halaman data unit kerja
header('location: ../data_unit_kerja.php');
