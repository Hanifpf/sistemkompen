<?php
session_start();

$title = "Ubah data" ;
require_once "header.php";
// session_start();

if( !isset($_SESSION["login"] )){
    header("Location: login.php");
    exit;
}

require 'functions.php';


// Ambil data di url
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM  mahasiswa WHERE id = $id")[0];




//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){

    // cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    }

}

// Tampilan Web

?>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
        <div class="mb-3">
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM : </label>
            <input type="text" class="form-control" name="nim" id="nim" required value="<?= $mhs["nim"] ?>">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama : </label>
            <input type="text" class="form-control" name="nama" id="nama" required value="<?= $mhs["nama"] ?>">
        </div>
        <div class="mb-3">
            <label for="jumlahalpha" class="form-label">Jumlah alpha : </label>
            <input type="text" class="form-control" name="jumlahalpha" id="jumlahalpha" required value="<?= $mhs["jumlahalpha"] ?>">
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label">Semester : </label>
            <input type="text" class="form-control" name="semester" id="semester" required value="<?= $mhs["semester"] ?>">
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas : </label>
            <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $mhs["kelas"] ?>" >
        </div>
        <div class="mb-3">
            <label for="gambar">Gambar : </label> <br>
            <img src="img/<?= $mhs['gambar']; ?>" width="40"><br>
            <input type="file" name="gambar" id="gambar" value="<?= $mhs["gambar"] ?>" >
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Ubah Data!</button>
        
    </form>

<?php require_once "footer.php"; ?>