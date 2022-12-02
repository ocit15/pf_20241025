<?php 
    //apakah tidak ada data didalam data global
    if( !isset($_GET["nama"]) ||
        !isset($_GET["nim"]) ||
        !isset($_GET["jurusan"]) ||
        !isset($_GET["email"]) ) {
        //rediret
        header("Location: latihan1.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Mahasiswa</title>
</head>
<body>

    <ul>
        <li><?= $_GET["nama"]; ?></li>
        <li><?= $_GET["nim"]; ?></li>
        <li><?= $_GET["jurusan"]; ?></li>
        <li><?= $_GET["email"]; ?></li>
    </ul>
    <a href="latihan1.php">Kembali...</a>
    
</body>
</html>