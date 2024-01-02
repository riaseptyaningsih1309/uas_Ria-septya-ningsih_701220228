<?php
include 'koneksi.php';
$Nama = $_GET["Nama"];

    $query = "DELETE FROM tambah_data_mahasiswa WHERE Nama='$Nama' ";
    $hasil_query = mysqli_query($koneksi, $query);

    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='home.php';</script>";
    }