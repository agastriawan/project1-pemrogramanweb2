<?php

require_once './db_koneksi.php';

// Tangkap data form yang dikirim
$tanggal = $_POST['tanggal'];
$berat = $_POST['berat'];
$tinggi = $_POST['tinggi'];
$tensi = $_POST['tensi'];
$keterangan = $_POST['keterangan'];
$pasien_id = $_POST['pasien'];
$dokter_id = $_POST['dokter'];

// Simpan data ke dalam array
$data = [$tanggal, $berat, $tinggi, $tensi, $keterangan, $pasien_id, $dokter_id];

// Check nilai proses
switch ($_POST['proses']) {
    case 'Simpan':
        // Membuat sql
        $insertPeriksa = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) VALUES (?,?,?,?,?,?,?)";
        // Mendefinisikan prepare statement
        $stmt = $dbh->prepare($insertPeriksa);
        // Eksekusi statement
        $stmt->execute($data);
        break;
    case 'Ubah':
        $id_pasien = $_POST['id_pasien'];
        $updatePeriksa = "UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=? WHERE id=?";

        //menambahkan id_pasien kedalam data
        $data[] = $id_pasien;

        $stmt = $dbh->prepare($updatePeriksa);

        $stmt->execute($data);
        break;
    case 'Hapus':
        $id_pasien = $_POST['id_pasien'];
        $deletePeriksa = "DELETE FROM periksa WHERE id =?";
        $stmt = $dbh->prepare($deletePeriksa);
        $stmt->execute([$id_pasien]);
        break;
    default:
        header('location: ../data_periksa.php');
}

// Redirect ke halaman data periksa
header('location: ../data_periksa.php');
