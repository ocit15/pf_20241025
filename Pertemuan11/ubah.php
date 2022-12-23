<?php 
    require 'functions.php';

    // ambil data via URL
    $id = $_GET["id"];
    // query data mahasiswa berdasarkan id
    $mhs = query("SELECT * FROM mahasiswa 
                    WHERE id = $id")[0];
        
        //var_dump($mhs["nama"]);die;

        // cek tombol ubah sudah terisi apa belum
        if( isset($_POST ["submit"]) ){

            // cek apakah data berhasil disimpan ke dataabse atau berhasil ubah
            if( ubah($_POST) > 0 ){
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
    <title>Halaman Ubah Data</title>
</head>
<body>
    <h1>Halaman Ubah Data Mahasiswa</h1>
    <form action="" method="post">
    <input type="hidden" name="id" value="<?= $mhs["id"];?>">
        <ul>
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" require value="<?= $mhs["nim"];?>">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" require value="<?= $mhs["nama"];?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" require value="<?= $mhs["email"];?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" require value="<?= $mhs["jurusan"];?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" require value="<?= $mhs["gambar"];?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah</button>
            </li>
        </ul>
    </form>

    <a href="index.php">Kembali..</a>
    
</body>
</html>