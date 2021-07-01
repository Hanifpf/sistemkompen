<?php
session_start();

$title = "Registrasi" ;
require_once "header.php";
require 'functions.php';

// mengecek tombol sudah ditekan atau belum
if(isset($_POST["register"])){

    if(registrasi($_POST) > 0 ){
        echo "<script>
                alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';

            </script>";
    } else {
        echo mysqli_error($conn);
    }

}



?>

<style>
        label{
            display: block;
        }
    </style>

    <h1>Halaman Registrasi</h1>
<div class="container">
    <form action="" method="post">
            <div class="mb-3">
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password2">konfirmasi password :</label>
                <input type="password" name="password2" id="password2">
            </div>
                <button type="submit" name="register">Register!</button>
    
    </form>
</div>
    <!-- <div class="mb-3">
            <label for="nim" class="form-label">NIM : </label>
            <input type="text" class="form-control" name="nim" id="nim" required>
        </div> -->
<?php require_once "footer.php"; ?>