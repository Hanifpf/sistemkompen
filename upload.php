<?php
session_start();

$title = "Upload Form" ;
require_once "header.php";

require 'functions.php';
//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){

    // cek apakah data berhasil ditambahkan atau tidak
    if(tambah($_POST) > 0) {
        echo "
        <script>
            alert('Form berhasil ditambahkan');
            document.location.href = 'upload.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Form gagal ditambahkan');
            document.location.href = 'upload.php';
        </script>
        ";
    }

}



?>
    <h1 class="text-center">FORM PENGUMPULAN KOMPEN</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nim" class="form-label">NIM : </label>
            <input type="text" class="form-control" name="nim" id="nim" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama : </label>
            <input type="text" class="form-control" name="nama" id="nama" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar : </label>
            <input type="file" class="form-control" name="gambar" id="gambar" >
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Tambah Data!</button>
        
    </form>

<?php require_once "footer.php" ?>