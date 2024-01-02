<?php
include_once('koneksi.php');
    if(isset($_POST["simpan"])){
        $NIM = $_POST["NIM"];
        $Nama= $_POST["Nama"];
        $Email = $_POST["Email"];
        $Jurusan= $_POST["Jurusan"];
        $Fakultas = $_POST["Fakultas"];
        $Gambar = $_POST["Gambar"];

        if(!empty($NIM) || !empty($Nama) || !empty($Email) || !empty($Jurusan) || !empty($Fakultas) || !empty($Gambar)){
            $sql = "INSERT INTO `tambah_data_mahasiswa`(`NIM`, `Nama`, `Email`, `Jurusan`, `Fakultas`, `Gambar`) 
             VALUES ('$NIM',' $Nama', '$Email', '$Jurusan', '$Fakultas', '$Gambar')";
            mysqli_query($koneksi, $sql);
            echo 'data tersimpan';
        }else{
            echo 'gagal tersimpan';
        }
    }

?>
<html>
<head>
    <title>DATA MAHASISWA</title>
</head>
<body background="ku.jpeg" align="center">
<link rel="stylesheet" href="stylee.css">
    <h1>MASUKAN DATA MAHASISWA</h1>
    <a href="home.php">Data Mahasiswa</a><br>
	<p><p>
	<form method="post" action="simpan.php">
        <label>NIM</label><br>
            <input type="text" name="NIM"><br>
        <label>NAMA</label><br>
            <input type="text" name="Nama"><br>
        <label>EMAIL</label><br>
            <input type="text" name="Email"><br>
        <label>JURUSAN</label><br>
            <input type="text" name="Jurusan"><br>
        <label>FAKULTAS</label><br>
            <input type="text" name="Fakultas"><br>
        <label>GAMBAR</label><br>
            <input type="file" name="Gambar" id="gambar"><br>
        <input type="submit" name="simpan" value="simpan">

 
    </form>
</body>
</html>