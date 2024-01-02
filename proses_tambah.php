<?php
include 'koneksi.php';

  $NIM   = $_POST['NIM'];
  $Nama   = $_POST['Nama'];
  $Email     = $_POST['Email'];
  $Jurusan    = $_POST['Jurusan'];
  $Fakultas    = $_POST['Fakultas'];
  $Gambar = $_FILES['Gambar']['name'];


if($Gambar != "") {
  $ekstensi_diperbolehkan = array('jpg','jpeg','png'); 
  $x = explode('.', $Gambar); 
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['IMG']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$Gambar; 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'IMG'.$nama_gambar_baru); 
                  $query = "INSERT INTO tambah_data_mahasiswa (NIM, Nama, Email, Jurusan, Fakultas, Gambar) VALUES ('$NIM','$Nama', '$Email', '$Jurusan', '$Fakultas', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='home.php';</script>";
                  }

            } else {     
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau jpeg.');window.location='tambah_mhs.php';</script>";
            }
} else {
   $query = "INSERT INTO tambah_data_mahasiswa (NIM, Nama, Email, Jurusan, Fakultas, Gambar) VALUES ('$NIM', '$Nama', '$Email', '$Jurusan', '$Fakultas', null)";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='home.php';</script>";
                  }
}
