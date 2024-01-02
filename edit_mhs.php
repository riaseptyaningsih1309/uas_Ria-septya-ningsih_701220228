 <?php
include 'koneksi.php';

  if (isset($_GET['Nama'])) {
    $Nama = ($_GET["Nama"]);

    $query = "SELECT * FROM tambah_data_mahasiswa WHERE Nama='$Nama'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='utama.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data nim.');window.location='utama.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA MAHASISWA</title>
    <style>
        body {
background-image: url("ku.jpeg");
background-position: 5px 5px;
}
</style>
  </head>
  <body background="ku.jpeg" align="center">
      <center>
        <h1>Edit Data Mahasiswa University of Toronto<?php echo $data['Nama']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <label>NIM</label><br>
        <input name="NIM" value="<?php echo $data['NIM']; ?>"  hnimden /><br>
        <div>
        <label>Nama</label><br>
        <input type="text" name="Nama" value="<?php echo $data['Nama']; ?>" autofocus="" required="" /><br>
        </div>
        <div>
        <label>Email</label><br>
        <input type="text" name="Email" value="<?php echo $data['Email']; ?>" /><br>
        </div>
        <div>
        <label>Jurusan</label><br>
        <input type="text" name="Jurusan" required=""value="<?php echo $data['Jurusan']; ?>" /><br>
        </div>
        <div>
        <label>Fakultas</label><br>
        <input type="text" name="Fakultas" required="" value="<?php echo $data['Fakultas']; ?>"/><br>
        </div>
        <div>
        <label>Gambar</label><br>
        <img src="IMG/<?php echo $data['IMG']; ?>" style="width: 80px;" ?>
        <input type="file" name="IMG" />
        <i style="float: left;font-size: 15px;color: black">Abaikan jika tidak merubah gambar mhs</i>
        </div><br>
        <div>
        <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>