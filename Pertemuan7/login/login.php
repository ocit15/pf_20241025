<?php 
    // ce tombol submit sudah ditekan / belum 
    if( isset($_POST["submit"])){
        if($_POST["username"] == "admin" && $_POST["password"] == "123") {

            // jika benar, redirect ke halaman admin
            header("Location : admin.php");
            exit;
        } else {
            // jika salah, tampilkan pesan kesalahn
            $error = true;
        }

    }
    
        
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <h1>Halaman Login</h1>

    <?php if (isset($error) ) : ?>
        <p style="color: red; font-style:italic;">username / password salah!</p>
    <?php endif; ?>

    <form action="admin.php" method="post">
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="submit">Login</button>
            </li>
    </form>

    
</body>
</html>