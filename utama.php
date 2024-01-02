<?php
  include('koneksi.php'); 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA MAHASISWA</title>
    <style type="text/css">
      * {
        font-family: "Optima";
      }
      h1 {
        text-transform: uppercase;
        color: Blue;
      }
    table {
      border: solnim 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      wnimth: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solnim 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solnim 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: blue;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
  <body>
    <center><h1>DATA MAHASISWA</h1><center>
    <center><a href="tambah_mhs.php">+ &nbsp; TAMBAH DATA MAHASISWA</a> |<a href="cetak.php" target="_blank">PRINT</a><center>
    <br/>
    <table>
      <thead>
        <br>
          <th>NIM</th>
          <th>NAMA</th>
          <th>E-MAIL</th>
          <th>JURUSAN</th>
          <th>FAKULTAS</th>
          <th>GAMBAR</th>
          <th>Action</th>
        </br>
      </thead>
    <tbody>
      <?php
      
      $query = "SELECT * FROM mhs ORDER BY nim ASC";
      $result = mysqli_query($koneksi, $query);
      
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      $no = 1;
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $row['nim']; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['jurusan']; ?></td>
          <td><?php echo $row['fakultas']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 200px;"></td>
          <td>
              <a href="edit_mhs.php?nim=<?php echo $row['nim']; ?>">Edit</a>
              <a href="proses_hapus.php?nim=<?php echo $row['nim']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')
              ">Hapus</a>
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