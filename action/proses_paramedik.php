<?php

require_once './db_koneksi.php';

// Tangkap data form yang dikirim
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$kategori = $_POST['kategori'];
$telpon = $_POST['telpon'];
$alamat = $_POST['alamat'];
$unit_kerja_id = $_POST['unit_kerja'];

// Simpan data ke dalam array
$data = [$nama, $gender, $tmp_lahir, $tgl_lahir, $kategori, $telpon, $alamat, $unit_kerja_id];

// Check nilai proses
switch ($_POST['proses']) {
    case 'Simpan':
        // Membuat sql
        $insertParamedik = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) VALUES (?,?,?,?,?,?,?,?)";
        // Mendefinisikan prepare statement
        $stmt = $dbh->prepare($insertParamedik);
        // Eksekusi statement
        $stmt->execute($data);
        break;
    case 'Ubah':
        $id_pasien = $_POST['id_pasien'];
        $updateParamedik = "UPDATE paramedik SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=? WHERE id=?";

        //menambahkan id_pasien kedalam data
        $data[] = $id_pasien;

        $stmt = $dbh->prepare($updateParamedik);

        $stmt->execute($data);
        break;
    case 'Hapus':
        $id_pasien = $_POST['id_pasien'];
        $deleteParamedik = "DELETE FROM paramedik WHERE id =?";
        $stmt = $dbh->prepare($deleteParamedik);
        $stmt->execute([$id_pasien]);
        break;
    default:
        header('location: ../data_paramedik.php');
}

// Redirect ke halaman data paramedik
header('location: ../data_paramedik.php');
