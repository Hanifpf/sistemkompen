<?php
session_start();
$title = "Index" ;
require_once "header.php";

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}


?>

<style>
    .loader{
        width: 100px;
        position: absolute;
        top: 136px;
        left: 420px;
        z-index: -1;
        display: none;
    }

    @media print{
        .logout, .tambah, .form-cari, .aksi{
            display: none;
        }
    }

</style>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>

<div class="container">

<!-- Tampilan Web -->

<h1>Daftar Mahasiswa</h1>

<br>
<form action="" method="post">

    <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari</button> 
    <img src="img/loader.gif" class="loader">

</form>

<br>

<div id="container">
<table border="1" cellpadding="10" cellspacing="0">
<!-- <table class="table"> -->
<thead>
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jumlah Kompen</th>
        <th>Keterangan</th>
    </tr>
</thead>

    <?php $i = 1; ?>
    <?php foreach( $mahasiswa as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"];?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">hapus</a>
        </td>
        <td><img src="img/<?= $row["gambar"] ?>" width="50"></td>
        <td><?= $row["nim"] ?></td>
        <td><?= $row["nama"] ?></td>
        <?php $kompen = $row["jumlahalpha"] * 2; ?>
        <td class="text-center"><?= $kompen . " jam"; ?></td>
        <td><?php  if( $kompen == 0){
            echo "Lunas" ;
        }else {
            echo "Belum lunas";
        }; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

</table>
</div>
</div>

<?php require_once "footer.php" ?>