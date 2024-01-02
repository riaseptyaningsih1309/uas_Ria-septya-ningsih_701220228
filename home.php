<?php
//koneksi kedata base
$conn = mysqli_connect("localhost", "root", "", "daftar_mahasiswa");
//ambil data dari database atau query datanya
$result = mysqli_query($conn, "SELECT*FROM tambah_data_mahasiswa");
//ambil data (fetch) mahasiswa dari objek result

//while ($mhs = mysqli_fetch_assoc($result)) {
//var_dump($mhs);
//}

?>
<DOCTYPE html>
<html'>
    <head>
    <style>
        body {
background-image: url("ku.jpeg");
background-position: 5px 5px;
}
</style>
        <title>DATA MAHASISWA</title>
        <link rel="stylesheet" href="stylee.css">
    </head>
    <body>
        <center>
        <h1>DATA MAHASISWA UNIVERSITY OF TORONTO</h1>
        <table bgcolor="#C4E5FB" border="1" cellpadding="10" cellspacing="0">
        <a href="simpan.php">Tambah Data Mahasiswa</a><br>
        <br></br>
        <a href="cetak.php" target="_BLANK">PRINT</a>
        <br>
        </center>
        <br>
            <tr>
                <th>No. </th>
                <th>Opsi</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Fakultas</th>
            </tr>

        <?php 
           $query = "SELECT * FROM tambah_data_mahasiswa ORDER BY NIM ASC";
           $result = mysqli_query($conn, $query);
           
           if(!$result){
             die ("Query Error: ".mysqli_errno($conn).
                " - ".mysqli_error($conn));
           }
     
           $no = 1;
           while($row = mysqli_fetch_assoc($result))
           {
           ?>
            <?php $i = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $i;?></td>
                <td>
                <a href="edit_mhs.php?Nama=<?php echo $row['Nama']; ?>">Edit</a> |
                <a href="proses_hapus.php?Nama=<?php echo $row['Nama']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')
                ">Hapus</a> 
                <td style="text-align: center;"><img src=" IMG/<?php echo $row['Gambar']; ?>" alt="" style="width: 80px;"></td>
                <td><?= $row["Nama"];?></td>
                <td><?= $row["NIM"];?></td>
                <td><?= $row["Email"];?></td>
                <td><?= $row["Jurusan"];?></td>
                <td><?= $row["Fakultas"];?></td>
            </tr>
            <?php $i++; ?>
            <?php endwhile; ?>
            </td>
      </tr>
         
      <?php

        $no++;
      }
      ?>
    </tbody>
    </table>
  </body>
</html>