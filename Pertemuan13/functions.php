<?php 
  // koneksi ke database
  $conn = mysqli_connect("localhost", "root", "", "db_20241025");

  // query
  function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
      $rows[] = $row;
    }
    return $rows;
  }

  // tambah
  function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);


    // upload gambar 
    $gambar = upload();
    if ( !$gambar ) {
      return false;
    }

    // query insert data
    $query = "INSERT INTO mahasiswa
              VALUES ( '', '$nama', '$nim', '$email', '$jurusan', '$gambar' )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }


  // upload 
  function upload(){

    $namaFile = $_FILES['gambar']['name'];
    $ukuraFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
      echo "
        <script>
          alert('Pilih gambar dulu!');
        </script>
      ";
      return false;
    }

    // cek apakah yang diupload apakah gambar atau bukan
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
      echo "
        <script>
          alert('Yang diupload Bukan Gambar!');
        </script>
      ";
    } 

    // cek jika ukurannya terlalu besar (> 1MB)
    if( $ukuraFile > 1000000 ) {
      echo "
        <script>
          alert('Ukuran Gambar Terlalu Besar!');
        </script>
      ";
    }

    // lolos pengecekan, siap upload

    // genetare nama gambar baru
    $namaFileBaru = uniqid();
    //var_dump($namaFile);
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    //var_dump($namaFileBaru); die;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

  }

  // hapus
  function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
  }

  // ubah
  function ubah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ( $_FILES['gambar']['error'] === 4 ) {
      $gambar = $gambarLama;
    } else {
      $gambar = upload();
    }
    

    // query insert data
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
              WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

  function cari($keyword) {
    $query = "SELECT * FROM mahasiswa 
              WHERE nama LIKE '%$keyword%'
              OR
              nim LIKE '%$keyword%'
              OR 
              jurusan LIKE '%$keyword%'
              OR
              email LIKE '%$keyword%'
              ";

    return query($query);
  }

?>