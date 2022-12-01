<?php 
    //array asosiatif 
    //definisinya sama dengan array numerik, kecuali
    // key-nya adalah string yang kita buat sendiri


    $mahasiswa = [
       [ 
        "nama" => "Pame",
        "nim" => "01921092",
        "email" => "pame@gmail.com",
        "jurusan" => "PTI"
       ] ,
       [
        "nama" => "oyikl",
        "nim" => "5454545",
        "email" => "oyik@gmail.com",
        "jurusan" => "PTI"
       ],
       [
        "nama" => "jsl",
        "nim" => "8738273545",
        "email" => "djshd@gmail.com",
        "jurusan" => "PTI"
       ]

       ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Asosiatif Array</title>
</head>
<body>
    <h1>Daftar nahasiswa</h1>
    <?php foreach($mahasiswa as $mhs): ?>
        <ul>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>Nim : <?= $mhs["nim"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
        </ul>
        <?php endforeach; ?>
    
</body>
</html>