<?php
sleep(1);
require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa
            WHERE
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            kelas LIKE '%$keyword%' OR
            semester LIKE '%$keyword%' OR
            jumlahalpha LIKE '%$keyword%' 
            ";
$mahasiswa = query($query);
?>

<table border="1" cellpadding="10" cellspacing="0">
<!-- <table class="table"> -->
<thead>
    <tr>
        <th>No.</th>
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

<!-- <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <?php $i = 1 ?>
    <?php foreach( $mahasiswa as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"];?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">hapus</a>
        </td>
        <td><img src="img/<?php echo $row["gambar"] ?>" width="50"></td>
        <td><?= $row["nrp"] ?></td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["jurusan"] ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

</table> -->