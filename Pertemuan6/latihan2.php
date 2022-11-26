<?php 
  // $mahasiswa = [
  //   ['Adam', "0708078505", "PTI", "adambachtiar@undikma.ac.id"], 
  //   ['Bachtiar', "0708078005", "PTI", "bachtiar@undikma.ac.id"],
  //   ['Otong Surotong', "0708078505", "PTI", "otongsurotong@undikma.ac.id"]
  // ];

  // Array Associative
  // definisinya sama dengan array numerik, kecuali
  // key-nya adalah string yang kita buat sendiri
  $mahasiswa = [
    ["nama" => "Adam Bachtiar",
     "nim" => "0708078505",
     "email" => "adambachtiar@undikma.ac.id",
     "jurusan" => "PTI"
    ],
    ["nama" => "Bachtiar",
                "nim" => "0708078505",
                "email" => "bachtiar@undikma.ac.id",
                "jurusan" => "PTI"
    ],
    ["nama" => "Otong Surotong",
                "nim" => "0708078505",
                "email" => "otongsurutong@undikma.ac.id",
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
    <h1>Daftar Mahasiswa</h1>

    <!-- <ul>
      <li><?= $mahasiswa[0]; ?></li>
      <li><?= $mahasiswa[1]; ?></li>
      <li><?= $mahasiswa[2]; ?></li>
      <li><?= $mahasiswa[3]; ?></li>
    </ul>
    <br> -->

    <?php foreach( $mahasiswa as $mhs ) : ?>
    <ul>
      <li>Nama : <?= $mhs["nama"]; ?></li>
      <li>NIM : <?= $mhs["nim"]; ?></li>
      <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
      <li>Email : <?= $mhs["email"]; ?></li> 
    </ul>
    <?php endforeach; ?>

</body>
</html>