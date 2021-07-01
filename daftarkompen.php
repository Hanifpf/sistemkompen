<?php
session_start();
$title = "Tambah data" ;
require_once "header.php";

require 'functions.php';
//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
    // Mengirim data ke halaman cetak.php
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $_SESSION["nim"] = $nim ; 
    $_SESSION["nama"] = $nama ; 
    $_SESSION["kelas"] = query("SELECT `kelas` FROM `mahasiswa` WHERE `nim` = '$nim' AND `nama` LIKE '%$nama%'"); 
    $_SESSION["semester"] = query("SELECT `semester` FROM `mahasiswa` WHERE `nim` = '$nim' AND `nama` LIKE '%$nama%'"); 
    $_SESSION["jumlahalpha"] = query("SELECT `jumlahalpha` FROM `mahasiswa` WHERE `nim` = '$nim' AND `nama` LIKE '%$nama%'"); 
    header("Location: cetak.php");
    exit;
}




?>
<!-- Tampilan web -->
    <h1 class="text-center">FORM PELAKSANAAN KOMPEN</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label for="nim" class="form-label">NIM : </label>
            <input type="text" class="form-control" name="nim" id="nim" >
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama : </label>
            <input type="text" class="form-control" name="nama" id="nama" >
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary" >Cetak Form</button>
        
    </form>

<?php require_once "footer.php" ?>