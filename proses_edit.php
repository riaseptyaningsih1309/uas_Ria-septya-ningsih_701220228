<?php

include 'koneksi.php';

  $NIM = $_POST['NIM'];
  $Nama   = $_POST['Nama'];
  $Email     = $_POST['Email'];
  $Jurusan    = $_POST['Jurusan'];
  $Fakultas    = $_POST['Fakultas'];
  $Gambar = $_FILES['IMG']['name'];
  if($fakultagambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jfif');
    $x = explode('.', $Gambar); 
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['IMG']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$Gambar; 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'IMG/'.$nama_gambar_baru); 
                   $query  = "UPDATE tambah_data_mahasiswa SET NIM = '$NIM', Nama = '$Nama', Email = '$Email', Jurusan = '$Jurusan', Fakultas = '$Fakultas', Gambar = '$nama_gambar_baru'";
                    $query .= "WHERE Nama = '$Nama'";
                    $result = mysqli_query($koneksi, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='home.php';</script>";
                    }
              } else {     
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_mhs.php';</script>";
              }
    } else {
      $query  = "UPDATE tambah_data_mahasiswa SET NIM = '$NIM', Nama = '$Nama', Email = '$Email', Jurusan = '$Jurusan', Fakultas = '$Fakultas'";
      $query .= "WHERE Nama = '$Nama'";
      $result = mysqli_query($koneksi, $query);
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {

          echo "<script>alert('Data berhasil diubah.');window.location='home.php';</script>";
      }
    }

 

