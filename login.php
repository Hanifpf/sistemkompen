<?php
session_start();

$title = "Login" ;
require_once "header.php";
require 'functions.php';

// cek cookie
if(isset($_COOKIE["login"]) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }
}

// set session
if(isset($_SESSION["login"])){
    header("Location: daftarkompen.php");
    exit;
}

// mengecek tombol sudah ditekan atau belum
if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ){

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $_SESSION["username"] = $username;
            $_SESSION["login"] = true;
        
            if(isset($_POST['remember'])){
                // buat cookie
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256',$row['username']), time()+60);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;

}


?>

    
<!-- Tampilan Web -->

<?php if(isset($error)) : ?>
<p style="color: red; font-style: italic;">username / password salah</p>
<?php endif; ?>
<div class="container">
    <div class="formlogin">
    <form action="" method="post">
    <div class="mb-3">
        <input type="text" name="username" id="username" placeholder="Isi Username">  <br>      
    </div>
    <div>
        <input type="password" name="password" id="password" placeholder="Isi Password">  <br>      
    </div>
    <div class="mb-3">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
    </div>
        <button type="submit" name="login">Login</button>
        <div class="lupa">
            <a href="#"><span>lupa password ? </span></a>
            |
            <a href="registrasi.php"><span>belum punya akun ? </span></a>
        </div>
    </form>    
    </div>
</div>


<?php require_once "footer.php"; ?>