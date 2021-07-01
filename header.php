<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css" />
    
    <title><?php echo $title ?></title>
  </head>
  <body>
  <?php 
              if(!isset($_SESSION['login'])){
          ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="daftarkompen.php">KOMPEN D4 JTD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
          <a class="nav-item nav-link active" href="daftarkompen.php">Daftar Kompen <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link active" href="table.php">Riwayat Kompen</a>
          <a class="nav-item nav-link active" href="upload.php">Upload Form Kompen</a>
        </div>
        <div class="navbar-nav ml-auto">

            <a class="nav-item nav-link" href="login.php">Admin <span class="sr-only">(current)</span></a>
          <?php } else { ?>

        <?php $_SESSION['logout'] = true; ?>


            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="daftarkompen.php">KOMPEN D4 JTD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
          <!-- <a class="nav-item nav-link active" href="daftarkompen.php">Home <span class="sr-only">(current)</span></a> -->
          <a class="nav-item nav-link" href="index.php">Daftar Kompen Mahasiswa </a>
        </div>
        <div class="navbar-nav ml-auto">

            <a class="nav-item nav-link" href=""><span>Hello <?php echo $_SESSION["username"] ?><?= " !" ?></span> <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
          <?php } ?>
        </div>
      </div>
    </nav>
    <div class="container">
    
    <br/>