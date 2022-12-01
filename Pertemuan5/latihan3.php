<?php 
    //array multidimensi
    //array di dalam array
    $mahasiswa = [
        ["Adam Bachtiar", "9281928", "PTI","adam@gmail.com"],
        ["FAHMIBOKPE", "20392093", "PTI", "fahmibokep@gmail.com"],
        ["oyik", "91892812", "PTI", "hdeawuydawydh@gmail.com"],
        ["ghghgh", "9ghhfghf2323", "PTI", "hdfdfydh@gmail.com"]
    ];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Latiha Array Multidimensi</title>
    
</head>
<body>
    <h1>Daftar Biodata Mahasiswa </h1>

    <ul>
        <?php foreach (  $mahasiswa as $mhs ) : ?>
        <li>Nama : <?= $mhs [0] ?></li>
        <li>Nim : <?= $mhs [1] ?></li>
        <li>Jurusan : <?= $mhs [2] ?></li>
        <li>Email : <?= $mhs [3] ?></li>
        <br>
        <?php endforeach; ?>
        
        
    </ul>
    
</body>
</html>