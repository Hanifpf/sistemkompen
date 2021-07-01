<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';

$nim = $_SESSION["nim"];
$result = mysqli_query($conn, "SELECT * FROM `mahasiswa` WHERE `nim` = '$nim'");
$row = mysqli_fetch_assoc($result);
$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
?>

<!-- Tampilan PDF -->

<!doctype html>
<html lang="en">
  <head>
  <title>Form Kompen</title>
  </head>
  <body>

        <br/>
        <h2 style="text-align: center;">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h2> 
        <h3 style="text-align: center;">POLITEKNIK NEGERI MALANG</h3>
        <h4 style="text-align: center;">JURUSAN TEKNIK ELEKTRO</h4>
        <h4 style="text-align: center;">PROGRAM STUDI JARINGAN TELEKOMUNIKASI DIGITAL</h4>
        <h6 style="text-align: center;">Jl. Soekarno Hatta No. 9 Malang 65141 Telp. 0341-404424 Ext. 2211 Fax. 0341-404420</h6>
        <br>
        <h2 style="text-align: center;">SURAT PERNYATAAN KOMPENSASI</h2>
        <p style="text-align: justify;">
        Yang bertanda tangan
        <br>
        Nama : <?= $row["nama"]?>
        <br>
        NIM : <?= $row["nim"]?>
        <br>
        Kelas : <?= $row["kelas"] ?>
        <br>
        Jumlah Alpha/ Kompensasi : <?= $row["jumlahalpha"] * 2 ?> Jam
        <br>
        Semester : <?= $row["semester"] ?>
        <br>
        Saya mengakui telah tidak masuk kuliah tanpa keterangan (Alpha) Semester <?= $row["semester"] ?> 
        Tahun Akademik 2020/2021 sebanyak jumlah alpha/ kompensasi yang tertera di atas.
        Dengan rasa tanggungjawab saya tidak akan menuntut Program Studi DIV Jaringan Telekomunikasi Digital 
        karena kompensasi ini sudah sesuai dengan kemauan saya sendiri.
        <br>
        Demikian Surat Pernyataan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.   
        </p>

        <br><br>

        <p style="margin-left: 450px ;">
            Malang, <?php echo date('d/m/Y') ?>
            <br>
            Yang membuat pernyataan, 
            <br>
            <br>
            <br>
            <br>
            <br>
            <?= $row["nama"] ?>
        </p>
            <br>
            <div id="footer">
                <?php echo 'Copyright ' . date('y');?>
            </div>

</body>
</html>


<?php
$html=ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output('Kompen '.$row["nama"].'.pdf', \Mpdf\Output\Destination::INLINE);

?>
