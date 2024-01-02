<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
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
        <br>
        </center>
        <br>
            <tr>
                <th>No. </th>
                <th>Opsi</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Fakultas</th>
            </tr>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $sql = "SELECT * FROM tambah_data_mahasiswa ORDER BY Nama ASC";
      $result = mysqli_query($koneksi, $sql);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['NIM']; ?></td>
          <td><?php echo $row['Nama']; ?></td>
          <td><?php echo $row['Email']; ?></td>
          <td><?php echo $row['Jurusan']; ?></td>
          <td><?php echo $row['Fakultas']; ?></td>
          <td><img src="IMG/<?= $row["Gambar"]; ?>" width="80"></td>
      </tr>
         
      
        
      <?php
      $no++; //untuk nomor urut terus bertambah 1
      }
    ?>
    </tbody>
    </table>
  </body>
</html>

	<script>
		window.print();
	</script>
	
</body>
</html>