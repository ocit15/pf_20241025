<?php 
  require 'functions.php';

  // ambil data di URL
  $id = $_GET["id"];
  // query data mahasiswa berdasarkan id
  $mhs = query("SELECT * FROM mahasiswa
                WHERE id = $id")[0];
  // cek data
  //var_dump($mhs["nama"]);
  
  
  // cek apakah tombol submit sudah ditekan atau belum
  if( isset($_POST["submit"]) ) {
    
    // cek apakah data berhasil diubah
    if( ubah($_POST) > 0 ) {
      echo "
        <script>
          alert('data berhasil diubah!');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('data gagal diubah!');
          document.location.href = 'index.php';
        </script>
      ";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ubah Data</title>
  
</head>
<body>
  
  <h1>Ubah Data Mahasiswa</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"];?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"];?>">
    <ul>
      <li>
        <label for="nim">NIM :</label>
        <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"];?>">
      </li>
      <li>
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"];?>">
      </li>
      <li>
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required value="<?= $mhs["email"];?>">
      </li>
      <li>
        <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"];?>">
      </li>
      <li>
        <label for="gambar">Photo :</label><br>
        <img src="img/<?= $mhs["gambar"];?>" width="50"><br>
        <input type="file" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit">Ubah</button>
      </li>
    </ul>

  </form>

  <a href="index.php">Kembali..</a>
  

</body>
</html>